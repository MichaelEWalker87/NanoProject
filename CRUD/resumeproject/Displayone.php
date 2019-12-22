  <!DOCTYPE html>
<html>
    <head>
        <title>PHP CRUD</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <style>
          body{ 
              padding: 10px;
              
          }
            table,td{
                
                border: 1px solid burlywood;
                margin: 10px;
                background-color: azure;
                margin-top: 100px;
                min-width: 150px;
               
            }
            th{
                background-color: burlywood;
                
            }
            
    body {
            background-image: url("ImagesBack/pexels-photo-235994.jpeg");
            background-repeat: no-repeat;
            background-position: right top;
            margin-right: 200px;
            background-attachment: fixed;
}
        </style>
    </head>
    <body>
       
        
  <?php
        include('db.php');
        $Person=$_REQUEST['Person'];
        $result = $mysqli->query("SELECT * FROM Users WHERE Person='$Person'") or die($mysqli->error);
            //pre_r($result); 
        
        
         $result_data = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
         //pre_r($result);\
         ?>
         <?php 
         while ($row = $result->fetch_assoc()): 
             ?>
        <?php
        echo '<p> <img src="images/'.$row['photo'].'" alt="bnet-bg" align="left"/> </p>';
        echo '<h1>'.$row['Person'].'</h1>';
        echo '<h3>'.$row['Opening'].'</h3>';
        ?>
         <?php endwhile;
         ?>
        
          

            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Detail</th>
                            <th>Skills Required</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Phone Number</th>
                            <th>Website</th>    
                        </tr>
                    </thead>
            <?php
                while ($row = $result_data->fetch_assoc()): ?>
                    <tr>
                       
                        
                        <td><?php echo $row['company']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['startdate']; ?></td>
                        <td><?php echo $row['enddate']; ?></td>
                        <td><?php echo $row['phonenumber']; ?></td>
                        <td><?php echo $row['Website']; ?></td>    
                    </tr>
                
                        <?php endwhile;
                ?>
                </table>
                <?php
                $result_Closing = $mysqli->query("SELECT * FROM Users WHERE Person='$Person'") or die($mysqli->error);
                ?>
                    <?php 
                    while ($row = $result_Closing->fetch_assoc()): 
                 ?>
        <div class="row justify-content-center" >
                 <?php
        echo '<h3>'.$row['Closing'].'</h3>';
        ?>
         <?php endwhile;
         ?>
            </div>
   

<div align= "center" id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="images/Cat2.jpeg" width="275" height="180" alt="Cat2"/>

    </div>
    <div class="carousel-item">
        <img src="images/cat1.jpeg" width="275" height="180" alt="cat1"/>

    </div>
    <div class="carousel-item">
        <img src="images/Dog1.jpeg" width="275" height="180" alt="Dog1"/>

    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

 </body>
</html>