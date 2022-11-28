<?php
include "koneksi.php";
$nilaipatokan = $_POST['nilaiLulus'];


$carikode = $koneksi->query("select max(id_lulus) from lulus;") or die (mysql_error());
$datakode = $carikode->fetch_array();
if($datakode){
        $nilaikode = substr($datakode[0], 5);//start melalui posisi ke-5
        $kode1 = (int) $nilaikode;
        $kode = $kode1 + 1;
        $hasilkode = "LULUS".str_pad($kode, 3, "0", STR_PAD_LEFT);//ditambah sebanya 3 angka ke kiri.
}else{
        $hasilkode = "LULUS001";
}
        $sql="INSERT INTO lulus (id_lulus, id_hasil) values ('".$hasilkode."',(SELECT id_hasil from hasil where nilai > $nilaipatokan))";
        $hmm=$koneksi->query($sql);
        if($hmm === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Input nilai patokan lulus berhasil ...');
                    document.location='./panitialulus.php';
                </script>
            <?php
        }else{
            echo "<div><b>Oops!</b> <a>Nilai $nilaipatokan tidak dimiliki oleh nilai peserta.</a>
            <a>Nilai Yang Diinputkan Harus Merupakan Nilai Maksimal Peserta Yang Tidak Akan Diluluskan</a></div> " .mysqli_error($koneksi);
        }
?>