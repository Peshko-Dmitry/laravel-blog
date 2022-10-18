<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dataForm = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //получаем данные с контроллера и записываем в dataForm
    public function __construct($dataForm)
    {
        $this->dataForm = $dataForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // пережаем в шаблон данные о пользователе
        return $this->view('email.forgot')->with($this->dataForm);
    }
}
