<?php
// include_once 'dbc.php'; //Including the database file 

// $fName = mysqli_real_escape_string($connect, $_POST['firstName']); //mysqli_real_escape_string function to escape special characters in the user input to prevent SQL injection attacks.
// $lname = mysqli_real_escape_string($connect, $_POST['lastName']);
// $email = mysqli_real_escape_string($connect, $_POST['email']);
// $pass = mysqli_real_escape_string($connect, $_POST['password']);

// $sql = "INSERT INTO users (firstName, lastName, email, password) 
// VALUES ('$fName', '$lname', '$email', '$pass');";

// $result = mysqli_query($connect, $sql);
// header("Location:index.php?signup=success");

////////////////////////////////////// This way is more correct ////////////////////////////////////////

include_once 'dbc.php'; //Including the database file 

$fName = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Prepare the statement
$stmt = mysqli_prepare($connect, "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");

// Bind the parameters
mysqli_stmt_bind_param($stmt, "ssss", $fName, $lname, $email, $hashed_pass);

// Execute the statement
mysqli_stmt_execute($stmt);

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connect);

header("Location:index.php?signup=success");


//Here's what's different in the corrected code:

// 1. The mysqli_real_escape_string function is not used, and instead, prepared statements are used to prevent SQL injection attacks.
// 2. The password is hashed using the password_hash function before being stored in the database.
// 3. The prepared statement is created using the mysqli_prepare function.
// 4. The parameters are bound to the statement using the mysqli_stmt_bind_param function.
// 5. The statement is executed using the mysqli_stmt_execute function.
// 6. The statement and database connection are closed using the mysqli_stmt_close and mysqli_close functions, respectively.