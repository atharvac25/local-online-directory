<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Police Station</title>
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

    <style>
        *{
            margin: 0px;
            padding: 0px;
        }

        body, html{
            font-family: 'Montserrat', sans-serif;
            width: 100%;
            height: 100%;
            background-color: aliceblue;
        }

        .box {
            width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .center {
            display: block;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 4px solid #000000;
        }

        @media screen and (max-width: 800px) { 
            .center { width: 400px }
        }

        @media screen and (max-width: 450px) { 
            .center { 
                width: 300px;
                }
            .box {
                width: 300px;
            }
        }

    </style>
</head>


<body>

<!-- Navigation Bar -->
    <?php include 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="box">
            <a href = "https://www.google.com/maps/place/Nerul+Police+Station/@19.0286774,73.0188415,15z/data=!4m5!3m4!1s0x0:0xf8ea9ae15cb99ebb!8m2!3d19.0286774!4d73.0188415" target="_blank"><img src="images/firedep/pol.jpg" alt="No Image" width="500" class="center"></a>
        </div>

        <div class="text-center text-success">
            <p>This is a verified service</p>
        </div>
        
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
            </tr>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "info_for_directory");
            if ($conn -> connect_error) {
                die("Connection Failed!".$conn -> connect_error);
            }

            $sql = "SELECT name, address, contact FROM essential WHERE id = '14'";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["contact"]."</td></tr>";
                }
            }
            else {
                echo "0 result";
            }

            $conn -> close();

            ?>
        </table>

        <div class="text-center" style="margin-bottom: 10px;">
            <form action="fav_insert.php" method="POST">
                <button type="submit" class="btn btn-outline-danger" name="add_fav">Add to Favourites</button>
                <input type="hidden" name="place" value="Nerul Police Station">
                <input type="hidden" name="address" value="Jagatguru Aadi Shankracharya Marg, Sector 23, Nerul, Navi Mumbai, Maharashtra 400706">
                <input type="hidden" name="contact" value="2227702324">
            </form>
        </div>

        </div> 

</body>
</html>
