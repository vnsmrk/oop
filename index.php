<?php
require_once 'php/init.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello, world!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark shadow">
  <div class="container-fluid">
    <span class="navbar-brand mb-2 h1">Todo List</span>
    <a class="navbar-brand" href="father_info.php">Link Text</a>
    <a class="navbar-brand" href="mother_info.php">Link Text</a>
    </div>
  </nav>

  <div class="container mt-5">
    <?php taskCrud(); ?>
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-9 form-group">
          <input class="form-control" type="text" name="items" placeholder="Input"></input>
        </div>
        <div class="col-md">
          <input class="btn btn-success" type="submit" value="Add Task"></input>    
        </div>
      </div>
    </form>
    <?php viewTable(); ?>
  </div>

</body>
</html>