<?php
    //this function determines which page is Active
    function active($current_page) {
      $url_array =  explode('/', $_SERVER['REQUEST_URI']);
      $url = end($url_array);  
      if($current_page == $url) {
          echo 'active'; //class name in css 
      } 
    }
?>

<!-- Header for all pages -->
<header>
        <img src="style/logo.png" class="logo" alt="logo">
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a class="<?php active('index.php');?>" href="index.php">HOME</a></li>
                <li><a class="<?php active('about.php');?>" href="about.php" class="active">ABOUT ME</a></li>
                <li><a class="<?php active('postjobform.php'); ?>" href="postjobform.php">POST A JOB</a></li>
                <li><a class="<?php active('searchjobform.php'); ?>" href="searchjobform.php">FIND A JOB</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
</header>

<script>
    //this js file actives the responsive menu
    <?php include 'menu.js'; ?>
</script>