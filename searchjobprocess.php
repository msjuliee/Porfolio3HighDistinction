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
 <title>Assignment 1 Search Job Process</title>
</head>
<body>

    <style>
        <?php include 'style.css'; ?>
    </style>
    
    <!-- Header & Navigation Bar -->
    <?php include 'header.php'; ?>
    
    <h1 class="heading">YOUR JOBS RECOMMENDATIONS</h1>

<?php

    $title = "";
    $position = "";
    $contract = "";
    $application = "";
    $location = "";
    $message = "";
    
    //validate all input fields
    //If the input is OK => assign to the variables
    //If there is no entered string for TITLE => display the error
    //other fields are optional
    
    if (isset($_GET['submit'])) {
        if (isset($_GET['title']) && trim($_GET['title']) != "") {
            $title = trim($_GET['title']);
        }
        else {
            echo "<p class=\"errorSearch\">Oops! Please enter the Job Title.</p>";
        }
        ////
        if (isset($_GET['position']) && trim($_GET['position']) != "") {
                $position = $_GET['position'];
        }
        ////
        if (isset($_GET['contract']) && trim($_GET['contract']) != "") {
                $contract = $_GET['contract'];
        }
        ////
        if (isset($_GET['application']) ) {
                $application = $_GET['application'];
        }
        ////
        if (isset($_GET['location']) && trim($_GET['location']) != "") {
                $location = $_GET['location'];
        }
    }
    
    
    $folderDir = "../../data/jobposts";
    $fileDir = "../../data/jobposts/jobs.txt";
    $hasResult = false;
    $numOfResult = 0; 
    $allResult = []; //all search result stored here
    
    if (file_exists($fileDir) && isset($_GET['title']) && trim($_GET['title']) != "") {
        $content = file_get_contents($fileDir);
        $arrayOfLines = explode("\n", $content); //store all lines in an array
        array_pop($arrayOfLines);
        rsort($arrayOfLines);
        
        foreach ($arrayOfLines as $line) { 
            $lineContent = explode("\t", $line);

            //check each jobs in the txt file to find the requested job
            if (strpos(strtolower($lineContent[1]), strtolower($title)) !== false) {
                $current = date("y/m/d");   //today

                //change #lineContent[3] to date
                $dateArray = explode("/", $lineContent[3]);
                $toDate = implode("-", array($dateArray[2], $dateArray[1], $dateArray[0]));
                $closingDate = date("y/m/d", strtotime($toDate));

                //If the job post is not expired => continue checking the conditions
                if ($closingDate >= $current) {   
                    //if the entered Title does not match to the Title of the checking job => Pass it
                    if ($position != "" && $position != $lineContent[4]) {
                        continue;
                    }

                    //if the selected Contract does not match to the Contract of the checking job => Pass it
                    if ($contract != "" && $contract != $lineContent[5]) {
                        continue;
                    }

                    //if 1 Application Type is selected and it does not match to the Type of the checking job => Pass it
                    if (count($lineContent) == 9 && $application != "") {
                        if (count($application) == 1) {
                            if ($application[0] != $lineContent[6]) {
                                continue;
                            }
                         }
                    }
                    
                    //if the selected Location does not match to the Location of the checking job => Pass it 
                    //Case: 1 Application type selected
                    if (count($lineContent) == 9 && $location != "" && $lineContent[7] != $location) {
                        continue;
                    }

                    //Case: 2 Application type selected 
                    if (count($lineContent) == 10 && $location != "" && $lineContent[8] != $location) {
                        continue;
                    }
                    
                    //if the checking job satisfied all condition => add it to $allResult[]
                    $hasResult = true;
                    $numOfResult++;

                    array_push($allResult, $lineContent);
                }
            }
        }

        //sort the $allResult[] by Closing Date
        for ($outer = 0; $outer < count($allResult); $outer++) {
            for ($inner = 0; $inner < count($allResult); $inner++) {
                
                $dateArray = explode("/", $allResult[$outer][3]);
                $toDate = implode("-", array($dateArray[2], $dateArray[1], $dateArray[0]));
                $date1 = date("y/m/d", strtotime($toDate));


                $dateArray = explode("/", $allResult[$inner][3]);
                $toDate = implode("-", array($dateArray[2], $dateArray[1], $dateArray[0]));
                $date2 = date("y/m/d", strtotime($toDate));

               if ($date1 > $date2) {
                    $tmp = $allResult[$outer];
                    $allResult[$outer] = $allResult[$inner];
                    $allResult[$inner] = $tmp;
               }
            }
        }

        
    foreach ($allResult as $result) {
?>
    
    <!--Display All Search Result -->
    
        <div class="jobInfoBox">
            <div class="col1">
                <h2>Job Title <br> <?php echo $result[1] ."<br>"; ?></h2>
            </div>
            <div class="col2">
                <p>Description: <?php echo $result[2] ."<br>"; ?></p>
                <p>Closing Date: 
                <?php 
                    $dateArray = explode("/", $result[3]);
                    $closingDate = implode("-", array($dateArray[2], $dateArray[1], $dateArray[0]));
                    $date = date("d/m/Y", strtotime($closingDate));
                    echo $date ."<br>"; 
                ?></p>
                <p id="countingRemainingDay">
                    <?php
                        $today = date("d/m/y");
                        $dateArray = explode("/", $today);
                        $today = implode("-", array($dateArray[2], $dateArray[1], $dateArray[0]));

                        $closing = date_create($closingDate);
                        $today = date_create($today);

                        $diff = date_diff($closing, $today);
                        $days = $diff->format("%a");
                        echo "$days days left to apply!";
                    ?>
                </p>

            </div>
            <div class="col3">
                <p>Position: <?php echo $result[4] . " and ".$result[5]. "<br>"; ?></p>
                <p>
                    Application By:
                    <?php 
                            if (count($result) == 9) {
                                echo $result[6] ."<br>";
                            }
                            if (count($result) == 10) {
                                echo $result[6]." and " .$result[7] ."<br>";
                            }
                    ?>
                </p>
                <p>
                    Location:
                    <?php
                            if (count($result) == 9) {
                                echo $result[7] ."<br>";
                            }
                            if (count($result) == 10) {
                                echo $result[8] ."<br>";
                            }
                    ?>
                </p>
            </div>
        </div>
        <br>
<?php
    }

    //if no result is found => display the error    
    if ($numOfResult == 0) {
        echo "<p class=\"errorSearch\">Sorry! We cannot found any job suitable to your criteria :(</p>";
    }
    }
    else {  //if jobs.txt does not exist => display the error 
        if (isset($_GET['title']) && trim($_GET['title']) != "") {
            echo "<p class=\"errorSearch\">The TXT file to store Job Posts is not found!</p>";
        }
    }

?>

    <!-- Bottom Link -->
    <div class="bottomLink">
        <a href="index.php">Back to Home</a>
        <a href="searchjobform.php">Find Another Job</a>
    </div>
    <br>
    

</body>
</html>


