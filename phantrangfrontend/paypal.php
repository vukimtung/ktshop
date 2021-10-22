<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('connect.php');
        if(isset($_SESSION['user_email_address'])){
            $emailkh = $_SESSION['user_email_address'];
            $sql="SELECT * FROM customers WHERE email_cust='$emailkh'";
            $results=$connect->query($sql);
            $kq=$results->fetch_assoc();
        } else if(isset($_SESSION['email'])){
            $emailkh = $_SESSION['email'];
            $sql="SELECT * FROM customers WHERE email_cust='$emailkh'";
            $results=$connect->query($sql);
            $kq=$results->fetch_assoc();
        } else {
        
    }
    $idkh = $kq['id_cust'];
    $gia = $_SESSION['total'];
?>
<head>
<link rel="SHORTCUT ICON"  href="https://www.facebook.com/images/emoji.php/v9/f64/1/16/1f370.png">
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> Thanh toán Paypal || KT-Cake </title>
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" style="text-align: center; margin-top: 100px;">
        <h1>Trang Thanh Toán Trực Tuyến Paypal</h1>
    </div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUyvTMMQIxLp1iUuBqgKq2H6im-Hc9WmyNQBzwDrRXXgWu0NSZ99QHiejEmG_LZaIlk1LFvx_nzcBXQf&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // alert('Thanh toán thành công '); //+ details.payer.name.given_name + '!'
                    window.location = "thanhtoanpaypal.php?idkh=<?php echo $idkh; ?>&gia=<?php echo $gia;?>";
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>

</html>