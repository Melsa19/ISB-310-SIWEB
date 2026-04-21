<?php
require 'koneksi.php';

$message = "";
$msg_type = "";

if (isset($_POST['submit'])) {
    $username = isset($_POST['username']) ? trim(mysqli_real_escape_string($conn, $_POST['username'])) : '';
    $email = isset($_POST['email']) ? trim(mysqli_real_escape_string($conn, $_POST['email'])) : '';

    // Validasi kosong
    if (empty($username) || empty($email)) {
        $message = "Username dan email tidak boleh kosong.";
        $msg_type = "error";
    } 
    // Validasi format email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Format email tidak valid.";
        $msg_type = "error";
    } 
    // Jika semua validasi lolos
    else {
        $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $check_result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            $message = "Username atau email sudah terdaftar. Silakan gunakan yang lain.";
            $msg_type = "error";
        } else {
            $insert_query = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
            if (mysqli_query($conn, $insert_query)) {
                header("Location: read.php");
                exit;
            } else {
                $message = "Gagal menginput data.";
                $msg_type = "error";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Create Data</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Masukkan email" required>
            </div>

            <?php if ($message != ""): ?>
                <div class="alert alert-<?php echo $msg_type; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <button type="submit" name="submit" class="btn-submit">Insert</button>
        </form>

        <div class="bottom-menu">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>

    <!-- Modal Notifikasi -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalMessage"></p>
            <button class="btn-ok" onclick="closeModal()">OK</button>
        </div>
    </div>

    <script>
        function showModal(message, type) {
            document.getElementById('modalMessage').innerText = message;
            document.getElementById('myModal').style.display = 'block';
            const modalContent = document.querySelector('.modal-content');
            if (type === 'success') {
                modalContent.style.borderColor = '#4CAF50';
            } else {
                modalContent.style.borderColor = '#f44336';
            }
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        document.querySelector('.close').onclick = closeModal;
        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        <?php if ($message != ""): ?>
            showModal("<?php echo $message; ?>", "<?php echo $msg_type; ?>");
        <?php endif; ?>
    </script>
</body>

</html>