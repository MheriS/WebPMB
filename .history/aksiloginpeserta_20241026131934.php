<?php
session_start();
include "koneksi.php";
$msg = '';

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $psw = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Debugging: Tampilkan username yang dimasukkan
    echo "Username yang dimasukkan: $user <br>";

    $sql = "SELECT a.password, b.nama, c.nama_jurusan 
            FROM selesai_bayar a 
            INNER JOIN maba b ON a.id_maba = b.id_maba 
            INNER JOIN jurusan c ON b.id_jurusan = c.id_jurusan 
            WHERE b.nama = '$user'";

    // Debugging: Tampilkan query yang dijalankan
    echo "Query: $sql <br>";

    $result = $koneksi->query($sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();

            // Debugging: Tampilkan data yang diambil
            echo "Password dari database: " . $data['password'] . "<br>";
            echo "Password yang dimasukkan: " . $psw . "<br>";

            // Cek apakah password sesuai
            if (password_verify($psw, $data['password'])) {
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
                $msg = 'ID / Password Salah';
            }
        } else {
            $msg = 'ID / Password Salah 1';
        }
    } else {
        die("Error in query: " . mysqli_error($koneksi));
    }
}

// Tampilkan pesan kesalahan
if (!empty($msg)) {
    echo "<p style='color: red; font-style: italic;'>$msg</p>";
}
?>