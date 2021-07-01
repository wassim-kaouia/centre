<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentMail extends Mailable
{
    use Queueable, SerializesModels;

   
    public $mydata;

    public function __construct($mydata)
    {
        $this->mydata = $mydata;
    }

  
    public function build()
    {   
        return $this->view('emails.student_create',['mydata' => $this->mydata]);
    }
}
