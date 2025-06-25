<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Format pesan untuk disimpan
    $entry = "
    <tr>
        <td>$name</td>
        <td>$email</td>
        <td>$subject</td>
        <td>$message</td>
    </tr>";

    // Simpan data ke file
    $file = '../admin/data_contact.html';
    if (file_put_contents($file, $entry, FILE_APPEND)) {
        // Redirect ke halaman sukses setelah data disimpan
        header('Location: ../pesan_sukses.html');
    } else {
        echo "Gagal menyimpan pesan.";
    }
}
