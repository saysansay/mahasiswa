<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
   <?php include('style.php');?>
</head>

<body>
    <div class="center">
        <h1>MAHASISWA</h1>
        <a href="inputmhs.php">Input Mahasiswa </a><br>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th colspan="2">Action</th>
            </tr>
        <?php 
        $sql = "SELECT nim,nama,alamat FROM mahasiswa_tab ";
        $retval = mysqli_query($conn, $sql);
        $no =1;
        while ($row =  mysqli_fetch_assoc($retval)) {?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row['nim']?></td>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['alamat']?></td>
                <td><a href="deletemhs.php?id=<?php echo $row['nim']?>">delete</a></td>
                <td><a href="updatemhs.php?id=<?php echo $row['nim']?>">update </a></td>
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