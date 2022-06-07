<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order_Id,$user,$details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$order_Id)
    {
        $this->user=$user;
        $this->order_id=$order_Id;
        $this->details=[
            'title'=>'Hello '.$this->user->name,
            'body' =>'Your Order : OR'.$this->order_Id.'Cancelled Successfuly',
            'footer'=>'Thanks for using Marketo',
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details=$this->details;
        $order_Id=$this->order_Id;
        $user=$this->user;
        return $this->view('Mail.OrderMail',compact('details','order_Id','user'));
    }
}
