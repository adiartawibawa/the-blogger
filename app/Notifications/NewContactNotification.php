<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Contact $contact)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->contact->subject ?? 'Portfolio Inquiry';

        return (new MailMessage)
            ->subject("New Contact: {$subject}")
            ->greeting("New message from {$this->contact->name}!")
            ->line("**Email:** {$this->contact->email}")
            ->when(
                $this->contact->subject,
                fn($mail) =>
                $mail->line("**Subject:** {$this->contact->subject}")
            )
            ->line("**Message:**")
            ->line($this->contact->message)
            ->action('View in Admin', url('/admin/contacts'))
            ->line("This message was sent from your portfolio contact form.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
