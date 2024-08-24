<?php
require_once './class/Father_info.php';

$father = new Father_info();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insert'])) {
        $data = [
            'name' => $_POST['name'] ?? null,
            'age' => $_POST['age'] ?? null,
            'occupation' => $_POST['occupation'] ?? null
        ];
        $father->insert($data);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $data = [
            'name' => $_POST['name'] ?? null,
            'age' => $_POST['age'] ?? null,
            'occupation' => $_POST['occupation'] ?? null
        ];
        $father->update($id, $data);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $father->delete($id);
    }
}

$fatherData = $father->view();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Father Info CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark shadow">
  <div class="container-fluid">
    <span class="navbar-brand mb-2 h1">Todo List</span>
    <a class="navbar-brand" href="mother_info.php">Mothert</a>
    </div>
  </nav>
    <div class="container mt-5">
        <h2>Father Info</h2>
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
            <button type="submit" name="insert" class="btn btn-primary">Add Father</button>
        </form>

        <h3 class="mt-5">Father Info List</h3>
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
                <?php foreach ($fatherData as $data): ?>
                <tr>
                    <td><?= htmlspecialchars($data['name']) ?></td>
                    <td><?= htmlspecialchars($data['age']) ?></td>
                    <td><?= htmlspecialchars($data['occupation']) ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="setModalData('<?= htmlspecialchars($data['id']) ?>', '<?= htmlspecialchars($data['name']) ?>', '<?= htmlspecialchars($data['age']) ?>', '<?= htmlspecialchars($data['occupation']) ?>')">Edit</button>
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Father Info</h5>
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
                        <button type="submit" name="update" class="btn btn-warning">Update Father</button>
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
    </script>
</body>
</html>