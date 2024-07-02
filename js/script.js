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
