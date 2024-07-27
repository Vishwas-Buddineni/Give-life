<?php
include('connection1.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/s11.css">
    <title>Donor search</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div id="header">
        <h2><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2>
    </div>
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <form method="get" action="">
                    <label for="search">Search by Blood Group:</label>
                    <input type="text" name="search" id="search" required>
                    <button type="submit">Search</button>
                </form>

                <?php 
                $con = mysqli_connect("localhost", "root", "", "bbms1");

                if (isset($_GET['search'])) {
                    $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
                    $query = "SELECT * FROM donor_registration1 WHERE bgroup LIKE '%$filtervalues%'";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {
                        if (mysqli_num_rows($query_run) > 0) {
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><b><font color="blue">Name</font></b></th>
                                        <th><b><font color="blue">Last Donation Date</font></b></th>
                                        <th><b><font color="blue">Address</font></b></th>
                                        <th><b><font color="blue">City</font></b></th>
                                        <th><b><font color="blue">Age</font></b></th>
                                        <th><b><font color="blue">Blood Group</font></b></th>
                                        <th><b><font color="blue">Email</font></b></th>
                                        <th><b><font color="blue">Mobile No</font></b></th>
                                        <th><b><font color="blue">Weight</font></b></th>
                                        <th><b><font color="blue">Instagram Id</font></b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($query_run as $items) {
                                        ?>
                                        <tr>
                                            <td><?= $items['name']; ?></td>
                                            <td><?= $items['ldd']; ?></td>
                                            <td><?= $items['address']; ?></td>
                                            <td><?= $items['city']; ?></td>
                                            <td><?= $items['age']; ?></td>
                                            <td><?= $items['bgroup']; ?></td>
                                            <td><?= $items['email']; ?></td>
                                            <td><?= $items['mno']; ?></td>
                                            <td><?= $items['weight']; ?></td>
                                            <td><?= $items['uid']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            ?>
                            <p>No Record Found</p>
                            <?php
                        }
                    } else {
                        echo "Error in query: " . mysqli_error($con);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
