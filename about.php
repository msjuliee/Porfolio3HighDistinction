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
 <title>Assignment 1 About Me</title>
</head>
<body>

    <style>
        <?php include 'style.css'; ?>
    </style>
    
    <!-- Header & Navigation Bar -->
    <?php include 'header.php'; ?>

    
    
    <!-- Body: About Me Page-->
    
    <!-- Part 1: About Me -->
    <h1 class="heading">ABOUT ME</h1>
    <div class="aboutmeBox">
        <div class="aboutmeInfo">
            <p><b>Name :</b> Nguyen Linh Dan</p>
            <p><b>Student ID :</b> 103488557</p>
            <p><b>Email:</b> <a id="email">103488557@student.swin.edu.au</a></p>
        </div>
        <img src="style/info.png" alt="info" class="info2">
    </div>
    
    <br><br>
    
    <!-- The star icon -->
    <img src="style/star.png" id="star" alt="star">
    
    <!-- Part 2: About this assignment -->
    <h1 class="heading">ABOUT THIS ASSIGNMENT</h1>
    <h2 class="heading2">Questions</h2>
    
    <div class="questionSection"> <!-- 3 questions, each question has its box -->
        <div class="question">
            <p><b>Q1: What is the PHP version installed in Mercury?
            <br>Answer<br></b>
            The PHP Version installed in Mercury is <?php echo phpversion(); ?>
                <br><b>How can I know?</b><br>
                I used the phpversion() function. See my screenshot for more information.
            </p>
            <img src="style/answer1.png" id="answerScr" alt="Answer 1">
        </div>
        
        <div class="question">
            <p><b>Q2: What tasks you have not attempted or not completed?<br>Answer<br></b>
            I finished all tasks specified in the instructions of Assignment 1 (all requirements mentioned in the PDF documents of Assignment 1 are done!</p>
        </div>
        
        <div class="question">
            <p><b>Q3: What special features have you done?<br>Answer<br></b>
            The special features I added to this assignment include: </p>
            <ul>
                <li>Counting remaining time to apply to a job</li>
                <li>Display the rules for inputs in Post A Job Page</li>
                <li>Friendly User Interface</li>
            </ul>
        </div>
    </div>
    
    <br><br>
    
    <!-- Part 3: Discussion board -->
    <h2 class="heading2">Discussion Board</h2>
    <div class="discussionBoard">
        <p><b>What discussion points did you participated on in the unit’s discussion board for Assignment 1? If you did not participate, state your reason.</b> <br>
        I did not participate in any Discussion section of Assignment 1. <br>
        <b>Reason</b><br>
        I did not see any Discussion board on Canvas. I think our lecturer forgot to open it for us.<br>However, I answered some questions of my lecturer about the <b>addslashes()</b> function.</p>
    </div>
    
    <br><br>
    
    <!-- Part 3: Assignment Details (bonus) -->
    <h2 class="heading2">Assignment Details</h2>
    <div class="assignmentDetails">
        <div class="detailText">
            <h3>Assignment 1: Job Posting System</h3>
            <ul>
                <li>Aim of this assignment: <div class="smallText">Create a job posting system. This system will allow users to enter details about a job vacancy, and saved into a text file. These postings can also be searched using various criteria and all matched postings will be displayed on a web browser.</div></li>
                <li>Total time to finish: <div class="smallText">2 days</div></li>
                <li>Difficulty rating: <div class="smallText">Medium</div></li>
                <li>Languages used</li>
            </ul>
            <div class="languageList">
                <button id="language1">PHP</button>
                <button id="language2">HTML</button>
                <button id="language3">CSS</button>
                <button id="language4">JavaScript</button>
            </div>
        </div>
        <img src="style/detail1.png" alt="detail" class="detail">
    </div>
    
    <br>
    
    <!-- Bottom Link -->
    <div class="bottomLink">
        <a href="index.php">Back to Home</a>
    </div>
    
    <br><br>
    
    <!--Footer-->
    <?php include 'footer.php'; ?>
    
</body>
</html>