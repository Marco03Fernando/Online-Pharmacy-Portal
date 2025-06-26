<!DOCTYPE html>
<html>
    <head>
        <title>Consultations Page</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles3.css">
        <link rel="icon" href="images/logo icon.ico">
    </head>
    <body class="admin_body">
        <!--header start-->
        <img class="logo" src="images/pharmacy logo.png" alt="Pharmacy Logo">

        <ul class="list1 items">
            <li>Home</li>
            <li>Shop categories</li>
            <li>Consult</li>
            <li>Track</li>
            <li>About us</li>
            <li>FAQ</li>
            <li><button class="login_btn">Logout</button></li>
        </ul>

        <ul class="list2 items" style="margin-left: 830px;">
            
            <li><form action="/search" method="get" style="text-align: center;"></form></li>
            <li><input type="text" placeholder="Search" class="search_bar"></li>
            <li><button type="submit" class="search_btn">Search</button></li>
        </ul>
        </form>
        <!--header end-->
       
        <div class="admin_dashboard">
            <!--crud start-->
            
            <div>
                <iframe src="wishlist.php" width="100%" height="600px" frameborder="0"></iframe>">               
            </div>
            
            <!--crud end-->
        </div>
        

        <!--footer start-->
        <div class="footer">

            <div class="ftrcontent para">
                <img class="ftrlogo" src="images/pharmacy logo.png" alt="footer logo">
                
                <p>Your trusted online pharmacy providing quality healthcare products and services</p>
            </div>

            <div class="ftrcontent link1">
                <p> Quick links
                    <ul>
                        <li>Home</li>
                        <li>Shop</li>
                        <li>Upload Prescription</li>
                        <li>Track your package</li>
                        <li>Consult</li>
                    </ul>
                </p>
            </div>

            <div class="ftrcontent link2">
                <p> More Information
                    <ul>
                        <li>About us</li>
                        <li>Privacy Policy</li>
                        <li>Terms & Conditions</li>
                        <li>Feedback</li>
                        <li>FAQ</li>
                    </ul>
                </p>
            </div>
            <div class="ftrcontent link3">
                <p> Contact us
                    <ul>
                        <li>Phone: +1-800-123-4567</li>
                        <li>Email: support@pharmacyportal.com</li>
                    </ul>
                </p>
            </div>

            <div class="media">
                <p>Stay connected</p>
                <img class="mediaImage" src="images/mediaImage.png" alt="social media images">
            </div>
        </div>
        <!--footer end-->

        <script src="js/script.js"></script>
    </body>
</html>