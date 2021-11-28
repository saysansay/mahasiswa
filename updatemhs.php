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

        input,
        select,
        textarea {
            width: 100%;
        }
    </style>
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
                    <td><input name="vnim" maxlength="10" value=<?php echo $row['nim'] ?>></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input name="vnama" maxlength="20" value=<?php echo $row['nama'] ?>></td>
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