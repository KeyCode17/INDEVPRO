<?php
session_start();
require 'dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Student CRUD</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('alert.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Member Details
                            <a href="create-account.php" class="btn btn-primary float-end">Add Member</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-dark table-striped table-bordered w-auto text-xsmall" style="overflow-x: scroll">
                            <thead class="thead-light">
                                <tr>
                                    <th>MemberID</th>
                                    <th>Name</th>
                                    <th style="width: 20vw;">Address</th>
                                    <th>Phone</th>
                                    <th>HP</th>
                                    <th>Date</th>
                                    <th>MaxLoan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM datamember";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $dtmember) {
                                ?>
                                        <tr>
                                            <td><?= $dtmember['MemberID']; ?></td>
                                            <td><?= $dtmember['Name']; ?></td>
                                            <td>
                                                <div><?= $dtmember['Address']; ?></div>
                                            </td>
                                            <td><?= $dtmember['Phone']; ?></td>
                                            <td><?= $dtmember['HP']; ?></td>
                                            <td><?= $dtmember['Date']; ?></td>
                                            <td><?= $dtmember['MaxLoan']; ?></td>
                                            <td>
                                                <a href="student-view.php?id=<?= $dtmember['MemberID']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="student-edit.php?id=<?= $dtmember['MemberID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $dtmember['MemberID']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>