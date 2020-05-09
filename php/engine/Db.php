<?php

class Db{
    private $connect;
    public function __construct(){
        $this->connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');
    }
    public function registration($fullName, $age, $placeOfBirth, $aboutMe, $profession, $email, $password){
        if ($this->getPasswordByEmail($email)['status']) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'user already exists';
            return;
        }

        $sth = $this->connect->prepare("INSERT INTO user (full_name, age, place_of_birth, about_me, profession, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $status = $sth->execute(Array($fullName, $age, $placeOfBirth, $aboutMe, $profession, $email, $password));
        if (!$status) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'error of insert into database';
            return;
        }

        $this->response['status'] = true;
        return $this->response;

    }
    public function getPasswordByEmail($email){
        $sth = $this->connect->prepare("SELECT password FROM user WHERE email = ?");
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

    public function selectProjects(){
        $stmt = $this->connect->query("SELECT id, img, name , type_of_project from project");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectScripts(){
        $stmt = $this->connect->query("SELECT project.name, the_script.title FROM `the_script` JOIN `project` ON the_script.id_project= project.id");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectUsers(){
        $stmt = $this->connect->query("SELECT id, avatar, full_name, profession, rating, age, place_of_birth from user");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCard(){
        $stmt = $this->connect->query("SELECT id,  full_name, profession, age, place_of_birth, about_me, rating, portfolio, avatar from user WHERE id = 1");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}
