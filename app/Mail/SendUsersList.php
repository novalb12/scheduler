<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUsersList extends Mailable
{
    use Queueable, SerializesModels;

    public $userList= array();
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userList)
    {
        $this->userList = $userList;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('registeredList')->with('userList',$this->userList);
    }
}
