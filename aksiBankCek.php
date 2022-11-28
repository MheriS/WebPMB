<?php
include "koneksi.php";
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (isset($_POST['bayar']) || isset($_POST['camaba']) || isset($_POST['univ'])) {
$nama = $_POST['camaba'];
$univ = $_POST['univ'];
$biaya = $_POST['biaya'];
date_default_timezone_set("Asia/Jakarta");
$time = date("Y/m/d H:i:s");

        //Pembuatan kode bayar secara otomatis
        $carikode = $koneksi->query("select max(id_selesai_bayar) from selesai_bayar;") or die (mysql_error());
        $datakode = $carikode->fetch_array();
        if($datakode){
            $nilaikode = substr($datakode[0], 1);
            $kode1 = (int) $nilaikode;
            $kode = $kode1 + 1;
            $hasilkode = "B".str_pad($kode, 4, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "B0001";
        }

        //Pembuatan password secara otomatis
        $caripassword = $koneksi->query("select max(password) from selesai_bayar;") or die (mysql_error());
        $datapassword = $caripassword->fetch_array();
        if($datakode){
            $nilaipassword = substr($datapassword[0], 6);
            $password1 = (int) $nilaipassword;
            $password = $password1 + 1;
            $hasilpassword = "CAMABA".str_pad($password, 4, "0", STR_PAD_LEFT);
        }else{
            $hasilpassword = "CAMABA0001";
        }
 
    $sql ="INSERT INTO selesai_bayar (id_selesai_bayar, id_maba, biaya, univ, tanggal, password) VALUES ('".$hasilkode."',(SELECT id_maba from maba where nama = '$nama'),'".$biaya."','".$univ."','".$time."','".$hasilpassword."')";
    $a=$koneksi->query($sql);
    if($a === true){
        $x="SELECT id_maba from maba where nama = '$nama'";
            ?>
                <script language="JavaScript">
                    alert('Good! Pembayaran peserta PMB berhasil ...');
                </script>
                <form method="post" action="">
                    <p class="satu"><ins><strong>Bukti Pembayaran</strong></ins></p>
                    <center>
                        <table width="800" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">
                            <?php
                                  include "koneksi.php";
                                  $a="SELECT a.tanggal, a.biaya, a.univ, a.password, b.nama FROM selesai_bayar a INNER JOIN maba b ON a.id_maba=b.id_maba where b.nama = '$nama'";
                                  $b=$koneksi->query($a);
                                  while($c=$b->fetch_array()){
                            ?>
                            <tr>  
                                <td rowspan="6" width="120" style="border-right:1px solid #000;"> </td>  
                                <td width="150" valign="top" > Tanggal/jam </td>  
                                <td valign="top" > : <?php echo $c['tanggal'];?> </td>  
                            </tr>  
                            <tr>  
                                <td valign="top" > Nama Penyetor </td>  
                                <td valign="top" > : <?php echo $c['nama'];?> </td>  
                            </tr>  
                            <tr>  
                                <td valign="top" > Uang Sejumlah </td>  
                                <td valign="top" > : <?php echo $c['biaya'];?></td>  
                            </tr>
                            <tr>  
                                <td valign="top" > Nama Penerima </td>  
                                <td valign="top" > : <?php echo $c['univ'];?></td>  
                            </tr> 
                            <tr>  
                                <td valign="top" > Untuk Pembayaran </td>  
                                <td valign="top" > : <?php echo 'Pendaftaran Mahasiswa Baru UIN Maulana Malik Ibrahim Malang'?></td>  
                            </tr>
                            <tr>  
                                <td valign="top" > Password Akses </td>  
                                <td valign="top" > : <?php echo $c['password'];?></td>  
                            </tr> 
                            <?php
                                }
                            ?>
                        </table>
                    </center>
             </form> 
<style>  
 a { text-decoration: none; color: #0903E8; font-family: verdana; }  
 a:hover { color: #FA3C3C; }  
</style>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
}
?>
<script>
    window.print();
</script>