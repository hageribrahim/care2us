<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $useremail;
    private $username;
    private $mobile;
    private $askdoctor;
    private $homeclinic;
    Private $accepthomeclinic;
    Private $rejecthomeclinic;
    Private $requestmedicine;

    public function __construct($useremail,$username,$mobile,$askdoctor,$homeclinic,$accepthomeclinic,$rejecthomeclinic,$requestmedicine)
    {
        $this->useremail=$useremail;
        $this->username = $username;
        $this->mobile=$mobile;
        $this->askdoctor=$askdoctor;
        $this->homeclinic=$homeclinic;
        $this->accepthomeclinic=$accepthomeclinic;
        $this->rejecthomeclinic=$rejecthomeclinic;
        $this->requestmedicine=$requestmedicine;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hageribrahim04@gmail.com')->view('back.pages.client.client_mails')
            ->with('email', $this->useremail)
            ->with('username', $this->username)
            ->with('mobile',  $this->mobile)
            ->with('askdoctor', $this->askdoctor)
            ->with('homeclinic',$this->homeclinic)
            ->with('accepthomeclinic',$this->accepthomeclinic)
            ->with('rejecthomeclinic',$this->rejecthomeclinic)
            ->with('requestmedicine',$this->requestmedicine);
    }
}
