<?php 
include ('condb.php');
function GetListMahasiswa($nim)
{
    $sql = "SELECT nim,nama FROM mahasiswa_tab";
    $retmhs = mysqli_query($conn, $sql);
    $retval ="";
    while ($row =  mysqli_fetch_assoc($retmhs)) { 
          if ($row['nim'] == $nim) {
                        $retval .= "<option value='" . $row['nim'] . "'selected>" . $row['nim'] . "-" . $row['nama'] . "  </option>";
                    } else {
                        $retval .= "<option value='" . $row['nim'] . "'>" . $row['nim'] . "-" . $row['nama'] . "</option>";
            }
        }
        return $retval;
}
function GetListMataKuliah($kode)
{
    $sql = "SELECT kd_mtk,nm_mtk FROM matakuliah_tab";
    $retmhs = mysqli_query($conn, $sql);
    $retval ="";
    while ($row =  mysqli_fetch_assoc($retmhs)) { 
          if ($row['kd_mtk'] == $kode) {
                        $retval .= "<option value='" . $row['kd_mtk'] . "'selected>" . $row['kd_mtk'] . "-" . $row['nm_mtk'] . "  </option>";
                    } else {
                        $retval .= "<option value='" . $row['kd_mtk'] . "'>" . $row['kd_mtk'] . "-" . $row['nm_mtk'] . "</option>";
            }
        }
        return $retval;
}

?>