<!DOCTYPE html>
<html>
    <head>
        <title>PHP CRUD</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once 'process.php'; ?>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','mikewalker1','tucson','crud') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result);
            ?>

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Company</th>
                            <th>Detail</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Phone Number</th>
                            <th>Website</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['company']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['startdate']; ?></td>
                        <td><?php echo $row['enddate']; ?></td>
                        <td><?php echo $row['phonenumber']; ?></td>
                        <td><?php echo $row['Website']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </table>
            </div>
            <?php

            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>

        <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                   value="<?php echo $name; ?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
            <label>Start Date</label>
            <input type="text" name="startdate"
                   value="<?php echo $startdate; ?>" class="form-control" placeholder="Enter start date">
            </div>

            <div class="form-group">
            <label>End Date</label>
            <input type="text" name="enddate"
                   value="<?php echo $enddate; ?>" class="form-control" placeholder="Enter end date">
            </div>

            <div class="form-group">
            <label>Company</label>
            <input type="text" name="company"
                   value="<?php echo $company; ?>" class="form-control" placeholder="Enter company">
            </div>

            <div class="form-group">
            <label>Detail</label>
            <input type="text" name="detail"
                   value="<?php echo $detail; ?>" class="form-control" placeholder="Enter details">
            </div>

            <div class="form-group">
            <label>Location</label>
            <input type="text" name="location"
                   value="<?php echo $location; ?>" class="form-control" placeholder="Enter your location">
            </div>

            <div class="form-group">
            <label>Website</label>
            <input type="text" name="Website"
                   value="<?php echo $Website; ?>" class="form-control" placeholder="Enter the company Website">
            </div>

            <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phonenumber"
                   value="<?php echo $phonenumber; ?>" class="form-control" placeholder="Enter company phonenumber">
            </div>
            <div class="form-group">
            <?php
            if ($update == true):
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>
    </body>
