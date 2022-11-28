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
$id = ($_GET['id']);
if(isset($id)){
 
        $sql ="DELETE FROM `soal` WHERE  `id`='$id'";
        $a = $koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Hapus soal berhasil ...');
                    document.location='./panitiainputsoal.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
}
?>