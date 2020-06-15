<?php
session_start();
class Db
{
    private $connect;
    public function __construct()
    {
        $this->connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');
    }
    public function registration($fullName, $age, $gender, $profession, $placeOfBirth, $aboutMe,  $email, $password)
    {
        if ($this->getPasswordByEmail($email)['status']) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'Пользователь с таким Email уже существует';
            return $this->response;
        }

        $sth = $this->connect->prepare("INSERT INTO `users` (full_name, age, id_gender, id_profession, place_of_birth, about_me, email, password ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $status = $sth->execute(array($fullName, $age, $gender, $profession, $placeOfBirth, $aboutMe, $email, $password));
        if (!$status) {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'Пользователь не зарегистрирован';
            return $this->response;
        }
        $this->response['status'] = true;
        $this->response['id'] = $this->connect->lastInsertId();
        return $this->response;
    }
    public function getPasswordByEmail($email)
    {
        $sth = $this->connect->prepare("SELECT password, id FROM users WHERE email = ?");
        $sth->execute(array($email));
        if ($data = $sth->fetch()) {
            $this->response['status'] = true;
            $this->response['data'] = $data;
        } else {
            $this->response['status'] = false;
            $this->response['errorInfo'] = 'Такого пользователя не существует';
        }
        return $this->response;
    }

    public function selectProjects()
    {
        $stmt = $this->connect->prepare("SELECT  projects.id, projects.img, projects.name, types_of_projects.type FROM `projects` 
        JOIN `types_of_projects` ON projects.id_type_of_project = types_of_projects.id 
        LEFT JOIN `participants` ON projects.id = participants.id_project 
        JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE  users.id = :user_id GROUP BY projects.id");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectProject($id)
    {
        $stmt = $this->connect->prepare("SELECT projects.id_user, projects.id, projects.img, projects.name , types_of_projects.type FROM `projects` 
            JOIN `types_of_projects` ON projects.id_type_of_project = types_of_projects.id  
            LEFT JOIN `participants` ON projects.id = participants.id_project
            JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE users.id = :user_id AND  projects.id = :id GROUP BY projects.id  ");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as &$row) {
            if ($row['id_user'] === $_SESSION['user_id']) {
                $row['author'] = true;
            } else {
                $row['author'] = false;
            }
        }
        return $data;
    }
    public function selectScripts($project)
    {
        $stmt = $this->connect->prepare("SELECT the_scripts.id as script_id, projects.id, the_scripts.id_project, projects.name, the_scripts.title FROM `the_scripts` 
          JOIN `projects` ON the_scripts.id_project = projects.id 
          LEFT JOIN `participants` ON projects.id = participants.id_project
          JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE projects.id = :project and users.id = :user_id GROUP BY the_scripts.id");
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectScript($project, $id)
    {
        $stmt = $this->connect->prepare("SELECT the_scripts.id as script_id, projects.id, the_scripts.id_project, the_scripts.title FROM `the_scripts` 
          JOIN `projects` ON the_scripts.id_project = projects.id
          LEFT JOIN `participants` ON projects.id = participants.id_project 
          JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE projects.id = :project AND users.id = :user_id AND the_scripts.id = :id");
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectSeries($script)
    {
        $stmt = $this->connect->prepare("SELECT the_scripts.id as script_id, series.id, series.number, series.title, series.id_the_script FROM `series` 
           JOIN `the_scripts` ON series.id_the_script = the_scripts.id 
           JOIN `projects` ON the_scripts.id_project = projects.id 
           LEFT JOIN `participants` ON projects.id = participants.id_project
           JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE the_scripts.id = :script and users.id = :user_id GROUP BY series.id");
        $stmt->bindParam(':script', $script);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectOneSeries($project, $script, $id)
    {
        $stmt = $this->connect->prepare("SELECT the_scripts.id as script_id, series.id as series_id, series.number, series.title, series.text, series.id_the_script, projects.id FROM `series` 
           JOIN `the_scripts` ON series.id_the_script = the_scripts.id 
           JOIN `projects` ON the_scripts.id_project = projects.id 
           LEFT JOIN `participants` ON projects.id = participants.id_project
           JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE projects.id = :project AND the_scripts.id = :script AND series.id = :id  AND users.id = :user_id");
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':script', $script);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectUsers()
    {
        $stmt = $this->connect->prepare("SELECT users.id,  users.avatar, users.full_name, professions.type, users.age, users.place_of_birth from `users` 
            JOIN `professions` ON users.id_profession = professions.id");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCountUsers()
    {
        $stmt = $this->connect->prepare("SELECT COUNT(id) from `users`");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCards($id)
    {
        $stmt = $this->connect->prepare("SELECT  users.full_name, professions.type, users.age, users.place_of_birth, users.about_me, users.portfolio, users.avatar from `users` 
            JOIN `professions` ON users.id_profession = professions.id WHERE users.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectProfessions()
    {
        $stmt = $this->connect->prepare("SELECT * from `professions` ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectTypeOfProjects()
    {
        $stmt = $this->connect->prepare("SELECT * from `types_of_projects` ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectParticipants($project)
    {
        $stmt = $this->connect->prepare("SELECT projects.name, professions.type, users.avatar, users.full_name, projects.id  FROM `participants`
           JOIN `users` ON participants.id_user = users.id JOIN `professions` ON users.id_profession = professions.id 
           JOIN `projects` ON participants.id_project = projects.id WHERE projects.id = :project");
        $stmt->bindParam(':project', $project);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectAvatars()
    {
        $stmt = $this->connect->prepare("SELECT users.avatar, users.full_name FROM `users` WHERE users.id = :user_id");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectCurrentUser()
    {
        $stmt = $this->connect->prepare("SELECT users.id, users.full_name,  professions.type, users.age, users.id_gender, users.place_of_birth, users.about_me, users.portfolio, users.avatar from `users` 
        JOIN `professions` ON users.id_profession = professions.id WHERE users.id = :user_id");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function insert($query, $data)
    {
        $prepareStatement = $this->connect->prepare($query);
        return $prepareStatement->execute($data);
    }
    public function delete($table, $id)
    {
        $prepareStatement = $this->connect->prepare("DELETE FROM $table WHERE id= ?");
        return $prepareStatement->execute(array($id));
    }
    public function update($query, $data)
    {
        $prepareStatement = $this->connect->prepare($query);
        return $prepareStatement->execute($data);
    }
    public function selectEvents($query)
    {
        $statement = $this->connect->prepare($query);
        $statement->bindParam(':user_id', $_SESSION['user_id']);
        $statement->bindParam('id_project', $_SESSION['id_project']);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectPathProject()
    {
        $statement = $this->connect->prepare("SELECT projects.img  FROM `projects` WHERE projects.id = :id_project AND projects.id_user = :user_id");
        $statement->bindParam('id_project', $_SESSION['id_project']);
        $statement->bindParam(':user_id', $_SESSION['user_id']);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectFilters($query)
    {
        $prepareStatement = $this->connect->prepare($query);
        return $prepareStatement->execute();
    }
}
