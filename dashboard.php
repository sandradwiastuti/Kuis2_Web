<?php include "db.php"; session_start();
if (!isset($_SESSION['user'])) header("Location: login.php"); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container mt-4">
    <h3>Welcome, <?= $_SESSION['user']['username'] ?> | <a href="logout.php" class="btn btn-danger btn-sm">Logout</a></h3>
    <a href="add.php" class="btn btn-primary btn-sm mb-3">Tambah User</a>

    <h4>User List</h4>
    <table class="table table-bordered">
        <tr><th>Foto</th><th>Username</th><th>Aksi</th></tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td><img src='uploads/{$row['foto']}' width='50'></td>
                    <td>{$row['username']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>
