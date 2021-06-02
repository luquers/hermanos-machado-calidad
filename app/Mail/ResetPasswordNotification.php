<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordNotification extends Mailable
{
    use Queueable, SerializesModels, Notifiable;

    /**
     * Url para restaurar la contraseña.
     *
     * @var string
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->logo = config('brand.logo');
        $this->urlHome = config('app.url');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.email');
    }
}
