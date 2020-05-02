<?php

class Db{
    private $connect;
    public function __construct(){
        $this->connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');
    }
    public function registration($email , $password){
        if ($this->getEmail($email)['status']) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'user already exists';
        } else {
            $sth = $this->connect->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
            $status = $sth->execute(Array($email, $password));
        if (!$status) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'error of insert into database';
        } else {
            $this->response['status'] = true;
        } 
               }
        return $this->response;
    }   
    public function getEmail($email){
        $sth = $this->connect->prepare("SELECT * FROM user WHERE email = ?");
        $sth->execute(Array($email));
    if ($data = $sth->fetch()){
        $this->response['status'] = true;
        $this->response['data'] = $data;
    } else {
        $this->response['status'] = false;
        $this->response['errorInfo'] = 'error of select from database';
    }
    return $this->response;
}
}

