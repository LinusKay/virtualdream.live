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
    <title>EARN VIRTUBUCKS</title>
    <script>
        let virtuBucks;
        let virtuBuckTimer = 10000;

        window.addEventListener("load", function() {
            let virtuBuckCounter = document.getElementById("virtuBuckCounter");
            loadVirtuBucks();
            setTimeout(function() {
                addVirtuBuck();
            }, virtuBuckTimer);
        });

        function loadVirtuBucks() {
            virtuBucks = Cookies.get("virtuBucks", { domain: 'localhost', path: '/' });
            if (virtuBucks) {
                virtuBucks = Number(virtuBucks);
            } else {
                virtuBucks = 0;
            }
            virtuBuckCounter.innerText = virtuBucks;
        }

        function saveVirtuBucks() {
            Cookies.set('virtuBucks', virtuBucks, { domain: 'localhost', path: '/' });
        }

        function addVirtuBuck() {
            virtuBucks += 1;
            saveVirtuBucks();
            virtuBuckCounter.innerText = virtuBucks;
            setTimeout(function() {
                addVirtuBuck();
            }, virtuBuckTimer);
        }
    </script>
</head>
<body style="width:800px;margin:auto;text-align:center;">
    <p>You can earn VirtuBucks just by sitting on this page!</p>
    <p>Current VirtuBucks: <span id="virtuBuckCounter">#</span></p>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
</body>
</html>