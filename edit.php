<?php include "db.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    mysqli_query($conn, "UPDATE users SET username='$username' WHERE id=$id");
    header("Location: dashboard.php");
}
?>

<form method="POST">
    <input type="text" name="username" value="<?= $data['username'] ?>"><br>
    <input type="submit" name="update" value="Update">
</form>
