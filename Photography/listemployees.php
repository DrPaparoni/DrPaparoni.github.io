<?php
    require('./model/database.php');
    
    class Database {
    private static $dsn = 'mysql:host=localhost;dbname=photography';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                echo '</br>' . $error_message;
                exit();
            }
        }
        return self::$db;
    }
}

class Employee {
    private $id;
    private $first_name;
    private $last_name;

    public function __construct($id, $first_name, $last_name) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getFirstName() {
        return $this->first_name;
    }
    
    public function getLastName() {
        return $this->last_name;
    }

    public function setFirstName($value) {
        $this->first_name = $value;
    }
    
    public function setLastName($value) {
        $this->last_name = $value;
    }
}

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY lastName';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['firstName'],
                                     $row['lastName']);
            $employees[] = $employee;
        }
        return $employees;
    }
}

$employees = EmployeeDB::getEmployees();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta name="description" content="Premier Photo Productions, a Boise Idaho local company. We have affordable rates for all our photographs.">
    <title>ADMIN</title>
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
    <h1>Employees</h1>
    
    <ul>
            <?php foreach ($employees as $employee) : ?>
            <li>
                <?php echo $employee->getLastName() . ',' . $employee->getFirstName();?>
            </li>
            <?php endforeach; ?>
        </ul>
    
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