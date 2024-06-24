
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("sql12.freesqldatabase.com", "sql12715829", "AbNVgxnj9H", "sql12715829");
// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_REQUEST["term"])){
// Prepare a select statement
$sql = "SELECT * FROM products WHERE names LIKE ?";
if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_term);
// Set parameters
$param_term = $_REQUEST["term"] . '%';

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
$result = mysqli_stmt_get_result($stmt);
// Check number of rows in the result set

if (mysqli_num_rows($result) > 0) {
    echo '<select class="divide-y  divide-gray-100 custom-select" style=" color : white;background-color: black; border-color: #f8f9fa; width: 100%;">';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<option value="' . $row["names"] .'">' . $row["names"] . '</option>';

    }
    echo '</select>';
} else {
    echo 'No results found';
}



} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close statement
mysqli_stmt_close($stmt);
}
// close connection
mysqli_close($link);
?>