<?php include("condb.php");

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px
        }

        input {
            width: 80px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

         td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

         tr:hover {
            background-color: #ddd;
        }

       th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
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

    </div>


<?php 
        mysqli_close($conn);
?>

</body>

</html>