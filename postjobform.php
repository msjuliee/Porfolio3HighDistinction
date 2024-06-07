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
 <title>Assignment 1 Post Job Form</title>
</head>
<body>
    
    <style>
        <?php include 'style.css'; ?>
    </style>
    <!-- .js file to create a pop-up for input rules -->
    <script type="text/javascript" src="popup.js"></script> 
    
    
    <!-- Header & Navigation Bar -->
    <?php include 'header.php'; ?>
    
    <!-- Post Job Form -->
    <h1 class="heading">LET YOUR EMPLOYEES KNOW YOU'RE FINDING THEM!</h1>
    
    <!-- The form begins here -->
    <div class="jobForm"> <!-- 2 parts: the input fields and 1 image on the right -->
        
        <div class="jobInfo">  <!-- the form -->
            <p>Who do you wanna recruit?<br><i>(all fields are required*)</i></p>
            <form action ="postjobprocess.php" method = "post" >
                <label>Position ID </label> <br>
                <input type="text" name="id" class="postform_input">
                <br/>
                
                <label>Title</label> <br>
                <input type="text" name="title" class="postform_input">
                <br/>
                
                <label>Description </label> <br>
                <textarea id="description" name="description" rows="4" cols="40" class="postform_input"></textarea>
                <br/>
                
                <label>Closing Date </label>
                <input type="text" name="closingdate" class="date_input" placeholder=<?php echo date("d/m/y"); ?>>
                <br/>
                
                <label>Position</label>
                <input type="radio" id="fulltime" name="position" value="Full Time">
                <label for="fulltime">Full Time</label>
                <input type="radio" id="partime" name="position" value="Part Time">
                <label for="parttime">Part Time</label><br>
                <br/>

                <label>Contract</label>
                <input type="radio" id="ongoing" name="contract" value="Ongoing">
                <label for="ongoing">On-going</label>
                <input type="radio" id="fixed" name="contract" value="Fixed Term">
                <label for="fixed">Fixed Term</label><br>
                <br/>

                <label>Application by</label>
                <input type="checkbox" id="post" name="application[]" value="Post">
                <label for="post">Post</label>
                <input type="checkbox" id="mail" name="application[]" value="Mail">
                <label for="mail">Mail</label><br>
                <br/>

                <label for="location">Location</label>
                <select name="location" id="location" class="postSelect_input">
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
                <br/>

                <div class="formButton">
                    <input type="submit" name="submit" value="Post" id="submitButton">
                    <input type="reset" id="resetButton">
                    <a href="#" id="rulesButton">See Rules</a>
                    
                </div>
            </form>
        </div>
        <img src="style/form1.jpg" id="postPhoto" alt="postPhoto"> <!-- image on the right -->
    </div>
    
    <!-- pop-up content -->
    <div id="rulesWindow" class="window">
					<p><b>All inputs must satisfy the following rules:</b></p>
					<ul>
					<li><b>Position ID:</b> Unique. The code is 5 characters in length. It must start with an uppercase letter “P” followed by 4 digits. (P0001)</li>
					<li><b>Title:</b> Maximum of 20 alphanumeric characters. ! , . and spaces are OK. Other characters or symbols are not allowed.</li>
					<li><b>Description: </b>maximum of 260 characters.</li>
                    <li><b>Closing Date: </b>in dd/mm/yy format</li>
                    <li>All fields are <b>REQUIRED</b></li>
					</ul>
					<a href="#" id="rulesCloseButton" class="button">Close</a>
    </div>

    <!-- Bottom Link -->
    <div class="bottomLink">
        <a href="index.php">Back to Home</a>
    </div>
    
    <!--Footer-->
    <?php include 'footer.php'; ?>
    
</body>
</html>