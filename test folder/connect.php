<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Customers</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="transfer.js"></script>
    </head>
    <body>
        <!-- <header>
            <input id="transfer" type="button" value="Money Transfer" onclick="doFunction();">
        </header> -->
        
        <div class="navbar">
            <h2 class="favicon" href="#">Bank of TSF</h2>
            <div class="topnav">
                <a href="1stPage.html">HOME</a>
                <a href="#about">ABOUT</a>
                <a class="active" href="connect.php">CUSTOMER DETAILS</a>
                <a href="transferMoney.php">TRANSFER MONEY</a>
                <a href="#contact">CONTACT</a>
            </div>
        </div>

        <fieldset>
            <legend>Customer Data</legend>
                <!-- TABLE CONSTRUCTION-->
                <table align="center">
                    <tr>
                        <th>Account No.</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Current Balance (Rs)</th>
                    </tr>
                    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                    <?php
                        include 'connection.php';
                        // SQL query to select data from database
                        $sql = "SELECT * FROM customers";
                        $result = $mysqli->query($sql);
                        $mysqli->close(); 
                    //    <!-- LOOP TILL END OF DATA  -->
                        while($rows=$result->fetch_assoc())
                        {
                     ?>
                    <tr>
                        <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                        <td><?php echo $rows['Account No'];?></td>
                        <td><?php echo $rows['Name'];?></td>
                        <td><?php echo $rows['Email ID'];?></td>
                        <td><?php echo $rows['Current Balance'];?></td>
                    </tr>
                    <?php
                        }
                     ?>
                </table>
        </fieldset>
    </body>
</html>