<?php
class Config {
    private $user = 'root';
    private $password = '';
    private $pdo = null;

    protected function con() {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=tbl', $this->user, $this->password);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return $this->pdo;
    }
}

?>