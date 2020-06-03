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

        $sth = $this->connect->prepare("INSERT INTO users (full_name, age, id_gender, id_profession, place_of_birth, about_me, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $status = $sth->execute(Array($fullName, $age, $gender, $profession, $placeOfBirth, $aboutMe, $email, $password));
        if (!$status) {
            $this->response['status'] = false;
            return;
        }

        $this->response['status'] = true;
        $this->response['id'] = $this->connect->lastInsertId();
        return $this->response;

    }
    public function getPasswordByEmail($email){
        $sth = $this->connect->prepare("SELECT password, id FROM users WHERE email = ?");
        $sth->execute(Array($email));
        if ($data = $sth->fetch()){
            $this->response['status'] = true;
            $this->response['data'] = $data;
        } else {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'This user does not exist';
        }
        return $this->response;
    }

    public function selectProjects(){
        $stmt = $this->connect->query("SELECT projects.id, projects.img, projects.name , types_of_projects.type FROM `projects` 
            JOIN `types_of_projects` ON projects.id_type_of_project = types_of_projects.id  
            JOIN `users` ON projects.id_user = users.id WHERE users.id = ".$_SESSION['user_id']."");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectScripts($project){
        $stmt = $this->connect->query("SELECT projects.id, the_scripts.id_project, projects.name, the_scripts.title FROM `the_scripts` 
           RIGHT JOIN `projects` ON the_scripts.id_project = projects.id 
           RIGHT JOIN `users` ON projects.id_user = users.id WHERE projects.id = $project and users.id = ".$_SESSION['user_id']."");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public function selectUsers(){
        $stmt = $this->connect->query("SELECT users.id,  users.avatar, users.full_name, professions.type, users.age, users.place_of_birth from `users` 
            JOIN `professions` ON users.id_profession = professions.id");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCards($id){
        $stmt = $this->connect->query("SELECT  users.full_name, professions.type, users.age, users.place_of_birth, users.about_me, users.portfolio, users.avatar from `users` 
            JOIN `professions` ON users.id_profession = professions.id WHERE users.id = $id");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectProfessions(){
        $stmt = $this->connect->query("SELECT * from `professions` ");   
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // public function selectCurrentUserProfession(){
    //     $stmt = $this->connect->query("SELECT * from `professions` 
    //         RIGHT JOIN  `users` ON professions.id = users.id_profession  ");   
    //     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $data;
    // }
    public function selectParticipants($project){
        $stmt = $this->connect->query("SELECT projects.name, professions.type, users.avatar, users.full_name, projects.id  FROM `participants`
           RIGHT JOIN `users` ON participants.id_user = users.id JOIN `professions` ON users.id_profession = professions.id 
           RIGHT JOIN `projects` ON participants.id_project = projects.id WHERE projects.id = $project");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectAvatars(){
        $stmt = $this->connect->query("SELECT users.avatar FROM `users` WHERE users.id = ".$_SESSION['user_id']."");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCurrentUser(){
        $stmt = $this->connect->query("SELECT users.id, users.full_name, professions.type, users.age, users.id_gender, users.place_of_birth, users.about_me, users.portfolio, users.avatar from `users` 
        JOIN `professions` ON users.id_profession = professions.id WHERE users.id =  ".$_SESSION['user_id']."");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $data;
    }
    
    public function insert($query, $data){
        $prepareStatement = $this->connect->prepare($query);
        return $prepareStatement->execute($data);
    }
    public function delete($table, $id){
        $prepareStatement = $this->connect->prepare("DELETE FROM $table WHERE id= ?");
        return $prepareStatement->execute(Array($id));
    }
    public function update($query, $data){
        $prepareStatement = $this->connect->prepare($query);
        return $prepareStatement->execute($data);
    }
    public function selectAll($query){
        $statement = $this->connect->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

