<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
 <?php include("style.php");?>

</head>

<body>
    <div class="center">
        <h1>INPUT DATA MATAKULIAH</h1>
        <a href="mtk.php">Back </a><br>
        <?php 
        if (isset($_POST['simpan'])){
            $kode  = $_POST['vkode'];
            $mtk = $_POST['vmtk'];
            $sks = $_POST['vsks'];

            $sql ="INSERT INTO matakuliah_tab(kd_mtk,nm_mtk,sks)VALUES('$kode','$mtk','$sks')";
            $retval = mysqli_query($conn,$sql);
            if($retval){
                echo "<script>
                alert('Success save data');window.location='mtk.php';
                </script>";
            }else {
                echo "<script>
                alert('Error input data');window.location='inputmtk.php'
                </script>";  
            }
        }
        mysqli_close($conn);
        ?>
        <form method="post">
            <table border="1">
                <tr>
                    <td>KODE</td>
                    <td><input name="vkode" maxlength="5"></td>
                </tr>
                <tr>
                    <td>Matakuliah</td>
                    <td><input name="vmtk" maxlength="20"></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input name="vsks" maxlength="3"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="simpan">Save</button></td>
                </tr>

            </table>
        </form>
    </div>




</body>

</html>