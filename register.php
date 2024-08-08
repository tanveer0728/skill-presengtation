<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $game = $_POST['game'];

    $sql = "INSERT INTO registeri (Name, email, address, game) VALUES ('$name', '$email', '$address', '$game')";

    if ($conn->query($sql) === TRUE) {
        header("Location: info.php");
    } else {
        echo "Error: ";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="reg.css">
  </head>
  <body>
  <div class='signin-page'>
  <div class='container'>
    <section class='company-logo'>
      <div class='logo-container'>
        <img src='img/logo.png' alt='logo'>
      <h3>Pre-register with your Favorite game with <span>Game warrior</span></h3>
      </div>
    </section>
    <section class='signin-section'>
      <h2>Registeration Form</h2>
      <div class='signin-card'>
        <h3>Play with <span>Game Warrior</span></h3>
        <form method="post" action="register.php">
        <label for="name">Name of Game:</label>
            <input type="text" id="name" name="Name" required>
        <label for="email">Release Date:</label>
            <input type="text" id="email" name="email" required>
        <label for="address">Genre:</label>
            <input type="text" id="address" name="address" required>
        <label for="game">Company:</label>
            <input type="text" id="game" name="game" required>
          <button type="submit">Register</button>
        </form>
        <div class='signin-card-footer'>
          <h5>Don't have an account? <span>Get started</span></h4>
      </div>
      </div>
    </section>
  </div>
  <div class='left-shape'></div>
  <div class='right-shape'></div>
</div>

  </body>
</html>
