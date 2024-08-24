<?php
require_once 'php/functions.php';

// Call the mother() function to handle the CRUD operations and get the message
$message = mother();

// Retrieve the mother data for display
$mother = new Mother_info();
$motherData = $mother->view();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mother Info CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <span class="navbar-brand mb-2 h1">Todo List</span>
        <a class="navbar-brand" href="index.php"></a>
        <a class="navbar-brand" href="father_info.php">Father</a>
    </div>
</nav>
<div class="container mt-5">
    <h2>Mother Info</h2>

    <!-- Display the alert message -->
    <?php if ($message) echo $message; ?>
    <?php mother(); ?>
    
    <form method="POST" action="">
        <input type="hidden" name="id">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" required>
        </div>
        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" name="occupation" required>
        </div>
        <button type="submit" name="insert" class="btn btn-primary">Add Mother</button>
    </form>

    <h3 class="mt-5">Mother Info List</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Occupation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($motherData as $data): ?>
            <tr>
                <td><?= htmlspecialchars($data['name']) ?></td>
                <td><?= htmlspecialchars($data['age']) ?></td>
                <td><?= htmlspecialchars($data['occupation']) ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="setModalData('<?= htmlspecialchars($data['id']) ?>', '<?= htmlspecialchars($data['name']) ?>', '<?= htmlspecialchars($data['age']) ?>', '<?= htmlspecialchars($data['occupation']) ?>')">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDeleteModal('<?= htmlspecialchars($data['id']) ?>')">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Mother Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="editAge" name="age" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOccupation" class="form-label">Occupation</label>
                        <input type="text" class="form-control" id="editOccupation" name="occupation" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-warning">Update Mother</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="" id="deleteForm">
                    <input type="hidden" name="id" id="deleteId">
                    <button type="submit" name="delete" class="btn btn-danger">Yes, Delete it</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setModalData(id, name, age, occupation) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editAge').value = age;
        document.getElementById('editOccupation').value = occupation;
    }

    function confirmDeleteModal(id) {
        document.getElementById('deleteId').value = id;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {});
        deleteModal.show();
    }
</script>

</body>
</html>
