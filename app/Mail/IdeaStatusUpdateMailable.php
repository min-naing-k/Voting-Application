<?php

namespace App\Mail;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdeaStatusUpdateMailable extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  public $idea;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(Idea $idea)
  {
    $this->idea = $idea;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->subject('An Idea you voted for has changed to ' . $this->idea->status->name)
      ->markdown('emails.idea-status-updated');
  }
}
