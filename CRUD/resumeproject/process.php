<?php

session_start();

include('db.php');

$id = 0;
$update = false;
$name = '';
$location = '';
$company = '';
$detail = '';
$startdate = '';
$enddate = '';
$phonenumber = '';
$website = '';


if (isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $detail = $_POST['detail'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $phonenumber = $_POST['phonenumber'];
    $website = $_POST['website'];

    $mysqli->query("INSERT INTO data (name, location, company, detail, startdate, enddate, phonenumber, website)
     VALUES('$name', '$location', '$company', '$detail', '$startdate', '$enddate', '$phonenumber', '$website')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
    header("company: index.php");
    header("detail: index.php");
    header("startdate: index.php");
    header("enddate: index.php");
    header("phonenumber: index.php");
    header("website: index.php");
    header("name: index.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
    header("company: index.php");
    header("detail: index.php");
    header("startdate: index.php");
    header("enddate: index.php");
    header("phonenumber: index.php");
    header("website: index.php");
    header("name: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
        $company = $row['company'];
        $detail = $row['detail'];
        $startdate = $row['startdate'];
        $enddate = $row['enddate'];
        $phonenumber = $row['phonenumber'];
        $website = $row['website'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $detail = $_POST['detail'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $phonenumber = $_POST['phonenumber'];
    $website = $_POST['website'];

    $mysqli->query("UPDATE data SET name='$name', location='$location', company='$company', detail='$detail', startdate='$startdate', enddate='$enddate', phonenumber='$phonenumber', website='$website' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
    header("company: index.php");
    header("detail: index.php");
    header("name: index.php");
    header("startdate: index.php");
    header("enddate: index.php");
    header("phonenumber: index.php");
    header("website: index.php");
}
