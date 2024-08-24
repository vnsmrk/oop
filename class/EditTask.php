<?php
class EditTask extends Task {

    public function execute() {
        if (empty($this->id)) return false;
        $con = $this->con();
        $sql = "UPDATE `tbl_todolist` SET `status` = 'COMPLETED', `date_completed` = NOW() WHERE `id` = :id";
        $stmt = $con->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }
}

?>