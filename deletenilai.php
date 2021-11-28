<?php
include("condb.php");
include("list.php");
?>
<!DOCTYPE html>
<html>

<head>
    <?php include("style.php"); ?>

</head>

<body>
    <div class="center">
        <h1>HAPUS DATA NILAI</h1>
        <a href="nilai.php">Back </a><br>
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $kode = $_REQUEST['kdmtk'];
            $sql = "SELECT nim,kd_mtk,tugas,uts,uas FROM nilai_tab WHERE nim='$id' AND kd_mtk='$kode'";
            $retval = mysqli_query($conn, $sql);
            if (mysqli_num_rows($retval) == 1) {
                $row = mysqli_fetch_assoc($retval);
            }
        }
        if (isset($_POST['hapus'])) {
            $nim = $_REQUEST['id'];
            $kode = $_REQUEST['kdmtk'];
            echo $nim."-".$kode;

            $sql = "DELETE FROM nilai_tab  WHERE nim='$nim' AND kd_mtk='$kode'";
            $retval = mysqli_query($conn, $sql);
            if ($retval) {
                echo "<script>
                alert('Success Delete data');window.location='nilai.php';
                </script>";
            } else {
                echo "<script>
                alert('Error Delete data');window.location='deletenilai.php';
                </script>";
            }
        }
        ?>
        <form method="post">
            <table border="1">
                <tr>
                    <td>Nim</td>
                    <td><select name="vnim">
                            <?php
                            $sql = "SELECT nim,nama FROM mahasiswa_tab";
                            $retmhs = mysqli_query($conn, $sql);
                            $retval = "";
                            while ($rowmhs = mysqli_fetch_assoc($retmhs)) {
                                if ($rowmhs['nim'] == $row['nim']) { ?>
                                    <option value="<?php $rowmhs['nim'] ?>" selected><?php echo $rowmhs['nim'] . "-" . $rowmhs['nama'] ?></option>
                                <?php } else { ?>
                                    <option value="<?php $rowmhs['nim'] ?>"><?php echo $rowmhs['nim'] . "-" . $rowmhs['nama'] ?></option>" ;
                            <?php        }
                            }
                            ?>
                        </select>


                    </td>
                </tr>
                <tr>
                    <td>Matakuliah</td>
                    <td><select name="vkode">
                            <?php
                            $sql = "SELECT kd_mtk,nm_mtk FROM matakuliah_tab";
                            $retmhs = mysqli_query($conn, $sql);
                            $retval = "";
                            while ($rowmtk= mysqli_fetch_assoc($retmhs)) {
                                if ($rowmtk['kd_mtk'] == $row['kd_mtk']) { ?>
                                    <option value="<?php $rowmtk['kd_mtk'] ?>" selected><?php echo $rowmtk['kd_mtk'] . "-" . $rowmtk['nm_mtk'] ?></option>
                                <?php } else { ?>
                                    <option value="<?php $rowmtk['kd_mtk'] ?>"><?php echo $rowmtk['kd_mtk'] . "-" . $rowmtk['nm_mtk'] ?></option>" ;
                            <?php        }
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Tugas</td>
                    <td><input name="vtugas" maxlength="3" value="<?php echo $row['tugas'] ?>"></td>
                </tr>
                <tr>
                    <td>UTS</td>
                    <td><input name="vuts" maxlength="3" value="<?php echo $row['uts'] ?>"></td>
                </tr>
                <tr>
                    <td>UAS</td>
                    <td><input name="vuas" maxlength="3" value="<?php echo $row['uas'] ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="hapus">Hapus</button></td>
                </tr>

            </table>
        </form>
    </div>



    <?php mysqli_close($conn) ?>
</body>

</html>