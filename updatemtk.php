<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
<?php include("style.php");?>

</head>

<body>
    <div class="center">
        <h1>UPDATE DATA MATAKULIAH</h1>
        <a href="mtk.php">Back </a><br>
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $sql = "SELECT kd_mtk,nm_mtk,sks FROM matakuliah_tab WHERE kd_mtk='$id'";
            $retval = mysqli_query($conn, $sql);
            if (mysqli_num_rows($retval) == 1) {
                $row = mysqli_fetch_assoc($retval);
            }
        }
        if (isset($_POST['hapus'])) {
            $kode  = $_POST['vkode'];


            $sql = "DELETE FROM matakuliah_tab  WHERE kd_mtk='$kode'";
            $retval = mysqli_query($conn, $sql);
            if ($retval) {
                echo "<script>
                alert('Success update data');window.location='mtk.php';
                </script>";
            } else {
                echo "<script>
                alert('Error update data');window.location='updatemtk.php';
                </script>";
            }
        mysqli_close($conn);
        }
        ?>
        <form method="post">
            <table border="1">
                <tr>
                    <td>KODE</td>
                    <td><input name="vkode" maxlength="5" value="<?php echo $row['kd_mtk'] ?>"></td>
                </tr>
                <tr>
                    <td>Matakuliah</td>
                    <td><input name="vmatakuliah" maxlength="20" value="<?php echo $row['nm_mtk'] ?>"></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input name="vsks" maxlength="3" value="<?php echo $row['sks'] ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="update">Update</button></td>
                </tr>

            </table>
        </form>
    </div>




</body>

</html>