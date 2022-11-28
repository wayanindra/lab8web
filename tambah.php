<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
    $nama = $_POST['Nama'];
    $kategori = $_POST['Kategori'];
    $harga_jual = $_POST['Harga_Jual'];
    $harga_beli = $_POST['Harga_Beli'];
    $stok = $_POST['Stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    if ($file_gambar['error'] == 0)
    {
        $filename = str_replace(' ', '_',$file_gambar['name']);
        $destination = dirname(__FILE__) .'/gambar/' . $filename;
        if(move_uploaded_file($file_gambar['tmp_name'], $destination))
        {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'INSERT INTO data_barang (Nama, Kategori,Harga_Jual, Harga_Beli,
    Stok, Gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}',
    '{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>Tambah Barang</title>
    </head>
    <body>
        <div class="container">
            <h1>Tambah Barang</h1>
            <div class="main">
                <form method="post" action="tambah.php"
                enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Barang</label>
                    <input type="text" name="Nama" />
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <select name="Kategori">
                        <option value="Komputer">Komputer</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="input">
                    <label>Harga Jual</label>
                    <input type="text" name="Harga_Jual" />
                </div>
                <div class="input">
                    <label>Harga Beli</label>
                    <input type="text" name="Harga_Beli" />
                </div>
                <div class="input">
                    <label>Stok</label>
                    <input type="text" name="Stok" />
                </div>

                div class="input">
                <label>File Gambar</label>
                <input type="file" name="file_gambar" />
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</div>
</body>
</html>