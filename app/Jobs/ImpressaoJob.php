<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use Illuminate\Support\Facades\Mail;
use App\Mail\ImpressaoMail;
use Uspdev\Replicado\Pessoa;

class ImpressaoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $pedido;
    public $codpes;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido, $codpes)
    {
        $this->pedido = $pedido;
        $this->codpes = $codpes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(Pessoa::emailusp($this->codpes) != false){
            Mail::send(new ImpressaoMail($this->pedido, $this->codpes));
        }
    }
}
