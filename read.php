<?php require 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Read Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Read Data</h2>

        <div class="data-list">
            <?php
            $query = "SELECT * FROM users ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            } elseif (mysqli_num_rows($result) == 0) {
                echo "<p>Tidak ada data.</p>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="data-row">
                    <div class="data-info">
                        <span class="name"><?php echo htmlspecialchars($row['username']); ?></span>
                        <span class="email"><?php echo htmlspecialchars($row['email']); ?></span>
                    </div>
                    <div class="data-action">
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            <?php 
                }
            }
            ?>
        </div>

        <div class="bottom-menu">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>

</html>