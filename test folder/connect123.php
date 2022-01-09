<html>
<head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Customers</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .display_table {
            width:100vw;
            height:80vh;
            display:flex;
            flex-direction:column;
            justify-content: center;
            text-align:center;
        }

        h1 {
            text-align:center;
            /* margin-top:-20px; */
            margin-bottom:20px;
        }
        
        table {
            border: 2px solid black;
            border-collapse:collapse;
            font-weight:bold;
        }

        th {
            background-color: lightslategray;
        }

        th,td {
            border: 2px solid black;
            padding:8px 30px;
            text-align:center;
        }

        td {
            font-size:18px;
        }
    </style>
</head>
<body>
    <div class="main_div">
    
        <div class="navbar">
            <h2 class="favicon" href="#">Bank of TSF</h2>
            <div class="topnav">
                <a href="1stPage.html">HOME</a>
                <a href="#about">ABOUT</a>
                <a class="active" href="connect123.php">CUSTOMER DETAILS</a>
                <a href="transferMoney.php">TRANSFER MONEY</a>
                <a href="#contact">CONTACT</a>
            </div>
        </div>

        <div class="display_table">
            <h1>Customer Details</h1>
            <div class="center_div">
                <div class="table-responsive">
                    <table align="center">
                        <thead>
                            <tr>
                                <th>Account No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Current Balance</th>
                                <th colspan="2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'connection123.php';
                                $selectquery = " select * from customers";
                                $query = mysqli_query($con,$selectquery);
                                $numofrows = mysqli_num_rows($query);

                                while($res = mysqli_fetch_array($query))
                                {
                            ?>
                            <tr>
                                <td><?php  echo $res['Account No']; ?></td>
                                <td><?php echo $res['Name']; ?></td>
                                <td><?php echo $res['Email ID']; ?></td>
                                <td><?php echo $res['Current Balance']; ?></td>
                                <td><a href="transferMoney.php?idtransfer=<?php  echo $res['Account No']; ?>" ><i class=" fa fa-user-circle large" aria-hidden="true" style="color:rgb(77, 168, 172);"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
