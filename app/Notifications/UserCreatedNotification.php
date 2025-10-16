<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreatedNotification extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nuevo usuario registrado')
            ->greeting('¡Hola!')
            ->line('Se ha registrado un nuevo usuario en la aplicación.')
            ->line('**Nombre:** ' . $this->user->name)
            ->line('**Correo:** ' . $this->user->email)
            ->action('Ver detalles', url('/users'))
            ->line('Gracias por usar nuestra aplicación.');
    }

    /**
     * Summary of toDatabase
     * @param mixed $notifiable
     * @return array{email: mixed, message: string, title: string, user_id: mixed}
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Nuevo usuario registrado',
            'message' => 'El usuario ' . $this->user->name . ' se ha registrado en el sistema.',
            'user_id' => $this->user->id,
            'email' => $this->user->email,
        ];
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
