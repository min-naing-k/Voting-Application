<?php

namespace App\Http\Livewire;

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
      $this->notificationCount = '9+';
    } else {
      $this->notificationCount = $this->notificationCount;
    }
  }

  public function render()
  {
    return view('livewire.comment-notifications');
  }
}
