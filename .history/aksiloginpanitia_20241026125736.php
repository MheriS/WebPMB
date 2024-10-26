<?php
session_start();
include "koneksi.php";

$msg = ''; // Variabel untuk menyimpan pesan, jika diperlukan

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $psw = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    $sql = "SELECT a.password, a.nama, b.nama_jurusan 
            FROM panitia a 
            INNER JOIN jurusan b ON b.id_jurusan = a.id_jurusan 
            WHERE a.nama = '$user' AND a.password = '$psw'";
    
    $result = $koneksi->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = $result->fetch_array();
        
        // Set session variables
        $_SESSION['username'] = $data['nama'];
        $_SESSION['jurusan'] = $data['nama_jurusan'];
        $_SESSION['status'] = "login";
        
        ?>
        <script language="JavaScript">
            alert('Good! Login berhasil ...');
            document.location = './panitia.php?nama=<?php echo $data['nama']; ?>';
        </script>
        <?php
    } else {
        // Jika login gagal
        $msg = 'ID / Password Salah'; // Mengatur pesan kesalahan
    }
}
?>

<!-- Menampilkan pesan kesalahan jika ada -->
<?php if (!empty($msg)): ?>
    <p style="color: red; font-style: italic;"><?php echo $msg; ?></p>
<?php endif; ?>