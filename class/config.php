<?php

class config{
    private $user='root';
    private $password='';
    private $pdo=null;


    public function con(){
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=todoapp',$this->user, $this->password);
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $this->pdo;
    }

}
?>