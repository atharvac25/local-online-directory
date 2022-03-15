<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Favourites!</title>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@900&family=Montserrat&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Styling -->

    <style type="text/css">

            *{
                padding: 0px;
                margin: 0px;
            }
            body{
                background-color: aliceblue;
                display: grid;
                grid-template-rows: auto 1fr auto;
                font-family: 'Montserrat', sans-serif;
                
            }

            header{
                background-color: aqua;
                border-radius: 20px;
                width: 100%;
                height: fit-content;
                font-size: 20px;
                display: grid;
                grid-template-columns: 1fr 2fr auto auto;
                align-items: center;
            }

            .navbar .navbar-brand {
                font-size: 25px;
            }

            .item a {
                text-decoration: none;
                font-size: 20px;
                color: #000000;
                transition: 0.3s ease;
            }

            .item a:hover{
                color: #595959;
            }

            .but {
                display: inline-block;
            }

            .button {
                margin-top: -5px;
            }

            .about, .contact{
                padding-right: 10px;
                margin: auto;
            }

            .container1{
                text-align: center;
                display: grid;
                padding: 6%;
                grid-template-columns: 1fr 1fr 1fr;
                grid-row-gap: 3%;
                grid-column-gap: 8%;

            }

            .container1 img{
                height: 200px;
            }

            .link1 a{
                text-decoration: none;
                font-size: 30px;
            }

            /* Responsive Styling */
            @media (max-width: 800px) {
                .container1{
                    grid-template-columns: 1fr 1fr 1fr;
                }

            }
            @media (max-width: 500px) {
                .container1{
                    grid-template-columns: 1fr 1fr;
                }

            }
            @media (max-width: 200px) {
                .container1{
                    grid-template-columns: 1fr;
                }

            }

    </style>
    
</head>
<body>  

    <nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-static-top">
        <a href="title.php" class="navbar-brand text-warning font-weight-bold">
        <img src="images/logo.png" width="30px" height="30px" class="d-inline-block"> Online Directory</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarcollapse">
            
            <!-- Navbar right side-->
            <div class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link"><button class="btn btn-danger button">Logout</button></a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link"><h4>Contact us</h4></a>
                </li>
            </div>
        </div>
    </nav>

    <div class="text-dark text-center">
        <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
    </div>


        <table class="table text-center">
            <tr>
                <th>Place 1</th>
                <th>Place 2</th>
                <th>Place 3</th>
                <th>Place 4</th>
                <th>Place 5</th>
            </tr>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "users_registry");
            if ($conn -> connect_error) {
                die("Connection Failed!".$conn -> connect_error);
            }

            $username = $_SESSION['username'];

            $sql = "SELECT * FROM register WHERE username = '$username'";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "<tr><td>".$row["favourite1"]."</td><td>".$row["favourite2"]."</td><td>".$row["favourite3"]."</td><td>".$row["favourite4"]."</td><td>".$row["favourite5"]."</td></tr>";
                    echo "<tr><td>".$row["address1"]."</td><td>".$row["address2"]."</td><td>".$row["address3"]."</td><td>".$row["address4"]."</td><td>".$row["address5"]."</td></tr>";
                    echo "<tr><td>".$row["contact1"]."</td><td>".$row["contact2"]."</td><td>"
                    .$row["contact3"]."</td><td>".$row["contact4"]."</td><td>".$row["contact5"]."</td></tr>";
                }
            }
            else {
                echo "0 result";
            }

            $conn -> close();

            ?>
        </table>

</body>