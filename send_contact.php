<?php
// Tangkap data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Simpan data ke file JSON (sebagai pengganti database)
$data = [
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'date' => date('Y-m-d H:i:s'),
];

$file = '../Admin/contact_messages.json';

// Jika file JSON belum ada, buat file baru
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Ambil data lama dari file JSON
$messages = json_decode(file_get_contents($file), true);

// Tambahkan data baru ke array
$messages[] = $data;

// Simpan kembali data ke file JSON
file_put_contents($file, json_encode($messages));

// Redirect ke halaman sukses
header('Location: ../Admin/contact_consumen.html');
exit();
