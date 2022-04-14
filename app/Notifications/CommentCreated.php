<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentCreated extends Notification implements ShouldQueue
{
  use Queueable;

  public $comment;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Comment $comment)
  {
    $this->comment = $comment;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
    return ['mail', 'database'];
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {
    return (new MailMessage)
      ->subject('Voting App: a comment was posted on your idea')
      ->markdown('emails.comment-create', [
        'comment' => $this->comment,
      ]);
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function toDatabase($notifiable)
  {
    return [
      'comment_id' => $this->comment->id,
      'comment_body' => $this->comment->body,
      'user_avator' => $this->comment->user->getAvator(),
      'user_name' => $this->comment->user->name,
      'idea_id' => $this->comment->idea->id,
      'idea_slug' => $this->comment->idea->slug,
      'idea_title' => $this->comment->idea->title,
    ];
  }
}
