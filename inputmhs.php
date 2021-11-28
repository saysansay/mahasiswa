<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
   <?php include('style.php');?>
</head>

<body>
    <div class="center">
        <h1>INPUT DATA MAHASISWA</h1>
        <a href="mahasiswa.php">Back </a><br>
        <?php 
        if (isset($_POST['simpan'])){
            $nim  = $_POST['vnim'];
            $nama = $_POST['vnama'];
            $alamat = $_POST['valamat'];

            $sql ="INSERT INTO mahasiswa_tab(nim,nama,alamat)VALUES('$nim','$nama','$alamat')";
            $retval = mysqli_query($conn,$sql);
            if($retval){
                echo "<script>
                alert('Success save data');window.location='mahasiswa.php';
                </script>";
            }else {
                echo "<script>
                alert('Error input data');
                </script>";  
            }
        }
        mysqli_close($conn);
        ?>
        <form method="post">
            <table border="1">
                <tr>
                    <td>NIM</td>
                    <td><input name="vnim" maxlength="10"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input name="vnama" maxlength="20"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="valamat" maxlength="30"></textarea></td>
                </tr>
                <tr>
                    <td><button type="submit" name="simpan">Save</button></td>
                </tr>

            </table>
        </form>
    </div>




</body>

</html>