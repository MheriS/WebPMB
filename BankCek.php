<html>
    <form method="POST" action="">
        <table align="center" border="1" cellpadding="0" cellspacing="0">
        <tr align="center"><td><h2><b>Form Cek Data</b></h2></td></tr>
            <tr>
                <td>
                    <table width="450" border="0" cellpadding="0" cellspacing="10" align="center">
                        <tr>
                            <td>Nama Peserta</td>
                            <td> : </td>
                            <td><input type="text" name="peserta" size="40"></td>
                        </tr>
                        <tr>
                            <td>Nama Universitas</td>
                            <td> : </td>
                            <td><input type="text" name="universitas" size="40"></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><input type="submit" name="submit" value="Proses"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    
    <center>
        <form method="post" action="aksiBankCek.php">
        <table border="1" cellpadding="2" cellspacing="4">
            <?php
            include "koneksi.php";
            error_reporting(0);
            $peserta = mysqli_real_escape_string($koneksi,$_POST['peserta']);
            $univ = mysqli_real_escape_string($koneksi,$_POST['universitas']);
            
            $a="SELECT a.nama , b.nama_jurusan, b.id_biaya, c.biaya FROM maba a INNER JOIN jurusan b ON b.id_jurusan = a.id_jurusan INNER JOIN biaya c ON a.id_biaya = c.id_biaya where a.nama='$peserta'";
            $b=$koneksi->query($a);
            while($c=$b->fetch_array()){   
            ?>
            <tr>
                <td align="center" colspan="2">
                    <?php echo '<b>Hasil Pengecekan Data</b><br>';?>
                </td>
            </tr>
            <tr>
                <td><?php echo 'Peserta'?></td>
                <td><input type="text" name="camaba" value="<?php echo $c['nama'];?>" readonly size="50"></td>
            </tr>
            <tr>
                <td><?php echo 'Universitas'?></td>
                <td><input type="text" name="univ" value="<?php echo 'Universitas Islam Negeri Maulana Malik Ibrahim Malang'?>"  size="50" readonly></td>
            </tr>
            <tr>
                <td><?php echo 'Jurusan'?></td>
                <td><input type="text" name="jurusan" value="<?php echo $c['nama_jurusan'];?>" readonly size="50"></td>
            </tr>
            <tr>
                <td><?php echo 'Biaya'?></td>
                <td><input type="text" name="biaya" value="<?php echo $c['biaya'];?>" readonly size="50"></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="bayar" value="Bayar">
                </td>
            </tr>
            <?php 
            }
            ?>
        </table>
        </form>
    </center>
</html>