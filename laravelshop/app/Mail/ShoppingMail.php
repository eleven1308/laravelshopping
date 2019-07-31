<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bill;
class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;
    public $billdetail =  [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $bill, $billdetail)
    {
        $this->bill = $bill;
        $this->billdetail = $billdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping');
    }
}
