<?php
$conn = mysqli_connect("localhost", "admin", "", "crud_oops");
$name=$_POST['name'];
$salary=$_POST['salary'];
$senior=$_POST['senior'];

$query = "INSERT INTO users (name,salary,isSenior) VALUES ('$name','$salary','$senior')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 1;
} else {
    echo 0;
}
