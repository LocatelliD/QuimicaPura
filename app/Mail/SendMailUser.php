<?php

namespace App\Mail;

use Illuminate\Http\Request;
use App\Models\Site\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailUser extends Mailable {

    use Queueable,
        SerializesModels;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function build(Request $request) {
        return $this->from('contato@quimicapura.com.br')
                        ->subject('Contato Fale Conosco Site')
                        ->view('emails.test')
                        ->with('cliente', $request);
    }

}
