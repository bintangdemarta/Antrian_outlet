<?php
include '../db.php';

$alert = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomor_antrian = $_POST['nomor_antrian'];
    $sql = "INSERT INTO antrian (nomor_antrian) VALUES ($nomor_antrian)";
    if ($conn->query($sql) === TRUE) {
        $alert = "Nomor antrian $nomor_antrian telah ditambahkan.";
    } else {
        $alert = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM antrian");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Antrian</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="header">
        <h1>Dashboard Admin</h1>
    </div>
    <div class="container">
        <form method="POST">
            <label for="nomor_antrian">Nomor Antrian:</label>
            <input type="number" name="nomor_antrian" required>
            <button type="submit" class="button">Tambah Nomor Antrian</button>
        </form>
        <h2>Daftar Antrian</h2>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nomor Antrian</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nomor_antrian']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <?php if ($alert) { ?>
    <script>
        Swal.fire({
            title: 'Info',
            text: '<?php echo $alert; ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    <?php } ?>
</body>
</html>

<?php $conn->close(); ?>
