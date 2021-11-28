<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
    <?php include ('style.php');?>
</head>

<body>
    <div class="center">
        <h1>UPDATE DATA MAHASISWA</h1>
        <a href="mahasiswa.php">Back </a><br>
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $sql = "SELECT nim,nama,alamat FROM mahasiswa_tab WHERE nim='$id'";
            $retval = mysqli_query($conn, $sql);
            if (mysqli_num_rows($retval) == 1) {
                $row = mysqli_fetch_assoc($retval);
                $vnim = $row['nim'];
                $vnama=$row['nama'];
                $valamat=$row['alamat'];
            }
        }
        if (isset($_POST['hapus'])) {
            $nim  = $_POST['vnim'];
            $nama  = $_POST['vnama'];
            $alamat  = $_POST['valamat'];
            $cnim  = $_POST['voldnim'];


            $sql = "UPDATE mahasiswa_tab SET nim='$nim',nama='$nama',alamat='$alamat' WHERE nim='$cnim'";
            $retval = mysqli_query($conn, $sql);
            if ($retval) {
                echo "<script>
                alert('Success Update data');window.location='mahasiswa.php';;
                </script>";
            } else {
                echo "<script>
                alert('Error Update data');window.location='updatemhs.php';
                </script>";
            }
        mysqli_close($conn);
        
        }
        ?>
        <form method="post">
            <table border="1">
                <tr>
                    <td>NIM</td>
                    <td><input name="vnim" maxlength="10" value="<?php echo $row['nim'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input name="vnama" maxlength="20" value="<?php echo $vnama ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="valamat" maxlength="30"><?php echo $row['alamat'] ?></textarea></td>
                </tr>
                <tr>
                <input hidden name="voldnim" value="<?php echo $row['nim'] ?>" maxlength="10">
                    <td><button type="submit" name="hapus">Update</button></td>
                </tr>

            </table>
        </form>
    </div>




</body>

</html>