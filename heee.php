<?php

$host = '127.0.0.1'; 
$port = '3306'; 
$database = 'Mahasiswa'; 
$username = 'root'; 
$password = '';


$koneksi = new mysqli($host, $username, $password, $database, $port);


if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}


function tambahSiswa($nama) {
    global $koneksi;
    $sql = "INSERT INTO students (name) VALUES ('$nama')";
    if ($koneksi->query($sql) === TRUE) {
        echo "Siswa berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}


function tampilkanSemuaSiswa() {
    global $koneksi;
    $sql = "SELECT * FROM students";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>".$row["name"]." <a href='?hapus=".$row["id"]."'>Hapus</a> | <a href='?edit=".$row["id"]."'>Edit</a></li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}


function hapusSiswa($id) {
    global $koneksi;
    $sql = "DELETE FROM students WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        echo "Siswa berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }
}


function getSiswaById($id) {
    global $koneksi;
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $koneksi->query($sql);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tambah"])) {
        $nama = $_POST["nama"];
        tambahSiswa($nama);
    } elseif (isset($_POST["update"])) {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $sql = "UPDATE students SET name='$nama' WHERE id=$id";
        if ($koneksi->query($sql) === TRUE) {
            echo "Nama siswa berhasil diperbarui.";
        } else {
            echo "Error updating record: " . $koneksi->error;
        }
    }
}


if (isset($_GET["hapus"])) {
    hapusSiswa($_GET["hapus"]);
}


if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $siswa = getSiswaById($id);
    if (!$siswa) {
        echo "Siswa tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>heee
    </title>
</head>
<body>
    <h2>Tambah Siswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php if(isset($siswa)) { ?>
            <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
        <?php } ?>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo isset($siswa) ? $siswa['name'] : ''; ?>"><br><br>
        <button type="submit" name="<?php echo isset($siswa) ? 'update' : 'tambah'; ?>"><?php echo isset($siswa) ? 'Update' : 'Tambah'; ?></button>
    </form>

    <h2>Daftar Siswa</h2>
    <?php tampilkanSemuaSiswa(); ?>
</body>
</html>
