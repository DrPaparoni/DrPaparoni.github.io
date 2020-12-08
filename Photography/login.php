<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta name="description" content="Premier Photo Productions, a Boise Idaho local company. We have affordable rates for all our photographs.">
    <title>Thank you</title>
<!-- font style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
<!-- External Style Sheet -->
    <link href="css/styles.css" rel="stylesheet" media="screen"/>
    <link href="css/print.css" rel="stylesheet" media="print"/>   
    
<!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
</head>
<!-- Main Body-->
<body>

    <nav class="horizontal" id="links">
        <a id="navicon" href="#"><img src="images/navicon.png"/></a>
        <ul>
            <li><a href="Landing.html">Home</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="Gallery.html">Gallery</a></li>
            <li><a href="Orders.html">Orders</a></li>
            <li><a href="login.php">Admin</a></li>
        </ul>
    </nav>
    <h1>Log In</h1>

    <form name="form1" method="post" action="admin.php">
        <span id="nameTextField">
            <label for="username"></label>
            <input type="text" name="username" id="name" placeholder="Name" required>
            </br>
            <span id="passwordspan">
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="textfieldRequiredMsg"></span> 
                    </br>
                        <input type="submit" name="Submit" id="Submit" value="Submit">                                                                                                  
    </form>

    <footer>
        &#169; Premier Photo Productions. <br>
        This website is for educational purposes and has no affiliation with any company.<br/><br/>
        <a href="https://instagram.com/" target="_blank"><img src="images/iconmonstr-instagram-1-48.png" alt="social icon for instagram"></a>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <a href="https://www.twitter.com/" target="_blank"><img src="images/iconmonstr-twitter-3-48.png" alt="social icon for twitter"></a>
    </footer>
</body>

<!---------------------------------------

Date        Name        Description

2/7/2020    EWalter     Created page

---------------------------------------!>