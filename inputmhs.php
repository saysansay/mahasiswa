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
        select {
            width: 100%;
        }
    </style>
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