<?php
$conn = mysqli_connect("localhost", "admin", "", "crud_oops");
$id=$_POST['id'];

$query = "DELETE FROM users WHERE user_id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 1;
} else {
    echo 0;
}
