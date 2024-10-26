<?php
session_start();
include "koneksi.php";
$msg = '';

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $psw = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT a.password, b.nama, c.nama_jurusan 
            FROM selesai_bayar a 
            INNER JOIN maba b ON a.id_maba = b.id_maba 
            INNER JOIN jurusan c ON b.id_jurusan = c.id_jurusan 
            WHERE b.nama = '$user'";

    $result = $koneksi->query($sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            
            // Cek apakah password sesuai
            if (password_verify($psw, $data['password'])) {
                // Set session variables
                $_SESSION['username'] = $data['nama'];
                $_SESSION['jurusan'] = $data['nama_jurusan'];
                $_SESSION['status'] = "login";

                ?>
                <script language="JavaScript">
                    alert('Good! Login berhasil ...');
                    document.location = './peserta.php?nama=<?php echo $data['nama']; ?>';
                </script>
                <?php
            } else {
                $msg = 'ID / Password Salah';  // Jika password tidak sesuai
            }
        } else {
            $msg = 'ID / Password Salah 1'; // Jika tidak ada hasil query
        }
    } else {
        $msg = 'Error dalam query: ' . mysqli_error($koneksi);
    }
}

// Tampilkan pesan kesalahan
if (!empty($msg)) {
    echo "<p style='color: red; font-style: italic;'>$msg</p>";
}
?>