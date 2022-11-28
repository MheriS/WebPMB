<?php
include "koneksi.php";
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$tb = $_POST['tb'];
$bb = $_POST['bb'];
$kwn = $_POST['kwn'];
$ntlp = $_POST['ntlp'];
$email = $_POST['email'];

$foto = $_FILES['foto']['tmp_name'];
$targetfoto = 'img/';
$nama_foto = $_FILES['foto']['name'];

$ktp = $_FILES['ktp']['tmp_name'];
$targetktp = 'img/';
$nama_ktp = $_FILES['ktp']['name'];

$ijazah = $_FILES['ijazah']['tmp_name'];
$targetijazah = 'img/';
$nama_ijazah = $_FILES['ijazah']['name'];

$pindah = move_uploaded_file($foto, $targetfoto.$nama_foto);
$pindah1 = move_uploaded_file($ktp, $targetktp.$nama_ktp);
$pindah2 = move_uploaded_file($ijazah, $targetijazah.$nama_ijazah);
$sql="INSERT INTO maba (nama, id_jurusan, id_biaya, jeniskelamin, tinggibadan, beratbadan, tmptlahir, tgllahir, foto, ktp, ijazah, email, kewarganegaraan,  alamat, notlp) values ('".$nama."',(SELECT id_jurusan FROM jurusan WHERE nama_jurusan = '$jurusan'),(SELECT id_biaya FROM jurusan WHERE nama_jurusan = '$jurusan'),'".$jk."','".$tb."','".$bb."','".$tempat."','".$tanggal."','".$nama_foto."','".$nama_ktp."','".$nama_ijazah."','".$email."','".$kwn."','".$alamat."','".$ntlp."')";
$a=$koneksi->query($sql);
if($a === true){
?>
                <script language="JavaScript">
                    alert('Good! Input data pendaftaran berhasil ...');
                    document.location='./pembayaran.php';
                </script>
            <?php
}else{
echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
}
?>