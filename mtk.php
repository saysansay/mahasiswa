<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
<?php include("style.php");?>

</head>

<body>
    <div class="center">
        <h1>MATAKULIAH</h1>
        <a href="inputmtk.php">Input Matakuliah </a><br>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Matakuliah</th>
                <th>SKS</th>
                <th colspan="2">Action</th>
            </tr>
        <?php 
        $sql = "SELECT kd_mtk,nm_mtk,sks FROM matakuliah_tab ";
        $retval = mysqli_query($conn, $sql);
        $no =1;
        while ($row =  mysqli_fetch_assoc($retval)) {?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row['kd_mtk']?></td>
                <td><?php echo $row['nm_mtk']?></td>
                <td><?php echo $row['sks']?></td>
                <td><a href="deletemtk.php?id=<?php echo $row['kd_mtk']?>">delete</a></td>
                <td><a href="updatemtk.php?id=<?php echo $row['kd_mtk']?>">update </a></td>
                <?php $no++;?>
            </tr>
        <?php } ?>
        </table>
        <a href="index.php">Menu Utama</a><br>

    </div>


<?php 
        mysqli_close($conn);
?>

</body>

</html>