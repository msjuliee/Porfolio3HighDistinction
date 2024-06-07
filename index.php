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
 <title>Assignment 1 Home</title>
</head>
<body>

    <style>
        <?php include 'style.css'; ?>
    </style>
    
    <!-- Header & Navigation Bar -->
    <?php include 'header.php'; ?>
    
    <!-- Body: Index - My Information -->
    <h1 class="heading">DEPLOYMENT PORFOLIO 3 - HIGH DISTINCTION (edited from Visual Studio)</h1>
    
    <div class="myinfo">
        <div class="textinfo">
            <h2>Task 3.3HD: Deploy PHP Web App to Cloud via Azure</h2>

            <p><b>Name :</b> Nguyen Linh Dan</p>
            <p><b>Student ID :</b> 103488557</p>
            <p><b>Email:</b> <a id="email">103488557@student.swin.edu.au</a></p>
            <p>I declare that this assignment is my individual work. I have not worked collaboratively nor have I copied from any other student’s work or from any other source.</p>
            
            <div id="aboutLinkOuter">   
                <a href="about.php" id="aboutLink">About this assignment</a>
            </div>
        </div>
        <img src="style/info.png" class="info" alt="info">
    </div>
    
    <!-- Bottom Link -->
    <div class="bottomLink">
        <a href="postjobform.php">Post a job vacancy</a>
        <a href="searchjobform.php">Search for a job vacancy</a>
    </div>
    
</body>
</html>