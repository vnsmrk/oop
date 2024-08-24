<?php
   
function handleForm() {
    if (!empty($_POST['items'])) {
        $insertTask = new InsertTask($_POST['items']);
        $insertTask->execute() ? alert('success', 'Data Inserted Successfully.') : alert('danger', 'Data not Inserted.');
    }

    if (!empty($_POST['edit'])) {
        $editTask = new EditTask(null, $_POST['edit']);
        $editTask->execute() ? alert('info', 'Data Updated Successfully.') : alert('info', 'Data not Updated.');
    }

    if (!empty($_POST['delete'])) {
        $deleteTask = new DeleteTask(null, $_POST['delete']);
        $deleteTask->execute() ? alert('warning', 'Data Deleted Successfully.') : alert('danger', 'Data not Deleted.');
    }
}

function alert($type, $message) {
    echo "<div class='alert alert-$type col-md-9 alert-dismissible fade show' role='alert'>
            <strong>Holy guacamole!</strong> $message
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
}
    
?>