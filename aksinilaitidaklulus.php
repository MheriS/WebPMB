<?php
include "koneksi.php";
$nilaimaksimal = $_POST['nTL'];

$carikode = $koneksi->query("select max(id_gagal) from tidak_lulus;") or die (mysql_error());
$datakode = $carikode->fetch_array();
if($datakode){
        $nilaikode = substr($datakode[0], 5);//start melalui posisi ke-5
        $kode1 = (int) $nilaikode;
        $kode = $kode1 + 1;
        $hasilkode = "GAGAL".str_pad($kode, 3, "0", STR_PAD_LEFT);//ditambah sebanya 3 angka ke kiri.
}else{
        $hasilkode = "GAGAL001";
}
        $sql="INSERT INTO tidak_lulus (id_gagal, id_hasil) values ('".$hasilkode."',(SELECT id_hasil FROM hasil WHERE nilai <= $nilaimaksimal))";
        $hmm=$koneksi->query($sql);
        if($hmm === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Input nilai maksimal tidak lulus berhasil ...');
                    document.location='./panitiatidaklulus.php';
                </script>
            <?php
        }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
        }
?>