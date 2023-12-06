<?php

$nim = $nama = $alamat = $email = $no_hp = $prodi = '';

$error_nim = $error_nama = $error_alamat = $error_email = $error_no_hp = $error_prodi = '';


function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Form handling dan validasi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi NIM
    if (isset($_POST['nim']) && !empty($_POST['nim'])) {
        $nim = clean_input($_POST['nim']);
    } else {
        $error_nim = '* NIM is required';
    }

    // Validasi Nama
    if (isset($_POST['nama']) && !empty($_POST['nama'])) {
        $nama = clean_input($_POST['nama']);
    } else {
        $error_nama = '* Nama is required';
    }

    // Validasi Alamat
    if (isset($_POST['alamat']) && !empty($_POST['alamat'])) {
        $alamat = clean_input($_POST['alamat']);
    } else {
        $error_alamat = '* Alamat is required';
    }

    // Validasi Email
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = clean_input($_POST['email']);
        // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = '* Invalid email format';
        }
    } else {
        $error_email = '* Email is required';
    }

    // Validasi No HP
    if (isset($_POST['no_hp']) && !empty($_POST['no_hp'])) {
        $no_hp = clean_input($_POST['no_hp']);
        // Validasi format nomor HP
        if (!preg_match('/^[0-9]+$/', $no_hp)) {
            $error_no_hp = '* Invalid phone number format';
        }
    } else {
        $error_no_hp = '* No HP is required';
    }

    // Validasi Prodi
    if (isset($_POST['prodi']) && !empty($_POST['prodi'])) {
        $prodi = clean_input($_POST['prodi']);
    } else {
        $error_prodi = '* Prodi is required';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling and Validation</title>
</head>

<body>
    <h2>Form Mahasiswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span style="color: red;"><?php echo $error_nim; ?></span><br>

        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span style="color: red;"><?php echo $error_nama; ?></span><br>

        Alamat: <input type="text" name="alamat" value="<?php echo $alamat; ?>">
        <span style="color: red;"><?php echo $error_alamat; ?></span><br>

        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span style="color: red;"><?php echo $error_email; ?></span><br>

        No HP: <input type="text" name="no_hp" value="<?php echo $no_hp; ?>">
        <span style="color: red;"><?php echo $error_no_hp; ?></span><br>

        Prodi: <input type="text" name="prodi" value="<?php echo $prodi; ?>">
        <span style="color: red;"><?php echo $error_prodi; ?></span><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Hasil:</h2>
    <?php
    echo "NIM: " . $nim . "<br>";
    echo "Nama: " . $nama . "<br>";
    echo "Alamat: " . $_POST["alamat"] . "<br>";
    echo "Email: " . $_POST["email"] . "<br>";
    echo "Np hp: " . $_POST["no_hp"] . "<br>";
    echo "Prodi: " . $_POST["prodi"] . "<br>";
    ?>

</body>

</html>
