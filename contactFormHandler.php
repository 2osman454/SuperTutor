<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  $email_from = "thesupertutor.com";
  $email_subject = "New form submission";
  $email_body = "User Name: $name.\n".
                  "User E-mail: $email.\n".
                      "User Message: $message.\n";
  $to = "iodweleng@outlook.com";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $email \r\n";

  mail($to, $email_subject, $email_body, $headers);
  header("Location: six.html");

  $status = "Success";
  $statusMsg = "Thank you for your message, your request has been submitted successfully. I will get back to you ASAP.";
  $postData = "";

  /*
else{
  $statusMsg = "Please fill all the required fields";
}

?>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $message;
echo "<br>";
*/
?>