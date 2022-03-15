<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotels</title>
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

        .center {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 4px solid #000000;
        } 

        .btn-edit{
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }

        @media screen and (max-width: 800px) { 
            .column {
                width: 100%;
            }

            .center {
                margin-top: 10px;
                margin-bottom: 0px;
                
            } 
        }

    </style>
</head>


<body>

<!-- Navigation Bar -->
    <?php include 'navbarnon.php'; ?>
    <div class="container-fluid">
        <!-- <div class="box">
            <a href = "https://www.google.com/maps/place/Sky+Suites+by+Monarch/@19.0616374,73.0026103,15z/data=!4m2!3m1!1s0x0:0x1f954e2afe9a0a71?sa=X&ved=2ahUKEwiujr7GuZHtAhXLzTgGHZpJAKoQ_BIwDXoECBMQBQ" target="_blank"><img src="images/hotels/sky1.jpg" alt="No Image" width="500" class="center"></a>
        </div> -->
        
        <div class="row">
            <div class="column text-center">
                <a href="star.php"><button type="button" class="btn btn-outline-dark btn-edit">Previous</button></a>
            </div>
            <div class="column">
                <a href = "https://www.google.com/maps/place/Sky+Suites+by+Monarch/@19.0616374,73.0026103,15z/data=!4m2!3m1!1s0x0:0x1f954e2afe9a0a71?sa=X&ved=2ahUKEwiujr7GuZHtAhXLzTgGHZpJAKoQ_BIwDXoECBMQBQ" target="_blank"><img src="images/hotels/sky1.jpg" alt="No Image Available" class="center img-fluid"></a>
            </div>
            <div class="column text-center">
                <a href="park.php"><button type="button" class="btn btn-outline-dark btn-edit">Next</button></a>
            </div>
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

            $sql = "SELECT name, address, contact FROM nonessen WHERE id = '2'";
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
                <input type="hidden" name="place" value="Hotel Sky Suites By Monarch">
                <input type="hidden" name="address" value="H26,27,28 plot no. 4 and 6, Fairmount Premises ,Sector 17, Palm beach road, Sanpada, Navi Mumbai, Thane, Maharashtra, 400705">
                <input type="hidden" name="contact" value="1246201784">
            </form>
        </div>

        <div>
            <a href="hotel.php"><button type="button" class="btn btn-success">&larr; Back to Hotels</button></a>
        </div>

    </div> 

</body>
</html>
