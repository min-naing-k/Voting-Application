<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class CommentNotifications extends Component
{
  const NOTIFICATION_THRESHOLD = 9;
  public $notifications, $notificationCount, $loader;

  public function mount()
  {
    $this->notifications = collect([]);
    $this->getNotificationCount();
    $this->loader = true;
  }

  public function getNotifications()
  {
    $this->notifications = auth()->user()->unreadNotifications()
      ->latest()
      ->take(self::NOTIFICATION_THRESHOLD)
      ->get();

    $this->loader = false;
  }

  public function getNotificationCount()
  {
    $this->notificationCount = auth()->user()->unreadNotifications()->count();
    if ($this->notificationCount > self::NOTIFICATION_THRESHOLD) {
      $this->notificationCount = self::NOTIFICATION_THRESHOLD . '+';
    } else {
      $this->notificationCount = $this->notificationCount;
    }
  }

  public function markAllRead() {
    $this->notifications->markAsRead();
    $this->emit('notify');
  }

  public function markAsRead($notificationId) {
    $notification = DatabaseNotification::findOrFail($notificationId);
    $notification->markAsRead();

    $idea = Idea::find($notification->data['idea_id']);
    $comment = Comment::find($notification->data['comment_id']);
    if(! $comment) {
      session()->flash('error', "This comment does not exist!");
      return redirect('/');
    }
    if(! $idea) {
      session()->flash('error', "This idea does not exist!");
      return redirect('/');
    }

    $comments = $idea->comments()->pluck('id');
    $indexOfComment = $comments->search($comment->id);
    $commentPage = (int) ($indexOfComment / $comment->getPerPage()) + 1;

    session()->flash('scrollToComment', $comment->id);
    
    return redirect()->route('idea.show', [
      'idea' => $notification->data['idea_slug'],
      'comment-page' => $commentPage,
    ]);
  }

  public function render()
  {
    return view('livewire.comment-notifications');
  }
}
