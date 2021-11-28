<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
    <?php include('style.php'); ?>
</head>

<body>
    <div class="center">
        <h1>INPUT NILAI</h1>
        <a href="nilai.php">Back </a><br>
        <?php
        if (isset($_POST['simpan'])) {
            $nim  = $_POST['vnim'];
            $kode = $_POST['vkode'];
            $tugas = $_POST['vtugas'];
            $uts = $_POST['vuts'];
            $uas = $_POST['vuas'];
            $sql = "INSERT INTO nilai_tab(nim,kd_mtk,tugas,uts,uas)VALUES('$nim','$kode','$tugas','$uts','$uas')";
            $retval = mysqli_query($conn, $sql);
            if ($retval) {
                echo "<script>
                alert('Success save data');window.location='nilai.php';
                </script>";
            } else {
                echo "<script>
                alert('Error input data');window.location='inputnilai.php;
                </script>";
            }
        }

        ?>
        <form method="post">
            <table border="1">
                <tr>
                    <td>NIM</td>
                    <td><select name="vnim">
                            <?php
                            $sql = "SELECT nim,nama FROM mahasiswa_tab";
                            $retmhs = mysqli_query($conn, $sql);
                            while ($row =  mysqli_fetch_assoc($retmhs)) { ?>
                                <option value="<?php echo $row['nim'] ?>"><?php echo $row['nim'] . "-" . $row['nama'] ?></option>
                            <?php }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Matakuliah</td>
                    <td><select name="vkode">
                    <?php
                    $sql = "SELECT kd_mtk,nm_mtk FROM matakuliah_tab";
                            $retmtk = mysqli_query($conn, $sql);
                            while ($row =  mysqli_fetch_assoc($retmtk)) { ?>
                                <option value="<?php echo $row['kd_mtk'] ?>"><?php echo $row['kd_mtk'] . "-" . $row['nm_mtk'] ?></option>
                            <?php }
                            ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Tugas</td>
                    <td><input name="vtugas" maxlength="3"></td>
                </tr>
                <tr>
                    <td>UTS</td>
                    <td><input name="vuts" maxlength="3"></td>
                </tr>
                <tr>
                    <td>UAS</td>
                    <td><input name="vuas" maxlength="3"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="simpan">Save</button></td>
                </tr>

            </table>
        </form>
    </div>


<?php mysqli_close($conn);?>

</body>

</html>