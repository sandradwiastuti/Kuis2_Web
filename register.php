<?php include "db.php"; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="username" class="form-control" placeholder="Username" required><br>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br>
        <input type="file" name="foto" class="form-control" required><br>
        <input type="submit" name="submit" class="btn btn-primary" value="Register">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "uploads/" . $foto);

        $query = "INSERT INTO users (username, password, foto) VALUES ('$username', '$password', '$foto')";
        $result = mysqli_query($conn, $query);

        if ($result) echo "<div class='alert alert-success mt-3'>Berhasil daftar!</div>";
        else echo "<div class='alert alert-danger mt-3'>Gagal: " . mysqli_error($conn) . "</div>";
    }
    ?>
</div>
