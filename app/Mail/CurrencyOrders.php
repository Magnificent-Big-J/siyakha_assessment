<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class CurrencyOrders extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $u_info;
    public $info;
    public $amount;
    public $disc = 0;
    public function __construct(Order $order)
    {

        $this->info = $order->currency->description . '  (' . $order->currency->name . ')';
        $this->amount = $order->zar_amt;
        $this->u_info = $order->user->name;
        if($order->currency->name == 'EUR'){
            $this->disc = $this->amount * 2 / 100;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('CurrencyOrder')
            ;
    }
}
