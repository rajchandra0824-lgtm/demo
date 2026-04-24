<?php

// Database connection
$conn=mysqli_connect("localhost","root","","publiceye");

// Check connection
if(!$conn){
die("Connection failed");
}

// Get form data safely
$pin=$_POST['pin'] ?? '';

$desc=$_POST['description'] ?? '';

$lat=$_POST['latitude'] ?? '';

$lon=$_POST['longitude'] ?? '';

// Image upload
$photo="";

if(isset($_FILES['photo']) && $_FILES['photo']['name']!=""){

$photo=time()."_".$_FILES['photo']['name'];

$temp=$_FILES['photo']['tmp_name'];

$folder="uploads/".$photo;

move_uploaded_file($temp,$folder);

}

// Insert data
$sql="INSERT INTO complaints
(pin,description,latitude,longitude,photo,status)

VALUES

('$pin','$desc','$lat','$lon','$photo','Pending')";

mysqli_query($conn,$sql);

echo "Complaint Submitted Successfully";

?>