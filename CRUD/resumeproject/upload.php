

<?php
$target_dir = "images/";
$filename= basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $filename; 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
echo "The file ".$filename. " has been uploaded.";
} else {
echo "Sorry, there was an error uploading your file.";

}
?>