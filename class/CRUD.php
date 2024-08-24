<?php
require_once 'config.php';

class CRUD extends config {
    protected $table;

    public function __construct($table) {
        $this->table = $table;
    }

    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_map(function($value) {
            return "'$value'";
        }, array_values($data)));

        $sql = "INSERT INTO `$this->table` ($columns) VALUES ($values)";
        $con = $this->con();
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $updates = implode(", ", array_map(function($key, $value) {
            return "$key='$value'";
        }, array_keys($data), array_values($data)));

        $sql = "UPDATE `$this->table` SET $updates WHERE `id`='$id'";
        $con = $this->con();
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM `$this->table` WHERE `id`='$id'";
        $con = $this->con();
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    public function view($status = null) {
        $sql = "SELECT * FROM `$this->table`";
        if ($status) {
            $sql .= " WHERE `status`='$status'";
        }
        $con = $this->con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
