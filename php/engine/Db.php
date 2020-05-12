<?php
session_start();
class Db{
    private $connect;
    public function __construct(){
        $this->connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');
    }
    public function registration($fullName, $age, $gender, $profession, $placeOfBirth, $aboutMe, $email, $password){
        if ($this->getPasswordByEmail($email)['status']) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'user already exists';
            return;
        }

        $sth = $this->connect->prepare("INSERT INTO user (full_name, age, id_gender, id_profession, place_of_birth, about_me, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $status = $sth->execute(Array($fullName, $age, $gender, $profession, $placeOfBirth, $aboutMe, $email, $password));
        if (!$status) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'error of insert into database';
            return;
        }

        $this->response['status'] = true;
        $this->response['id'] = $this->connect->lastInsertId();
        return $this->response;

    }
    public function getPasswordByEmail($email){
        $sth = $this->connect->prepare("SELECT password, id FROM user WHERE email = ?");
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
        $stmt = $this->connect->query("SELECT  project.img, project.name , type_of_project.type from `project` JOIN `type_of_project` ON project.id_type_of_project = type_of_project.id");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectScripts(){
        $stmt = $this->connect->query("SELECT project.name, the_script.title FROM `the_script` JOIN `project` ON the_script.id_project= project.id");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectUsers(){
        $stmt = $this->connect->query("SELECT  user.avatar, user.full_name, profession.type, user.rating, user.age, user.place_of_birth from `user` JOIN `profession` ON user.id_profession = profession.id");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCard(){
        $stmt = $this->connect->query("SELECT  user.full_name, profession.type, user.age, user.place_of_birth, user.about_me, user.rating, user.portfolio, user.avatar from `user` JOIN `profession` ON user.id_profession = profession.id WHERE user.id = 1");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectProfession(){
        $stmt = $this->connect->query("SELECT * from profession ");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
