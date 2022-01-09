<html>
    <head>
        <title>Money Transfer</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="navbar">
        <h2 class="favicon" href="#">Bank of TSF</h2>
        <div class="topnav">
            <a href="1stPage.html">HOME</a>
            <a href="#about">ABOUT</a>
            <a href="connect123.php">CUSTOMER DETAILS</a>
            <a class="active" href="transferMoney.php">TRANSFER MONEY</a>
            <a href="#contact">CONTACT</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <form method="POST">
                <?php
                        include 'connection123.php';
                        $ids=$_GET['idtransfer'];
                        $showquery="select * from 'customers' where ['Account No']=$ids";
                        $showdata=mysqli_query($con,$showquery);
                        if (!$showdata) {
                            printf("Error: %s\n", mysqli_error($con));
                            exit();
                        }
                        $arrdata=mysqli_fetch_array($showdata);
                    ?> 
                                        
                    <div class="card-body">
                        <h3>Transfer Details</h3>
                        <label>Account Number</label>
                        <input type="number" name="from" value="<?php echo $arrdata['Account No']; ?>" required placeholder="Enter sender's account number"/><br><br>
                        
                        <label>Amount</label>
                        <input type="number" name="amount" value="" style="width:210px;" required placeholder="Enter amount"/><br><br>
                    </div>

                <div class="col-sm-4">
                    <div class="card text-center" style="margin-top:60px;height:380px;">
                        <div class="card-body">
                            <button name="submit">Proceed to Pay</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card text-center" style="margin-top:76px;background-color:#7A3DAF;border-radius:10px;color:white">
                        
                        <div class="card-body">
                            <h3>Transfer Details</h3>
                            <label>Account Number</label>
                            <input type="number" name="to" value="" required placeholder="Enter receiver's account number"/><br><br>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
 
    <?php
        include 'connection123.php';

        if(isset($_POST['submit']))
        {
            $Sender_no=$_POST['from'];
            $Sender_amount=$_POST['amount'];
            $Receiver_no=$_POST['to'];
            
            $ids=$_GET['idtransfer'];
            $senderquery="select * from 'customers' where ['Account No']=$ids ";
            $senderdata=mysqli_query($con,$senderquery);
        
            if (!$senderdata) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
            }
            $arrdata=mysqli_fetch_array($senderdata);

            //receiverquery
            $receiverquery="select * from customers where ['Account No']='$Receiver_no' ";
            $receiver_data=mysqli_query($con,$receiverquery);
        
            if (!$receiver_data) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
            }
            $receiver_arr=mysqli_fetch_array($receiver_data);
            $id_receiver=$receiver_arr['Account No'];


            if($arrdata['Current Balance'] >= $Sender_amount)
            {
            $decrease_sender=$arrdata['Current Balance'] - $Sender_amount;
            $increase_receiver=$receiver_arr['Current Balance'] + $Sender_amount;
            $query="UPDATE customers SET ['Account No']=$ids, ['Current Balance']=$decrease_sender where ['Account No']=$ids ";
            $rec_query="UPDATE customers SET ['Account No']=$id_receiver, ['Current Balance']=$increase_receiver where ['Account No']=$id_receiver ";
            $res= mysqli_query($con,$query);
            $rec_res= mysqli_query($con,$rec_query);
            // $res_receiver=mysqli_query($con,$query_receiver);
            if($res && $rec_res)
            {
            ?>
            <script>
                swal("Done!", "Transaction Successful!", "success");
            </script> 
            
            <?php
        
            }
            else
            {
            ?>
            <script>
                swal("Error!", "Error Occured!", "error");
            </script> 

            <?php
            
            }
            }
        

        else
        {
        ?>
            <script>
                swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
            </script> 
        <?php
        
        }
        
        }
        ?>

    </body>
</html>