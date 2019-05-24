/**
* Created by PhpStorm.
* User: Ashen
* Date: 3/22/2019
* Time: 11:34 AM
*/
<html>
<title>ABC Institute</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4" id="topHeader"> <!--Configure onclick-->
    <button class="w3-bar-item w3-right w3-dark-grey w3-hover-light-grey" onclick="window.location.href = 'logout.php';">Log Out</button>
</div>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
    <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i>
    <div class="w3-center">
        <h4>YOUR PATH TO GREATNESS BEGINS HERE</h4>
        <h1 class="w3-xxxlarge w3-animate-bottom">ABC Institute</h1>
        <div class="w3-padding-32">
            <!--Redirect to login page onclick?-->
            <button class="w3-btn w3-xlarge w3-theme-dark w3-hover-teal" onclick="window.location.href = 'HomePageLI.php'" style="font-weight:900;">ABC Learning Management System</button>
        </div>
    </div>
</header>

<div class="w3-row-padding">
    <div class="w3-col s12 w3-center">
        <h4><b>Add Assignment<b></h4>

        <?php
        $user = "root";
        $password = "";
        $host = "localhost";
        $dbase = "itpm_lms_1";

        $connection = new mysqli($host, $user, $password, $dbase);
        if ($connection->connect_error) {
            die ('Could not connect:' . $connection->connect_error);
        }

        if(isset($_FILES['file']['name']) && isset($_POST['description']) && isset($_POST['aid'])) {
            $name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $description = $_POST['description'];
            $sid = $_POST['stuid'];
            $aid = $_POST['asid'];

            if (isset($name)) {
                $path = 'Uploads/';
                if (!empty($name)){
                    if (move_uploaded_file($tmp_name, $path.$name)) {
                        if($connection->query("INSERT INTO assignment (stuid, asid, description, filename) VALUES ( '$sid', '$aid','$description', '$file')")) {
                            echo 'File successfully uploadeds!';
                        }
                    }
                }
            }
        }

        ?>
        <form action="userfileupload.php" method='post' enctype="multipart/form-data">

            </select><br><br>

            Student ID Number : <input type="text" name="sid"/><br><br>
            Assignment Number : <input type="text" name="aid"/><br><br>
            Name of File: <input type="text" name="description"/><br><br>
            <input type="file" name="file"/><br><br>
            <input type="submit" name="submit" value="Upload"/>
        </form>
</body>