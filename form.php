<?php 
  require_once "pdo.php";

// define variables and set to empty values
// $nameErr = $emailErr = $robotErr = "";
$name = $email  = $message = "";


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_POST["name"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_POST["name"]);
//     // check if name only contains letters and whitespace
//     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
//       $nameErr = "Only letters and white space allowed";
//     }
//   }
  
//   if (empty($_POST["email"])) {
//     $emailErr = "Email is required";
//   } else {
//     $email = test_input($_POST["email"]);
//     // check if e-mail address is well-formed
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//       $emailErr = "Invalid email format";
//     }
//   }

//   if (empty($_POST["message"])) {
//     $comment = "";
//   } else {
//     $comment = test_input($_POST["message"]);
//   }

//   if (empty($_POST["robot"])) {
//     $genderErr = "This question is required";
//   } else {
//     $gender = test_input($_POST["robot"]);
//   }
// }

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
  $sql = "INSERT INTO leads (name, email, message, created_on) 
            VALUES (:name, :email, :message, CURRENT_TIMESTAMP())";
  
  // echo("<pre>\n".$sql."\n</pre>\n");
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':message' => $_POST['message']));
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}