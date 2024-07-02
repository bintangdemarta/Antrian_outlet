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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="header">
        <h1>Nomor Antrian Anda</h1>
    </div>
    <div class="container">
        <h2 id="nomor-antrian"><?php echo $nomor_antrian; ?></h2>
        <button id="refresh" class="button">Ambil Nomor Antrian</button>
    </div>
    <script src="../js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const refreshButton = document.getElementById('refresh');
            const nomorAntrian = document.getElementById('nomor-antrian').textContent;

            function speakAntrian() {
                let utterance;
                if (nomorAntrian && nomorAntrian !== 'Tidak ada antrian') {
                    utterance = new SpeechSynthesisUtterance('Nomor antrian anda ' + nomorAntrian);
                } else {
                    utterance = new SpeechSynthesisUtterance('Tidak ada antrian');
                }
                utterance.lang = 'id-ID'; // Mengatur bahasa ke Bahasa Indonesia

                // Cari dan gunakan suara yang mendukung Bahasa Indonesia
                const voices = speechSynthesis.getVoices();
                const indonesianVoice = voices.find(voice => voice.lang === 'id-ID');
                if (indonesianVoice) {
                    utterance.voice = indonesianVoice;
                }

                speechSynthesis.speak(utterance);
            }

            // Panggil fungsi ketika suara berubah
            speechSynthesis.onvoiceschanged = speakAntrian;

            // Panggil fungsi langsung saat halaman dimuat
            speakAntrian();

            refreshButton.addEventListener('click', function() {
                location.reload();
            });
        });
    </script>
</body>
</html>

<?php $conn->close(); ?>
