<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("style.php"); ?>

</head>

<body>
    <div class="center">
        <h1>CETAK NILAI</h1>
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
                    <td><button type="submit" name="cetak">Preview</button></td>
                   
                </tr>

            </table>
        </form>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Matakuliah</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Grade</th>
            </tr>

            <?php
            if (isset($_POST['cetak'])) {
                $nim = $_POST['vnim'];
                $sql = "SELECT a.nim,b.nama,a.kd_mtk,c.nm_mtk,a.tugas,a.uts,a.uas,
            (CASE 
            WHEN ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) < 59 THEN 
            'E'
            WHEN ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) >= 60 AND ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) <= 69 THEN
            'D'
            WHEN ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) >= 70 AND ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) <= 79 THEN
            'C'
            WHEN ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) >= 80 AND ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) <= 89 THEN
            'B'
            WHEN ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) >= 90 AND ((a.tugas*0.15)+(a.uts*0.35)+(a.uas*0.50)) <= 100 THEN
            'A'
            END)AS grade            
            FROM nilai_tab a INNER JOIN mahasiswa_tab b ON a.nim=b.nim INNER JOIN matakuliah_tab c ON a.kd_mtk=c.kd_mtk WHERE a.nim='$nim'";
                $retval = mysqli_query($conn, $sql);
                $no = 1;
                while ($row =  mysqli_fetch_assoc($retval)) { ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['nim'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['kd_mtk'] ?></td>
                        <td><?php echo $row['nm_mtk'] ?></td>

                        <td><?php echo $row['tugas'] ?></td>
                        <td><?php echo $row['uts'] ?></td>
                        <td><?php echo $row['uas'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <?php $no++; ?>
                    </tr>
            <?php }
            } ?>
        </table>
        <a href="index.php">Menu Utama</a><br>

    </div>


    <?php
    mysqli_close($conn);
    ?>

</body>

</html>