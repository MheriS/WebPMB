<?php
include "koneksi.php";
session_start();
    $jurusan = $_SESSION['jurusan'];
    $nama = $_SESSION['username'];
    $sql="SELECT a.password, a.nama, b.nama_jurusan from panitia a INNER JOIN jurusan b ON b.id_jurusan=a.id_jurusan where nama = '$nama'";
    $a=$koneksi->query($sql);
    $data = $a-> fetch_array();
    $_SESSION['username'] = $data['nama'];
    $_SESSION['jurusan'] = $data['nama_jurusan'];
$soal = $_POST['soal'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$kj = $_POST['kj'];
$jurusan1 = $_POST['jurusan'];

$sql="INSERT INTO soal (soal, jawaban_A, jawaban_B, jawaban_C, jawaban_D, jawaban_E, jawaban, id_jurusan) values ('".$soal."','".$a."','".$b."','".$c."','".$d."','".$e."','".$kj."',(SELECT id_jurusan FROM jurusan WHERE nama_jurusan = '$jurusan1'))";
$a=$koneksi->query($sql);
if($a === true){
?>
                <script language="JavaScript">
                    alert('Good! Input soal PMB berhasil ...');
                    document.location='./panitiainputsoal.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>';
                </script>
            <?php
}else{
echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
}
?>