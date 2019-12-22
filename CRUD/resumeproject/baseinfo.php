<?php

session_start();



$ID = 0;
$update = false;
$Person = '';
$Opening = '';
$Closing = '';

        

include('db.php');
         

if (isset($_POST['save'])){
           echo 'save';

    $Person = $_POST["Person"];
    $Opening = $_POST["Opening"];
    $Closing = $_POST["Closing"];
    
 
    include ('upload.php');



    $mysqli->query("INSERT INTO Users (Person, Opening, Closing, photo)
     VALUES('$Person', '$Opening', '$Closing', '$filename')") or die($mysqli->error);

    $_SESSION['message'] = "User has been saved!";
    $_SESSION['msg_type'] = "success";

    header ("location: index.php");
    
}

if (isset($_GET['delete'])){
       echo 'delete';
    $ID = $_GET['delete'];
    $mysqli->query("DELETE FROM Users WHERE ID=$ID") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header ("location: index.php");

    
   
}

if (isset($_GET['edit'])){
   echo 'edit';
    $ID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM Users WHERE ID=$ID") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        
        header ("location: index.php");

       
    }
}

if (isset($_POST["update"])){
   echo 'update';
   $ID = $_POST["ID"];
    $Person = $_POST["Person"];
    $Opening = $_POST["Opening"];
    $Closing = $_POST["Closing"];
  
    
    $mysqli->query("UPDATE Users SET Person='$Person', Opening='$Opening', Closing='$Closing' WHERE ID=$ID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header ("location: index.php");
    
    
}