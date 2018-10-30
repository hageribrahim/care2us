<?php
/**
 * Created by PhpStorm.
 * User: Corpy
 * Date: 6/24/2018
 * Time: 3:11 PM
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class FirmMails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $useremail;
    private $username;
    private $f_name;
    private $acceptoffer;
    private $rejectoffer;
    Private $acceptrequest;
    Private $rejectrequest;

    public function __construct($useremail , $username,$f_name ,$acceptoffer,$rejectoffer,$acceptrequest,$rejectrequest)
    {
        $this->useremail = $useremail;
        $this->username = $username;
        $this->f_name=$f_name;

        $this->acceptoffer=$acceptoffer;
        $this->rejectoffer=$rejectoffer;

        $this->acceptrequest=$acceptrequest;
        $this->rejectrequest=$rejectrequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hageribrahim04@gmail.com')->view('back.pages.firm.firms_mail')
            ->with('email', $this->useremail)
            ->with('username', $this->username)
            ->with('f_name',  $this->f_name)
            ->with('acceptoffer', $this->acceptoffer)
            ->with('rejectoffer',$this->rejectoffer)
            ->with('acceptrequest',$this->acceptrequest)
            ->with('rejectrequest',$this->rejectrequest);
    }
}