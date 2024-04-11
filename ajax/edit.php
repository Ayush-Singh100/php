<?php
$conn = mysqli_connect("localhost", "admin", "", "crud_oops");
$id=$_POST['id'];

$query = "SELECT * FROM users WHERE user_id=$id";
$result = mysqli_query($conn, $query);
$output = "";
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//     $output.=" <form>
//     <input type='text' name="username' id="username"><br>
//     <input type="number" name="salary" id="salary"><br>
//     <select name="senior" id="senior">
//         <option value="1">Yes</option>
//         <option value="0">No</option>
//     </select><br>
//     <input type="submit" value="SAVE" id="sbt">
// </form>";
//     }
   
//     echo $table;
// }
// else{
//     echo "0";
// }
