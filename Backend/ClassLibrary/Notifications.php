<?php

namespace School;
use Db;

include_once ("../ClassLibrary/School.php");
$connect = new \Db();

class Notifications extends School, Db
{
    private $email;
    private $password;
    private $sender;
    private $receiver;
    private $message;
    private $file;
    private dateSent;
    private dateReceived;
public function __construct($email, $password, $sender, $receiver, $message, $file){
    $this->email=$email;
    $this->password=$password;
    $this->sender=$sender;
    $this->receiver=$receiver;
    $this->message=$message;
    $this->file=$file;
}
public function sendEmail($email, $password, $receiver, $message){

}
public function receiveMail($email, $password, $sender, $message){

}
public function deleteEmail($email, $password, $receiver, $message){

}
}