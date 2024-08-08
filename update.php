<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $game = $_POST['game'];

    $sql = "UPDATE registeri SET name='$name', email='$email', address='$address', game='$game' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: info.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT id, name, email, address, game FROM registeri WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="update.css">
  </head>
  <body>
  <div class="background">
    <div class="form-wrapper">
        <h2>Update Changes</h2>
        <form method="post" action="update.php" class="form-container">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          </div>
            <div class="form-group">
                <label for="name">Name of the Game:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Release Date:</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Genre:</label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="game">Company:</label>
                <input type="text" name="game" value="<?php echo $row['game']; ?>" required>
            </div>
            <button type="submit" value="Update">Submit</button>
        </form>
    </div>
</div>
<script>
        $('#name').addClass('animated tada');
    </script>
  </body>
</html>
