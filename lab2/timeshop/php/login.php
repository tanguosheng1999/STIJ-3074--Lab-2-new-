<?php
if (isset($_POST["submit"])) {
    include 'dbconnect.php';
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$pass'");
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    if ($number_of_rows  > 0) {
        session_start();
        $_SESSION["sessionid"] = session_id();
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<title>TIMESHOP</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<script src="../javascript/script.js"></script>
<body onload="loadCookies()">

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
  <a href="new_watch.php" onclick="w3_close()" class="w3-bar-item w3-button">New Watch</a>
  <a href="index.php#About" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
</nav>

<!-- Top menu -->
<div id="Home" class="Home w3-container w3-text-blue w3-padding-16">
<div class="w3-dispaly-container w3-text-blue">
  <div class=" w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16 w3-hide-large w3-hide-medium"><img src="logo time shop.png" width="80" height="80"></div>
    <div class="w3-center w3-padding-16 w3-hide-large w3-hide-medium" style="font-weight:bold">TIME SHOP</div>
    <div class="w3-right w3-padding-16 w3-hide-small"><img src="logo time shop.png" width="120" height="120"></div>
    <div class="w3-center w3-padding-16 w3-hide-small" style="font-size: 100px; font-weight:bold">TIME SHOP</div>
  </div>
</div>
</div>

<div class="w3-bar w3-blue">
        <a href="index.php" class="w3-bar-item w3-button w3-left">Home</a>
    </div>

<!-- !PAGE CONTENT! -->
<div class="w3-container w3-padding-64 w3-pale-blue">
        <div class="w3-container w3-padding-64 w3-pale-blue form-container">
        <div class="w3-card-4 w3-round">

            <div class="w3-container w3-blue w3-round">
                <h2>Login</h2>
            </div>

            <form name="loginForm" class="w3-container" action="login.php" method="post">
                <p>
                    <label class="w3-text-black"><b>Email</b></label>
                    <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" required>
                </p>

                <p>
                    <label class="w3-text-black"><b>Password</b></label>
                    <input class="w3-input w3-border w3-round" name="password" type="password" id="idpass" required>
                </p>

                <p>
                    <input class="w3-check w3-text-black" type="checkbox" id="idremember" name="remember" onclick="rememberMe()">
                    <label>Remember Me</label>
                </p>

                <p>
                    <button class="w3-btn w3-round w3-blue w3-block" name="submit">Login</button>
                </p>
            </form>
        </div>
        </div>
    </div>

<footer class="w3-row-padding w3-padding-32">
  <hr></hr>
  <p class="w3-center">TimeShop&reg;</p>
</footer>

    <div id="cookieNotice" class="w3-right w3-block" style="display: none;">
        <div class="w3-blue">
            <h4>Cookie Consent</h4>
            <p>This website uses cookies or similar technologies, to enhance your
                browsing experience and provide personalized recommendations.
                By continuing to use our website, you agree to our
                <a style="color:black;" href="/privacy-policy">Privacy Policy</a>
            </p>
            <div class="w3-button">
                <button onclick="acceptCookieConsent();">Accept</button>
            </div>
        </div>
        <script>
            let cookie_consent = getCookie("user_cookie_consent");
            if (cookie_consent != "") {
                document.getElementById("cookieNotice").style.display = "none";
            } else {
                document.getElementById("cookieNotice").style.display = "block";
            }
        </script>
    </div>

</body>
</html>