<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Linh Dan Nguyen" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style.css">
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <title>Assignment 1 Post Job Process</title>
</head>
<body>

    <style>
        <?php include 'style.css'; ?>
    </style>
    
    <!-- Header & Navigation Bar -->
    <?php include 'header.php'; ?>
    

<?php

    $id = "";
    $title = "";
    $description = "";
    $closingdate = "";
    $position = "";
    $contract = "";
    $application = "";
    $location = "";

    $message = ""; //all errors will be stored in this var


    //function to validate the Position ID
    function checkID($id) {
        global $message;
        $id_format = "/^[P]\d{4}$/"; //begin with 'P' and follow by 4 digits
        if (!preg_match($id_format, $id)) {
            if (strlen($id) != 5) { //validate the length before the format
                 $message .= "<p class=\"error\">The Position ID is 5 characters in length.</p>";
            }
            else {
                $message .= "<p class=\"error\">The Position ID must start with an uppercase letter 'P' followed by 4 digits.</p>";
            }
        }
    }

    //function to validate the Job Title
    function checkTitle($title) {
        global $message;
        $title_format = "/^[a-zA-Z0-9,.! ]*$/";
        if (!preg_match($title_format, $title)) {
            $message .= "<p class=\"error\">The title can only contain spaces, comma, period (full stop), and exclamation point. Other characters or symbols are not allowed.</p>";
        }
        if (strlen($title) > 20) {
            $message .= "<p class=\"error\">The title can only contain a maximum of 20 alphanumeric characters</p>";
        }
    }

    //function to validate the Description
    function checkDescription($desc) {
        global $message;
        if (strlen($desc) > 260) {
            $message .= "<p class=\"error\">The description can only contain a maximum of 260 characters.</p>";
        }
    }

    //function to validate the Closing Date
    function checkValidDate($date) {
        global $message;
        $date_format = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{2})$/'; //format (x)x/(y)y/zz
        $matches = array(); //optional part of the preg_match, all matched parts of 
                            //the date will be stored here
        if (!preg_match($date_format, $date, $matches)) { //check day&month has 1-2 digits, year has 2 digits
            $message .= "<p class=\"error\">This is not a valid date. You must follow the format DD/MM/YY</p>";
            return;
        }
        if (!checkdate($matches[2], $matches[1], $matches[3])) {  //check if the date exists
            $message .= "<p class=\"error\">This is not a valid date.</p>"; 
        }
    }

    //validate all input fields
    //If the input is OK => assign to the variables
    //If the input is WRONG => add the error to $message
    
    if (isset($_POST['submit'])) {
        if (isset($_POST['id']) && trim($_POST['id']) != "") {
                checkID($_POST['id']);
                $id = $_POST['id'];
        }
        else {
            $message .= "<p class=\"error\">Please enter the Position ID.</p>";
        }
            /////
        if (isset($_POST['title']) && trim($_POST['title']) != "") {
            checkTitle($_POST['title']);
            $title = $_POST['title'];
        }
        else {
            $message .= "<p class=\"error\">Please enter the Job Title.</p>";
        }
            ////
        if (isset($_POST['description']) && trim($_POST['description']) != "") {
            checkDescription($_POST['description']);
            $description = $_POST['description'];
        }
        else {
            $message .= "<p class=\"error\">Please enter the Job Description.</p>";
        }
            ////
        if (isset($_POST['closingdate']) && trim($_POST['closingdate']) != "") {
            checkValidDate($_POST['closingdate']);
            $closingdate = $_POST['closingdate'];
        }
        else {
            $message .= "<p class=\"error\">Please enter the Closing Date for this Job Application.</p>";
        }
           ////
        if (isset($_POST['position']) && trim($_POST['position']) != "") {
            $position = $_POST['position'];
        }
        else {
            $message .= "<p class=\"error\">Please select the Position for this Job.</p>";
        }
          ////
        if (isset($_POST['contract']) && trim($_POST['contract']) != "") {
            $contract = $_POST['contract'];
        }
        else {
            $message .= "<p class=\"error\">Please select type of Contract for this Job.</p>";
        }
         ////
        if (isset($_POST['application']) && is_array($_POST['application']) != "") {
            $application = $_POST['application'];
        }
        else {
            $message .= "<p class=\"error\">Please select type of Application for this Job.</p>";
        }
        ////
        if (isset($_POST['location']) && trim($_POST['location']) != "") {
            $location = $_POST['location'];
        }
        else {
            $message .= "<p class=\"error\">Please select the Location of this Job.</p>";
        }
    }      


// Working with Data and TXT file

    $folderDir = "../../data/jobposts";
    $fileDir = "../../data/jobposts/jobs.txt";

    //if the directory is found
    if (file_exists($fileDir)) {
        $content = file_get_contents($fileDir);
        $arrayOfLines = explode("\n", $content); //store all lines in an array
        
        //check duplicated Position ID
        foreach ($arrayOfLines as $line) { 
            $lineContent = explode("\t", $line); //split the content of 1 line
            for ($x = 0; $x < count($arrayOfLines)-1; $x++) {
              if ($lineContent[0] == $id && $id != "") { 
                    $message = "<p class=\"error\">Position ID is duplicated. Please change it.</p>".$message;
                    break;
                }  
            }  
            
        }
    }
    //if the directory is not found => create it
    else {
        if (!is_dir($folderDir)) { 
            umask(0007);
            mkdir($folderDir, 02770);
        }
    }

//Save Data to txt file
    if ($message == ""){    //if there is no ERROR
        $jobPostContent = $id."\t".$title."\t".$description."\t".$closingdate."\t".$position."\t".$contract."\t";

        //concatenate all selected Application types
        foreach ($application as $checkbox) {
            $jobPostContent .= $checkbox."\t";
        }

        $jobPostContent .= $location."\t\r\n";

        //write data to the .txt file
        file_put_contents($fileDir, $jobPostContent, FILE_APPEND);
   
?>        

        <!-- After writing to the file, display a message to user -->
        <p class="heading">CONGRATULATIONS</p>
        <img src="style/star.png" id="star" alt="star">"
        <div class="successMessage">"
            <p id="successText">Thank you. <br> Your Job Recruitment has been posted to our system.</p>
        </div>
        
        <!-- Bottom Link -->
        <div class="bottomLink">";
            <a href="index.php">Back to Home</a>"
        </div>"
    
<?php
    }
    else {  //If there are some errors
        
?>
        <div class="errorMessage">
            <p id="errorText">ERROR!!! <br>
                <i>There are some problems with your Job Post. Please return and do it again.</i></p>
            <p><?php echo $message; ?></p>
        </div>
    
    <!-- Bottom Link -->
    <div class="bottomLink">
        <a href="index.php">Back to Home</a>
        <a href="postjobform.php">Return to Post Job Form</a>
    </div>
    
<?php } ?>
    

</body>
</html>


