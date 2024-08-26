<?php
   require_once 'php/init.php';
   $message = cases();
   $cases = new Cases_info();
   $casesData = $cases->view();
   ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> User Home Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
    <link rel="stylesheet" href="./customcss/custom.css"/>
    <script src="./customjs/functions.js"></script>

</head>

<body class="generalbg">
    <!-- Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header sideback text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Add Account Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php if ($message) echo $message; ?>

                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">Item No.:</label>
                                    <input type="text" class="form-control" name="itemnumber" id="itemnumber" placeholder="Item Number" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Control No.:</label>
                                    <input type="text" class="form-control" name="controlnumber" id="controlnumber" placeholder="Control Number" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Party Represented:</label>
                                    <select id="partyrepresented" name="partyrepresented" class="form-control" required>
                                        <option disabled selected>Party Represented</option>
                                        <option value="accused">Accused</option>
                                        <option value="respondents">Respondents</option>
                                        <option value="defendants">Defendants</option>
                                        <option value="petitioner">Petitioner</option>
                                        <option value="plaintiff">Plaintiff</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender" class="form-label">Gender:</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option disabled selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">Title of Case:</label>
                                    <input type="text" class="form-control" name="casetitle" id="casetitle" placeholder="Title of Case" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Court/Body:</label>
                                    <select id="court" name="court" class="form-control" required>
                                        <option disabled selected>Select Court</option>
                                        <option value="RTC 34">RTC 34</option>
                                        <option value="RTC 4">RTC 4</option>
                                        <option value="RTC 3">RTC 3</option>
                                        <option value="MTCC">MTCC</option>
                                        <option value="MCTC-CARMEN">MCTC-CARMEN</option>
                                        <option value="MCTC STO. TOMAS">MCTC STO. TOMAS</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Case Type:</label>
                                    <select id="casetype" name="casetype" class="form-control" required>
                                        <option disabled selected>Type of Case</option>
                                        <option value="Criminal">Criminal</option>
                                        <option value="Administrative">Administrative</option>
                                        <option value="Civil">Civil</option>
                                        <option value="Appealed">Appealed</option>
                                        <option value="Labor">Labor</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Case No.:</label>
                                    <input type="text" class="form-control" name="casenumber" id="casenumber" placeholder="Case Number" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">Last Action Taken:</label>
                                    <input type="text" class="form-control" name="lastactiontaken" id="lastactiontaken" placeholder="Last Action Taken" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="acasestatus" class="form-label">Status of Case:</label>
                                    <select id="casestatus" name="casestatus" class="form-control" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Applied to Probation">Applied to Probation</option>
                                        <option value="Terminated">Terminated</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Case received:</label>
                                    <input type="date" class="form-control" name="startdate" id="startdate" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Date of Termination:</label>
                                    <input type="date" class="form-control" name="casedate" id="casedate" placeholder="Date of Termination" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Cause of Action:</label>
                                    <textarea type="text" class="form-control" name="causeofaction" id="causeofaction" placeholder="Cause of Action" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cause of Termination:</label>
                                    <textarea type="text" class="form-control" name="causeoftermination" id="causeoftermination" placeholder="Cause of Termination" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary radiusb shadowbottom" data-dismiss="modal">Close</button>
                        <button type="submit" name="insert" class="btn btn-success sideback radiusb shadowbottom">Add Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header editbg text-light">
                <h5 class="modal-title" id="exampleModalLabel">Edit Case Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="form-group">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Item No.:</label>
                                <input type="text" class="form-control" name="itemnumber" id="itemnumber" placeholder="Item Number" required>
                            </div>
                            <div class="col-md-3">
                                <label>Control No.:</label>
                                <input type="text" class="form-control" name="controlnumber" id="controlnumber" placeholder="Control Number" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Party Represented:</label>
                                <select id="partyrepresented" name="partyrepresented" class="form-control" required>
                                    <option disabled selected>Party Represented</option>
                                    <option value="accused">Accused</option>
                                    <option value="respondents">Respondents</option>
                                    <option value="defendants">Defendants</option>
                                    <option value="petitioner">Petitioner</option>
                                    <option value="plaintiff">Plaintiff</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option disabled selected>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Title of Case:</label>
                                <input type="text" class="form-control" name="casetitle" id="casetitle" placeholder="Title of Case" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Court/Body:</label>
                                <select id="court" name="court" class="form-control" required>
                                    <option disabled selected>Select Court</option>
                                    <option value="RTC 34">RTC 34</option>
                                    <option value="RTC 4">RTC 4</option>
                                    <option value="RTC 3">RTC 3</option>
                                    <option value="MTCC">MTCC</option>
                                    <option value="MCTC-CARMEN">MCTC-CARMEN</option>
                                    <option value="MCTC STO. TOMAS">MCTC STO. TOMAS</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Case Type:</label>
                                <select id="casetype" name="casetype" class="form-control" required>
                                    <option disabled selected>Type of Case</option>
                                    <option value="Criminal">Criminal</option>
                                    <option value="Administrative">Administrative</option>
                                    <option value="Civil">Civil</option>
                                    <option value="Appealed">Appealed</option>
                                    <option value="Labor">Labor</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Case No.:</label>
                                <input type="text" class="form-control" name="casenumber" id="casenumber" placeholder="Case Number" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Last Action Taken:</label>
                                <input type="text" class="form-control" name="lastactiontaken" id="lastactiontaken" placeholder="Last Action Taken" required>
                            </div>
                            <div class="col-md-3">
                                <label for="casestatus" class="form-label">Status of Case:</label>
                                <select id="casestatus" name="casestatus" class="form-control" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Applied to Probation">Applied to Probation</option>
                                    <option value="Terminated">Terminated</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Case received:</label>
                                <input type="date" class="form-control" name="startdate" id="startdate" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Date of Termination:</label>
                                <input type="date" class="form-control" name="casedate" id="casedate" placeholder="Date of Termination" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Cause of Action:</label>
                                <textarea type="text" class="form-control" name="causeofaction" id="causeofaction" placeholder="Cause of Action" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cause of Termination:</label>
                                <textarea type="text" class="form-control" name="causeoftermination" id="causeoftermination" placeholder="Cause of Termination" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary radiusb shadowbottom" data-dismiss="modal">Close</button>
                    <button type="submit" name="insert" class="btn btn-success sideback radiusb shadowbottom">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
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

    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Account Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">
                        <input type="hidden" name="view_id" id="view_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary radiusb shadowbottom" data-dismiss="modal"> CLOSE </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="container-fluid">
    <h2 class="text-start text-md-start">Accounts</h2>
    <div style="text-align:right;">
        <button type="button" class="btn btn-success sideback radiusb shadowbottom" data-toggle="modal" data-target="#adduser">
            ADD
        </button>
    </div>

    <!-- table -->
    <div class="card" style="margin-top: 10px;">
        <div class="card-body">
            <div class="table-responsive">
                <?php if ($message) echo $message; ?>     
                    <table id="datatableid" class="table w-100">
                        <thead>
                            <tr class="text-center sideback text-light"">
                                <th scope="col"  class="d-none">ID</th>
                                <th scope="col" class="tablestart">Name</th>
                                <th scope="col">Email </th>
                                <th scope="col">Password</th>
                                <th scope="col">Type</th>
                                <th scope="col" class="tableend">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($casesData as $data): ?>
                            <tr class="text-center">
                                <td><?= htmlspecialchars($data['itemnumber']) ?></td>
                                <td><?= htmlspecialchars($data['controlnumber']) ?></td>
                                <td><?= htmlspecialchars($data['partyrepresented']) ?></td>
                                <td><?= htmlspecialchars($data['gender']) ?></td>
                                <td>
                                    <button type="button" class="btn editbtn" data-bs-toggle="modal"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn deletebtn" onclick="confirmDeleteModal('<?= htmlspecialchars($data['id']) ?>')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                               
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    

    <!-- datatable -->
    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }
            });

        });
    </script>

    <!-- edit -->
    <script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            // Show the modal
            $('#editmodal').modal('show');

            // Get the row data from the clicked button's parent row
            var $tr = $(this).closest('tr');

            // Map the data from each table cell to an array
            var data = $tr.children("td").map(function () {
                return $(this).text().trim();
            }).get();

            // Log the data array to the console for debugging
            console.log(data);

            // Populate the modal's form fields with the table data
            $('#update_id').val(data[0]);
            $('#itemnumber').val(data[1]);
            $('#controlnumber').val(data[2]);
            $('#partyrepresented').val(data[3]);
            $('#gender').val(data[4]);
            $('#casetitle').val(data[5]);
            $('#court').val(data[6]);
            $('#casetype').val(data[7]);
            $('#casenumber').val(data[8]);
            $('#lastactiontaken').val(data[9]);
            $('#casestatus').val(data[10]);
            $('#startdate').val(data[11]);
            $('#casedate').val(data[12]);
            $('#causeofaction').val(data[13]);
            $('#causeoftermination').val(data[14]);
        });
    });
</script>


    <!-- delete -->
    <script>
                
        function confirmDeleteModal(id) {
            document.getElementById('deleteId').value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {});
            deleteModal.show();
        }
    </script>
   
</body>
</html>