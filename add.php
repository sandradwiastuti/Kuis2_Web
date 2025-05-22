<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User Baru</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah User Baru</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto:</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Tambah User</button>
                <a href="dashboard.php" class="btn btn-secondary ms-2">Kembali ke Dashboard</a>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $foto = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];

                // Simpan file ke folder uploads/
                move_uploaded_file($tmp, "uploads/" . $foto);

                // Simpan data ke database
                $query = "INSERT INTO users (username, password, foto) VALUES ('$username', '$password', '$foto')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<div class='alert alert-success mt-3'>User berhasil ditambahkan. Mengalihkan ke dashboard...</div>";
                    echo "<script>
                            setTimeout(function(){
                                window.location.href = 'dashboard.php';
                            }, 2000);
                          </script>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Gagal menambah user: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
