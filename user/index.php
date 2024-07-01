<?php
include '../db.php';

$result = $conn->query("SELECT * FROM antrian WHERE status='waiting' ORDER BY id ASC LIMIT 1");
$row = $result->fetch_assoc();

if ($row) {
    $id = $row['id'];
    $nomor_antrian = $row['nomor_antrian'];
    $conn->query("UPDATE antrian SET status='called' WHERE id=$id");
} else {
    $nomor_antrian = "Tidak ada antrian";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Sistem Antrian</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="header">
        <h1>Nomor Antrian Anda</h1>
    </div>
    <div class="container">
        <h2><?php echo $nomor_antrian; ?></h2>
        <button id="refresh" class="button">Ambil Nomor Antrian</button>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>

<?php $conn->close(); ?>
