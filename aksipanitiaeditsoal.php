<?php 
session_start();
include "koneksi.php";

    $jurusan = $_SESSION['jurusan'];
    $nama = $_SESSION['username'];
    $sql="SELECT a.password, a.nama, b.nama_jurusan from panitia a INNER JOIN jurusan b ON b.id_jurusan=a.id_jurusan where nama = '$nama'";
    $a=$koneksi->query($sql);
    $data = $a-> fetch_array();
    $_SESSION['username'] = $data['nama'];
    $_SESSION['jurusan'] = $data['nama_jurusan'];

$idsoal = $_SESSION['id'];
$jurusan =$_POST['jurusan'];
$soal = $_POST['soal'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$jawaban = $_POST['kj'];
$sql ="UPDATE `soal` SET `soal`='$soal', `jawaban_A`='$a', `jawaban_B`='$b', `jawaban_C`='$c', `jawaban_D`='$d', `jawaban_E`='$e', `jawaban`='$jawaban' WHERE  `id`='$idsoal';";
$a=$koneksi->query($sql);
if($a === true){
    ?>
        <script language="JavaScript">
            alert('Good! Edit soal berhasil ...');
            document.location='./panitiainputsoal.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>';
        </script>
    <?php
}else{
        echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
}
?>