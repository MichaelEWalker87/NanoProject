<!DOCTYPE html>
<html>
    <head>
        <title>PHP CRUD</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <style>
            form{
                width: 70%;
            }
            form p{
                display: flex;
                justify-content: space-between;
            }
        </style>
    </head>
    <body>
        <?php require_once 'process.php'; ?>
        <?php require_once 'baseinfo.php'; ?>

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
            include('db.php');
            $result = $mysqli->query("SELECT * FROM  Users") or die($mysqli->error);
            //pre_r($result);
            ?>
            
            
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Your Name</th>
                            <th>Opening Summary</th>
                            <th>Closing Summary</th>
                            <th>Cover Photo</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        
                        <td><?php echo $row['Person']; ?></td>
                        <td><?php echo $row['Opening']; ?></td>
                        <td><?php echo $row['Closing']; ?></td>
                        <td><?php echo '<img src="images/'.$row['photo'].'">'; ?></td>
                        
                        
                        <td>
                               <a href="index.php?edit=<?php echo $row['ID']; ?>"
                               class="btn btn-info">Edit</a>
                               <a href="baseinfo.php?delete=<?php echo $row['ID']; ?>"
                               class="btn btn-danger">Delete</a>
                               <a href="Displayone.php?Person=<?php echo $row['Person']; ?>"
                               class="btn btn-info">Display 1</a>
                               <a href="Display2.php?Person=<?php echo $row['Person']; ?>"
                               class="btn btn-info">Display 2</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </table>
            </div>
            <?php

            function ( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>

       
            <form action="baseinfo.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">

            <p>
            <label>Your Name</label>
            <input type="text" name="Person" size="50"
                   value="<?php echo $Person; ?>"  placeholder="Your Name">
            </p>
            
            <p>
            <label>Opening Summary</label>
            <textarea name="Opening" rows="10" cols="50"
                      placeholder="Enter opening summary"><?php echo $Opening; ?></textarea>
            </p>
            
            
            <p>
            <label>Closing Summary</label>
            <textarea name="Closing" rows="10" cols="50"
                       placeholder="Closing Summary"><?php echo $Closing; ?></textarea>
            </p>  
            
            <p>
            <label>Cover Photo</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            </p>
            

            <div class="form-group">
            <?php
            if ($update == true):
            ?>
                
                <p>   <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?></p>
                <p>   <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?></p>
                
            
            </div>
        </form>
       
       
        
        
           
        <?php
            include('db.php');
            $result = $mysqli->query("SELECT * FROM  data") or die($mysqli->error);
            //pre_r($result);
            ?>
        
        
            
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Detail</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Required Skills</th>
                            <th>Phone Number</th>
                            <th>Website</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        
                        <td><?php echo $row['company']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['startdate']; ?></td>
                        <td><?php echo $row['enddate']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phonenumber']; ?></td>
                        <td><?php echo $row['website']; ?></td>
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

            function ( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>

       
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <p>
            <label>Company</label>
            <input type="text" name="company"
                   value="<?php echo $company; ?>"  placeholder="Enter company">
            </p>
            
            <p>
            <label>Location</label>
            <input type="text" name="location"
                   value="<?php echo $location; ?>" placeholder="Enter your location">
            </p>
            
            
            <p>
            <label>Detail</label>
            <input type="text" name="detail"
                   value="<?php echo $detail; ?>"  placeholder="Enter details">
            </p>
            
            <p>
            <label>Start Date</label>
            <input type="text" name="startdate"
                   value="<?php echo $startdate; ?>" placeholder="Enter start date">
            </p>
            
            <p>
            <label>End Date</label>
            <input type="text" name="enddate"
                   value="<?php echo $enddate; ?>" placeholder="Enter end date">
            </p>
            
            <p> 
            <label>Required Skills</label>
            <input type="text" name="name" 
                   value="<?php echo $name; ?>" placeholder="Skills Gained">
            </p>
            
            <p>
            <label>Phone Number</label>
            <input type="text" name="phonenumber"
                   value="<?php echo $phonenumber; ?>"  placeholder="Enter company phonenumber">
            </p>
            
            <p>
            <label>Website</label>
            <input type="text" name="website"
                   value="<?php echo $website; ?>" placeholder="Enter the company Website">
            </p>
            
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
        
        
    </body>
</html>