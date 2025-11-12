<?php
// Pastikan form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Alamat email tujuan (ganti dengan alamat Gmail kamu)
    $to = "aliefiansubagia803@gmail.com"; 

    // Subjek dan isi pesan
    $subject = "Pesan Baru dari Website - $name";
    $body = "
        <h2>Pesan dari Website</h2>
        <p><strong>Nama:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Pesan:</strong><br>{$message}</p>
    ";

    // Header email
    $headers  = "From: {$name} <{$email}>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p style='color:green;'>Pesan berhasil dikirim!</p>";
    } else {
        echo "<p style='color:red;'>Gagal mengirim pesan. Pastikan server mendukung fungsi mail().</p>";
    }
}
?>
