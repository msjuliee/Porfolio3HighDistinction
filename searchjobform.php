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
 <title>Assignment 1 Search Job Form</title>
</head>
<body>
    
    <style>
        <?php include 'style.css'; ?>
    </style>
    
    <!-- Header & Navigation Bar -->
    <?php include 'header.php'; ?>
    

    
    <!-- Search Job Form -->
    <h1 class="heading">FIND YOUR DREAM JOB NOW!</h1>
    
    <!-- The form begins here -->
    <div class="jobForm"> <!-- 2 parts: the input fields and 1 image on the right -->
        <div class="jobInfo">
            
        <form action ="searchjobprocess.php" method = "get" >  <!-- the form -->
            <h3>What is your ideal job?</h3>
            
            <div class="inputBox">
                <label>Job Title </label>
                <input type="text" name="title" class="form_input">
            </div>
            <br/>

            <div class="checkBox">
                <label>Position</label>
                <input type="radio" id="fulltime" class="checkBox_item" name="position" value="Full Time">
                <label for="fulltime">Full Time</label>
                <input type="radio" id="partime" class="checkBox_item" name="position" value="Part Time">
                <label for="parttime">Part Time</label><br>
            </div>
            <br/>

            <div class="checkBox">
                <label>Contract</label>
                <input type="radio" id="ongoing" class="checkBox_item" name="contract" value="Ongoing">
                <label for="ongoing">On-going</label>
                <input type="radio" id="fixed" class="checkBox_item" name="contract" value="Fixed Term">
                <label for="fixed">Fixed Term</label><br>
            </div>
            <br/>

            <div class="checkBox">
                <label>Application by</label>
                <input type="checkbox" id="post" class="checkBox_item" name="application[]" value="Post">
                <label for="post">Post</label>
                <input type="checkbox" id="mail" class="checkBox_item" name="application[]" value="Mail">
                <label for="mail">Mail</label><br>
            </div>
            <br/>

            <div class="inputBox">
                <label for="location">Location</label>
                <select name="location" id="location" class="searchSelect_input">
                    <option disabled selected>---</option>
                    <option value="ACT">ACT</option>
                    <option value="NSW">NSW</option>
                    <option value="NT">NT</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="VIC">VIC</option>
                    <option value="WA">WA</option>
                </select>
            </div>
            <br/>

            <div class="formButton">
                <input type="submit" name="submit" value="Search" id="submitButton">
                <input type="reset" id="resetButton">
            </div>
        </form>
        </div>
        <img src="style/form2.jpg" id="searchPhoto" alt="searchPhoto"> <!-- image on the right -->
    </div>
    
    <!-- Bottom Link -->
    <div class="bottomLink">
        <a href="index.php">Back to Home</a>
    </div>
    
    <!--Footer-->
    <?php include 'footer.php'; ?>

</body>
</html>