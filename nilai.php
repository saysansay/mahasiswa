<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("style.php"); ?>

</head>

<body>
    <div class="center">
        <h1>NILAI</h1>
        <a href="inputnilai.php">Input Nilai </a><br>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Matakuliah</th>
                
                <th colspan="2">Action</th>
            </tr>
            <?php
            $sql = "SELECT a.nim,b.nama,a.kd_mtk,c.nm_mtk FROM nilai_tab a 
            INNER JOIN mahasiswa_tab b ON a.nim=b.nim 
            INNER JOIN matakuliah_tab c ON a.kd_mtk=c.kd_mtk";
            $retval = mysqli_query($conn, $sql);
            $no = 1;
            while ($row =  mysqli_fetch_assoc($retval)) { ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row['nim'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['kd_mtk'] ?></td>
                    <td><?php echo $row['nm_mtk'] ?></td>
                    
                    <td><a href="deletenilai.php?id=<?php echo $row['nim'] ?>&&kdmtk=<?php echo $row['kd_mtk']?>">delete</a></td>
                    <td><a href="updatenilai.php?id=<?php echo $row['nim'] ?>&&kdmtk=<?php echo $row['kd_mtk']?>">update </a></td>
                    <?php $no++; ?>
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