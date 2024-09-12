<?php
session_start();

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // get username and password
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
  
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  
    if ($conn->query($sql)->fetch_array() != null) {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['success'] = "Berhasil Login";
      header('Location: dashboard.php');
    } else {
      $_SESSION['error'] = "Username atau password tidak di temukan.";
      header('Location: login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .form-table input[type="password"],
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
            .form-table input[type="password"],
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
    <div class="outer">
        <h2>Login</h2>
        <div class="container">
            <form method="POST">
                <table class="form-table">
                    <tr>
                        <th>Username</th>
                        <td><input type="text" name="username" placeholder="Masukkan Username"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="password" placeholder="Masukkan Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Login</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>