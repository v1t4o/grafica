<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use Uspdev\Replicado\Pessoa;

class AutorizacaoMail extends Mailable
{
    use Queueable, SerializesModels;
    private $pedido;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {   
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Novo pedido de {$this->pedido->user->name} esperando ser autorizado";
        return $this->view('mails.autorizacao')
        ->to(Pessoa::emailusp($this->pedido->responsavel_centro_despesa))
        ->subject($subject)
        ->with([
            'pedido' => $this->pedido,
        ]);
    }
}