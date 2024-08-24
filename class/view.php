<?php
class View extends Config {

    public function viewData($status = 'PENDING') {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = :status";
        $stmt = $con->prepare($sql);
        $stmt->execute(['status' => $status]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $header = ($status === 'PENDING') ? 'Pending Task' : 'Completed Task';
        echo "<h3 class='mb-5'>$header</h3>";
        echo "<table class='table table-dark table-striped table-hover table-sm'>";
        echo "<thead>
                <tr>
                    <th>Task Item</th>
                    <th>Action</th>
                </tr>
             </thead><tbody>";

        foreach ($result as $data) {
            echo "<tr>";
            echo "<td>{$data['item']}</td>";
            echo "<td>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='edit' value='{$data['id']}'>
                        <button type='submit' class='btn btn-info'>Mark as Completed</button>
                    </form>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='delete' value='{$data['id']}'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
}


?>