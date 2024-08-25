<?php
    function insertT() {
        if (!empty($_POST['items'])) {
            $insert = new insert($_POST['items']);
            if ($insert->insertTask()) {
                echo '<script>
                        Swal.fire({
                            title: "Success!",
                            text: "Data Inserted Successfully.",
                            icon: "success",
                            confirmButtonText: "OK"
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            title: "Error!",
                            text: "Data not Inserted.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                      </script>';
            }
        }
    }
    
    function deleteT(){
        if(!empty($_POST['delete'])){
            $delete = new delete($_POST['delete']);
            if($delete->deleteTask()){
                echo '<div class="alert alert-warning col-md-9 alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> Data Deleted Successfuly.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }else{
                echo '<div class="alert alert-danger col-md-9 alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> Data not Deleted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                
                 }
        }
    }
    
    function editT(){
        if(!empty($_POST['edit'])){
            $edit = new edit($_POST['edit']);
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
    
    function mother(){
        require_once './class/Mother_info.php';
        $mother = new Mother_info();

        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['insert'])) {
                $data = [
                    'name' => $_POST['name'] ?? null,
                    'age' => $_POST['age'] ?? null,
                    'occupation' => $_POST['occupation'] ?? null
                ];
                if ($mother->insert($data)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Inserted Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data not Inserted.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            } elseif (isset($_POST['update'])) {
                $id = $_POST['id'];
                $data = [
                    'name' => $_POST['name'] ?? null,
                    'age' => $_POST['age'] ?? null,
                    'occupation' => $_POST['occupation'] ?? null
                ];
                if ($mother->update($id, $data)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Updated Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data Update Failed.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            } elseif (isset($_POST['delete'])) {
                $id = $_POST['id'];
                if ($mother->delete($id)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Deleted Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data Not Deleted.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            }
        }return $message;
    }
    
    function father(){
        require_once './class/Father_info.php';
        $father = new Father_info();

        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['insert'])) {
                $data = [
                    'name' => $_POST['name'] ?? null,
                    'age' => $_POST['age'] ?? null,
                    'occupation' => $_POST['occupation'] ?? null
                ];
                if ($father->insert($data)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Inserted Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data not Inserted.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            } elseif (isset($_POST['update'])) {
                $id = $_POST['id'];
                $data = [
                    'name' => $_POST['name'] ?? null,
                    'age' => $_POST['age'] ?? null,
                    'occupation' => $_POST['occupation'] ?? null
                ];
                if ($father->update($id, $data)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Updated Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data Update Failed.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            } elseif (isset($_POST['delete'])) {
                $id = $_POST['id'];
                if ($father->delete($id)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Deleted Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data Not Deleted.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            }
        }return $message;
    }

    function cases(){
        require_once './class/Cases_info.php';
        $father = new Cases_info();

        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['insert'])) {
                $data = [
                    'itemnumber' => $_POST['itemnumber'] ?? null,
                    'controlnumber' => $_POST['controlnumber'] ?? null,
                    'partyrepresented' => $_POST['partyrepresented'] ?? null,
                    'gender' => $_POST['gender'] ?? null,
                    'casetitle' => $_POST['casetitle'] ?? null,
                    'court' => $_POST['court'] ?? null,
                    'casenumber' => $_POST['casenumber'] ?? null,
                    'causeofaction' => $_POST['causeofaction'] ?? null,
                    'causeofaction' => $_POST['causeofaction'] ?? null,
                    'casestatus' => $_POST['casestatus'] ?? null,
                    'lastactiontaken' => $_POST['lastactiontaken'] ?? null,
                    'causeoftermination' => $_POST['causeoftermination'] ?? null,
                    'casedate' => $_POST['casedate'] ?? null,
                    'casetype' => $_POST['casetype'] ?? null,
                    'startdate' => $_POST['startdate'] ?? null

                ];
                if ($father->insert($data)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Inserted Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data not Inserted.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
            } elseif (isset($_POST['update'])) {
                $id = $_POST['id'];
                $data = [
                    'name' => $_POST['name'] ?? null,
                    'age' => $_POST['age'] ?? null,
                    'occupation' => $_POST['occupation'] ?? null
                ];
                if ($father->update($id, $data)) {
                    $message = '<script>
                                Swal.fire({
                                    title: "Success!",
                                    text: "Data Updated Successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    smoothReload();
                                });
                            </script>';
                } else {
                    $message = '<script>
                                Swal.fire({
                                    title: "Error!",
                                    text: "Data Update Failed.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>';
                }
                } elseif (isset($_POST['delete'])) {
                    $id = $_POST['delete_id'];
                    if ($father->delete($id)) {
                        $message = '<script>
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Data Deleted Successfully.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        smoothReload();
                                    });
                                </script>';
                    } else {
                        $message = '<script>
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Data Not Deleted.",
                                        icon: "error",
                                        confirmButtonText: "OK"
                                    });
                                </script>';
                    }
                }
        }return $message;
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