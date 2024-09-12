<?php

include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT * FROM nilai_siswa";

$data_siswa = $conn->query($sql);

while ($row = $data_siswa->fetch_row()) {
    $banyak_siswa[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1A3636;
        }

        nav {
            background-color: #436850;
        }

        #brand,
        #isi {
            color: #D6BD98;
        }

        #isi:hover {
            color: #E1F0DA;
        }

        .outer {
            margin-top: 3rem;
        }

        .judul {
            text-align: center;
            font-size: 3rem;
            color: #D6BD98;
        }

        h2 {
            text-align: center;
            color: #D6BD98;
            font-size: 2rem;
        }

        .container,
        .container2 {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgb(103, 125, 106);
            border-radius: 10px;
        }

        .container2 {
            margin-top: 2rem;
            height: auto;
            width: auto;
            max-width: 900px;
        }

        .form-table,
        .form-table2 {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .form-table th,
        .form-table td,
        .form-table2 th,
        .form-table2 td {
            border: none;
            padding: 7px;
            text-align: center;
        }

        .form-table th,
        .form-table2 th {
            background-color: rgb(64, 83, 76);
            color: white;

        }

        .form-table td,
        .form-table2 td {
            vertical-align: top;
        }

        .form-table input[type="text"],
        .form-table input[type="number"],
        .form-table select {
            width: 100%;
            height: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button,
        input[type="reset"] {
            background-color: #1A5319;
            color: white;
            border: none;
            padding: 7px 20px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 1rem;
            width: 5rem;
        }

        .edit {
            background-color: #344C64 !important;
        }

        .edit a,
        .delete a {
            color: #D6BD98;
        }

        .delete {
            background-color: #5D0E41 !important;
        }

        .delete:hover,
        .edit:hover {
            opacity: 0.6;
        }

        .form-table button:hover,
        input[type="reset"]:hover {
            background-color: #1a5656;
        }

        #outer {
            flex-direction: column;
        }

        @media (max-width:991px) {
            #outer {
                flex-direction: row;
            }
        }

        @media (max-width: 760px) {
            .judul {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .form-table2 th,
            .form-table2 td {
                width: 70%;
            }

            .form-table input[type="text"],
            .form-table input[type="number"],
            .form-table select {
                width: calc(100% - 10px);
            }

            .container,
            .container2 {
                width: calc(100% - 20px);
            }

            button[type="submit"],
            input[type="reset"] {
                width: 100%;
                margin-top: 1rem;
            }
        }

        @media (max-width: 360px) {
            .judul {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" id="brand" href="#">SMKN 71 Jakarta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a id="isi" class="nav-link" href="#">Home</a>
            <a id="isi" class="nav-link" href="#">About Us</a>
                    <a id="isi" class="nav-link" href="#">Visi Misi</a>
                    <a id="isi" class="nav-link" href="belajar1.php">Nilai SIswa</a>
            </div>
        </div>
        <a href="login.php" class="btn btn-primary">Login</a>
    </nav>  

    <div class="outer">
        <h2 class="judul">SMKN 71 Jakarta</h2>
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum nam numquam reprehenderit vitae modi quam eaque quae hic laboriosam deleniti.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>