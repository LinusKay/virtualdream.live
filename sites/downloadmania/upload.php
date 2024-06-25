<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        # /PAGE SETUP
    ?>
    <title>DOWNLOAD MANIA - GET YOUR LOAD ON</title>
    <script>
        window.addEventListener("load", function() {
            window.addInfection("slider");
            // window.unlockSticker("malPals");
        });
    </script>
    <style>
        .dl-title {
            
        }
        .dl-preview {
            height:50px;
            width:50px;
        }
        .dl-owner{
            font-size:12px;
        }
        .dl-total {
            font-size:12px;
        }
        a {

        }
    </style>
</head>
<body>
<?php 
    if(isset($_COOKIE['uploads'])) {
        $uploads = $_COOKIE['uploads'];
    }
    else { $uploads = 0; }
    setcookie( "uploads", $uploads + 1, time() + (86400 * 30));  

    if(isset($_GET['uploadfile'])) { $file = "<b>" . htmlspecialchars($_GET['uploadfile'], ENT_QUOTES) . "</b>"; } else { $file = "your file"; }
    ?>
    <center>
    <img src="src/img/bannergridcroptext.png">
    <p>GET YOUR LOAD ON - LET SOFTWARE BE FREE</p>
    <h3>THANK YOU FOR UPLOADING</h3>
    <table width="600">
        <tbody>
            <tr>
                <td align="center">
                    Thank you for uploading <?php echo $file; ?>! Your file will be scanned and posted shortly.
                </td>
            </tr>
            <tr>
                <td align="center"><b>-- <a href="index.php">Back</a> --</b></td>
            </tr>
        </tbody>
    </table>
    </center>
</body>
</html>