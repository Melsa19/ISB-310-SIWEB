<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}

if (!$data) {
    die("Data tidak ditemukan.");
}

$message = "";

if (isset($_POST['update'])) {
    $username = isset($_POST['username']) ? trim(mysqli_real_escape_string($conn, $_POST['username'])) : '';
    $email = isset($_POST['email']) ? trim(mysqli_real_escape_string($conn, $_POST['email'])) : '';

    if (empty($username) || empty($email)) {
        $message = "Username dan email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Format email tidak valid.";
    } else {
        $update_query = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
        if (mysqli_query($conn, $update_query)) {
            header("Location: read.php");
            exit;
        } else {
            $message = "Failed to update data.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Update User</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
            </div>

            <?php if ($message != ""): ?>
                <div class="alert alert-error"><?php echo $message; ?></div>
            <?php endif; ?>

            <button type="submit" name="update" class="btn-submit">Update</button>
        </form>

        <div class="bottom-menu">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>

</html>