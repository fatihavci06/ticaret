<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\kullanici;
use App\Models\User;

class KullaniciKayitMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $kullanici;
    public function __construct(User $kullanici)
    {
        //
        $this->kullanici=$kullanici;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('app.name').'- Kullanıcı Kaydı')
        ->from('ticaret@gmail.com')
        ->view('email.kullanici_kayit');
    }
}
