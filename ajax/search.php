<?php
$conn = mysqli_connect("localhost", "admin", "", "crud_oops");
$search=$_POST['value'];

$query = "SELECT * FROM users WHERE name LIKE '%$search%'";
$result = mysqli_query($conn, $query);

$table = "<table border='1' cellspacing=5 cellpadding=20>
<tr>
<th>user_id</th>
<th>name</th>
<th>salary</th>
<th>isSenior</th>
<th>Action edit</th>
<th>Action delete</th>
</tr>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $table.="<tr><td>" . $row['user_id'] ." </td>".
        "<td>" . $row['name'] ." </td>".
        "<td>" . $row['salary'] ." </td>".
        "<td>" . $row['isSenior'] ." </td>".
        "<td>" . "<button id='edit-btn' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id=".$row['user_id'] .">Edit</button>" ." </td>".
        "<td>" ."<button id='delete-btn' data-id=".$row['user_id'] .">Delete</button>" ." </td></tr>";
    }
    $table.="</table>";
    echo $table;
}
else{
    echo "0";
}