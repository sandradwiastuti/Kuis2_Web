<?php include "db.php"; session_start(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container mt-5">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" class="form-control" placeholder="Username" required><br>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br>
        <input type="submit" name="login" class="btn btn-success" value="Login">
    </form>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        $data = mysqli_fetch_assoc($query);

        if ($data && password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data;
            header("Location: dashboard.php");
        } else {
            echo "<div class='alert alert-danger mt-3'>Login gagal!</div>";
        }
    }
    ?>
</div>
