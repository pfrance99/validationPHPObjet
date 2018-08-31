<?php
include('config.php');
 /**
  *
  */
 class Model
 {
   protected $dbConnect;
   protected $tableName;

   function __construct()
   {
     $this->config = Config::getAll();
     $this->dbConnect = new PDO('mysql:host=localhost;dbname=' . $this->config['DB_NAME'], $this->config['DB_USER'], $this->config['DB_PASS']);
   }

   public function getAll() {
     $sql = 'SELECT * FROM ' . $this->tableName;
     $query = $this->dbConnect->prepare($sql);
     $query->execute();
     $results = $query->fetchAll(PDO::FETCH_OBJ);
     return $results;
   }

   public function getOne($identifierKey, $identifierValue){
      // Récupérer une page spécifique
      $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $identifierKey . ' = "' . $identifierValue . '" LIMIT 1';
      $query = $this->dbConnect->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      return ($results ? $results[0] : false);
   }

   public function updateOne(String $title, String $content, $hidden)
   {
     $sql = 'UPDATE ' . $this->tableName .' SET content = "'. $content .'", hidden = "'. $hidden .'" WHERE title = "' . $title . '"';
     $update = $this->dbConnect->prepare($sql);
     $update->execute();
     header('Location: '. $this->config['ADMIN_VIEW']);
   }

   public function checkCredentials($username, $password)
   {
     $sql = 'SELECT username, password FROM ' . $this->tableName . ' WHERE username = "' . $username . '" AND password =  "' . $password.'" LIMIT 1';
     $query = $this->dbConnect->prepare($sql);
     $query->execute();
     $results = $query->fetchAll(PDO::FETCH_OBJ);
     if(empty($results))
     {
       header('Location: ' . $this->config['LOGIN_URL']);
     } else {
       $_SESSION['currentUser'] = $username;
       $sql = 'UPDATE ' . $this->tableName .' SET is_connected = "1" WHERE username = "' . $username . '" AND password = "' . $password . '"';
       $update = $this->dbConnect->prepare($sql);
       $update->execute();
       header('Location: '. $this->config['ADMIN_VIEW']);
     }

   }
 }
