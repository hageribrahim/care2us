<?php
/**
 * Created by PhpStorm.
 * User: Corpy
 * Date: 6/20/2018
 * Time: 4:40 PM
 */

namespace App\Mail;
Use App\Pharmacy;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PharmacyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $username;
    private $pharmacyName;
    private $offer;
    Private $request;
    private $accept;
    private $reject;
    private $client;
    public function __construct($useremail , $username,$pharmacyName ,$offer,$request,$accept,$reject,$client)
    {
        $this->useremail = $useremail;
        $this->username = $username;
        $this->pharmacyName=$pharmacyName;
        $this->offer=$offer;
        $this->request=$request;
        $this->accept=$accept;
        $this->reject= $reject;
        $this->client=$client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hageribrahim04@gmail.com')->view('back.pages.pharmacy.Pharmacy_mails')
            ->with('email', $this->useremail)
            ->with('username', $this->username)
            ->with('pharmacyName',  $this->pharmacyName)
            ->with('offer', $this->offer)
            ->with('request',$this->request)
            ->with('accept',$this->accept)
            ->with('reject',$this->reject)
            ->with('client',$this->client);

    }
}