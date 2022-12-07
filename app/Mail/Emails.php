<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Emails extends Mailable
{
    use Queueable, SerializesModels;

    protected $content;
    protected $setting;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$setting)
    {
        $this->content    = $content;
        $this->setting    = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->setting->email , $this->content->from_name)
                    ->subject($this->content->subject)
                    ->markdown('template_email.email_default', 
                        [
                            'password'   => $this->password, 
                            'email'      => ucwords($this->email),
                            'content'    => $this->content->content,
                            'from_name'  => $this->content->from_name,
                            'from_email' => $this->content->from_email,
                            'description'=> $this->content->description
                         ]);
    }
}
