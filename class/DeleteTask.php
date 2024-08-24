<?php
class DeleteTask extends Task {

    public function execute() {
        if (empty($this->id)) return false;
        $con = $this->con();
        $sql = "DELETE FROM `tbl_todolist` WHERE `id` = :id";
        $stmt = $con->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }
}

?>