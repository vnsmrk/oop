<?php
class insertTask extends Task {

    public function execute() {
        if (empty($this->task)) return false;

        $con = $this->con();
        $sql = "INSERT INTO `tbl_todolist` (`item`) VALUES (:task)";
        $stmt = $con->prepare($sql);
        return $stmt->execute(['task' => $this->task]);
    }
}

?>