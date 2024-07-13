<?php
class view extends config{
    public function viewData(){
        $con= $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'PENDING' ";
        $data = $con->prepare($sql);
        $data->execute();
        $result= $data->fetchAll(PDO::FETCH_ASSOC);
        

        echo "<h3 class='mb-5'> Pending Task </h3>";
        echo "<table class='table table-dark table-striped table-hover table-sm '>";
        echo "<thead> 
                <tr>
                <th>Task Item</th>
                <th>Action</th>

                </tr>
        
             </thead><tbody>";

             foreach ($result as $data){
                echo "<tr>";
                echo "<td> $data[item]</td>";
                echo "<td>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='edit' value='$data[id]'>
                            <button type='submit' class='btn btn-info'>Mark as Completed</button>
                        </form>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='delete' value='$data[id]'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            
        echo "</tbody></table>";

    }


     public function viewCompletedData(){
        $con= $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'COMPLETED' ";
        $data = $con->prepare($sql);
        $data->execute();
        $result= $data->fetchAll(PDO::FETCH_ASSOC);
        

        echo "<h3 class='mb-5 mt-5'> Completed Task </h3>";
        echo "<table class='table table-dark table-striped table-hover table-sm '>";
        echo "<thead> 
                <tr>
                <th>Task Item</th>
                <th>Date Completed</th>

                </tr>
        
             </thead><tbody>";

             foreach ($result as $data){
                 echo "<tr>";
                    echo "<td> $data[item]</td>";
                    echo "<td>$data[date_completed]</td>";

                    
                 echo "</tr>";

             }
        echo "</tbody></table>";

    }
}

?>