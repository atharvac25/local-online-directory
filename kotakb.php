<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banks</title>
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
            height: 350px;
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
    <?php include 'navbar.php'; ?>
    <div class="container-fluid">
        <!-- <div class="box">
            <a href = "https://www.google.com/search?bih=600&biw=1366&rlz=1C1RLNS_enIN906IN906&hl=en&tbs=lf:1,lf_ui:4&tbm=lcl&sxsrf=ALeKk01n6JLP77cC4FzP4ATMMBY38_-YjA:1606147329813&q=kotak+mahindra+bank+nerul&rflfq=1&num=10&ved=2ahUKEwj2lLOIhZntAhUcyzgGHYipBXgQtgN6BAgBEAc#rlfi=hd:;si:;mv:[[19.076777399999997,73.04108839999999],[19.011139699999998,73.000051]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u16!2m2!16m1!1e1!1m4!1u16!2m2!16m1!1e2!2m1!1e16!2m1!1e3!3sIAE,lf:1,lf_ui:4" target="_blank"><img src="images/banks/bank.jpg" alt="No Image" width="500" class="center"></a>
        </div> -->

        <div class="row">
            <div class="column text-center">
                <a href="axisb.php"><button type="button" class="btn btn-outline-dark btn-edit">
                Previous</button></a>
            </div>
            <div class="column text-center">
                <a href="https://www.google.com/maps/place/Kotak+Mahindra+Bank/@19.0293849,73.0188756,15z/data=!4m5!3m4!1s0x0:0x9b62ca50b137b60a!8m2!3d19.0293849!4d73.0188756" target="_blank"><img src="images/banks/bank.jpg" alt="No Image Available" class="center img-fluid"></a>
            </div>
            <div class="column text-center">
                <a href="sbib.php"><button type="button" class="btn btn-outline-dark btn-edit">
                Next</button></a>
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

            $sql = "SELECT name, address, contact FROM essential WHERE id = '39'";
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
                <input type="hidden" name="place" value="Kotak Mahindra Bank">
                <input type="hidden" name="address" value="Shop No 38-42, Krishna Kamal Co-operative Housing Society, Sector 21, Nerul, Navi Mumbai - 400706, Opposite HDFC Bank & ICICI Bank">
                <input type="hidden" name="contact" value="18602662666">
            </form>
        </div>

        <div>
            <a href="banks.php"><button type="button" class="btn btn-success">
            &larr; Back to Banks</button></a>
        </div>

    </div> 

</body>
</html>
