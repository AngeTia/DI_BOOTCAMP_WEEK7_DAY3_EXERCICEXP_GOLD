<!--
    This code includes a simple login form with a text field for the name and a submit button. When the form is submitted, the data is posted to the submit.php page, which starts a session and stores the name in a session variable. If the form has not been submitted, the user is redirected to the login page. On the welcome.php page, the code checks if the user is logged in by checking the value of the session variable. If the user is logged in, a welcome message is displayed. If not, the visitor is informed that the user is not recognized and is provided with a link to login from the first page.
-->
<!-- Login Form -->
<form action="submit.php" method="post">
  <input type="text" name="username" placeholder="Enter your name" required />
  <button type="submit">Submit</button>
</form>

<!-- Submit.php -->
<?php
session_start();

// Check if the form has been submitted
if(isset($_POST['username'])) {
  // Store the name in a session variable
  $_SESSION['username'] = $_POST['username'];

  // Redirect to welcome page
  header("Location: welcome.php");
  exit;
}

// If the user is not logged in
if(!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>

<!-- Welcome.php -->
<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['username'])) {
  echo "Welcome, " . $_SESSION['username'];
} else {
  echo "Sorry, we don't recognize you. Please <a href='login.php'>login</a>.";
}
?>
