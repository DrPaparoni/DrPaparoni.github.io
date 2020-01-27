<?php
    
    $visitorName = filter_input(INPUT_POST, 'custName');
    $visitorEmail = filter_input(INPUT_POST, 'custEmail');
    $visitorPhone = filter_input(INPUT_POST, 'custPhone');
    $visitorNum = filter_input(INPUT_POST, 'subNum');
    $visitorHours = filter_input(INPUT_POST, 'hourRate');
    /* echo "Fields: " . $visitorName . $visitorEmail;  */
    
    // Validate inputs
    if ($visitorName == null || $visitorEmail == null) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        echo "Form Data Error: " . $error; 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=photography';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }

            // Add the product to the database  
            $query = 'INSERT INTO visitor
                         (visitorName, visitorEmail, visitorPhone, visitorNum, visitorHours)
                      VALUES
                         (:visitorName, :visitorEmail, :visitorPhone, :visitorNum, :visitorHours)';
            $statement = $db->prepare($query);
            $statement->bindValue(':visitorName', $visitorName);
            $statement->bindValue(':visitorEmail', $visitorEmail);
            $statement->bindValue(':visitorPhone', $visitorPhone);
            $statement->bindValue(':visitorNum', $visitorNum);
            $statement->bindValue(':visitorHours', $visitorHours);
            $statement->execute();
            $statement->closeCursor();
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */

}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta name="description" content="Premier Photo Productions, a Boise Idaho local company. We have affordable rates for all our photographs.">
    <title>Contact Us</title>
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
        </ul>
    </nav>
    <h1>Order Received</h1>

    <p>Thank you, <?php echo $visitorName; ?>, we will get back to you shortly.</p>

    <footer>
        &#169; Premier Photo Productions. <br>
        This website is for educational purposes and has no affiliation with any company.<br/><br/>
        <a href="https://instagram.com/" target="_blank"><img src="images/iconmonstr-instagram-1-48.png" alt="social icon for instagram"></a>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <a href="https://www.twitter.com/" target="_blank"><img src="images/iconmonstr-twitter-3-48.png" alt="social icon for twitter"></a>
    </footer>
</body>