<?php
    function insertT(){
        if(!empty($_GET['items'])){
        $insert = new insert($_GET['items']);
        if($insert->insertTask()){
            echo '<div class="alert alert-success col-md-9 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Data Inserted Successfuly.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            echo '<div class="alert alert-danger col-md-9 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Data not Inserted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            
             }
        }
    }


    function deleteT(){
        if(!empty($_GET['delete'])){
        $delete = new delete($_GET['delete']);
        if($delete->deleteTask()){
            echo '<div class="alert alert-warning col-md-9 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Data Deleted Successfuly.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            echo '<div class="alert alert-danger col-md-9 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Data not Deletd.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            
             }
        }
    }

    function editT(){
        if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->editTask()){
            echo '<div class="alert alert-info col-md-9 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Data Updated Successfuly.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            echo '<div class="alert alert-info col-md-9 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Data not Updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            
             }
        }
    }

    function viewTable(){
        $view = new view();
        $view->viewData();
        $view->viewCompletedData();

    }
    function taskCrud(){
        insertT();
        editT();
        deleteT();

    }
?>