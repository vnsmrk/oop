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
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header editbg text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
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
                        <button type="submit" name="update" class="btn btn-success sideback radiusb shadowbottom">Add Data</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header deletebg text-light">
                <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <h4>Do you want to delete this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary radiusb shadowbottom" data-dismiss="modal">NO</button>
                    <button type="submit" name="delete" class="btn btn-danger deletebtnbg radiusb shadowbottom">Delete it.</button>
                </div>
            </form>
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
                    <table id="datatableid" class="table w-100">
                        <thead>
                            <tr class="text-center sideback text-light">
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
                                <button type="button" class="btn viewbtn"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn editbtn"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn deletebtn"><i class="fa fa-trash"></i></button>
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


    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>



    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>

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


<!-- delete -->
     <script>
       $(document).ready(function () {

// Delete button functionality
$('.deletebtn').on('click', function () {

    // Show the delete modal
    $('#deletemodal').modal('show');

    // Get the closest <tr> element (which contains the row data)
    var tr = $(this).closest('tr');

    // Extract the ID from the first cell in the row
    var data = tr.children('td').map(function () {
        return $(this).text();
    }).get();

    // Assuming the ID is in the first cell (you may need to adjust this)
    $('#delete_id').val(data[0]);
});
});

    </script>
   
</body>

</html>