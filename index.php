<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We are with you</title>

   

    <!-- font awesome cdn link  -->
    

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <!-- header section starts  -->

    <header>
        <!-- for menu button  when screen size becomes smaller -->
        <div id="menu-bar" class="fas fa-bars"></div>  

        <!-- for nav bar -->
        <nav class="navbar">
            <a href="#home">home </a>
            <a href="#category">Packages</a>
            <a href="#aboutus">About Us</a>
        </nav>
        <!-- for admin button -->
        <div class="icons">
            <i><a href="http://localhost/smart travel/userCheck.php"><b class="logo" id="bookhistory-btn"><t>MY BOOK HISTORY</t></b></a></i>
            <i><b class="logo" id="login-btn"><t>ADMIN</t></b></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>
        <!-- for search bar which is hidden until search button is click -->
        <form action="http://localhost/smart travel/categories/fetch.php" class="search-bar-container" method="POST">
            <input type="search" name ="Destination"  id="search-bar"  placeholder="search here..."><br>
     
            <input type="submit" name="qsearch" value="search">
        </form>

    </header>

    <!-- header section ends -->

    <!-- login form container  which is hidden until we click admin button-->

    <div class="login-form-container">
        <!-- for "x" logo to close form -->
        <i class="fas fa-times" id="form-close"></i>
        
        <form action="http://localhost/smart travel/employeeCheck.php" method="POST">
            <h3>Hlo admin</h3>
            <input type="email" name="Email" class="box" placeholder="enter your email">
            <input type="password" name="pass" class="box" placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="btn">
        
        </form>

    </div>
    <div class="bookhistory">
     
        


    </div>
    <!-- for background video -->
    <div class="back-vid">
        <video src="images/vid-3rd.mp4" id="video-slider" loop autoplay muted></video>
            
    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>SMART TRAVEL</h3>
            
            <div class="icons" >
                <i class="fas fa-search"  id="search-btn"></i>
            </div>
        </div>
        

    </section>

    <!-- for section partitioning line -->
    <div style="width:100%;height:2px;background-color:antiquewhite;"></div>

  

   
  
    <!-- category section starts  -->

    <section class="category" id="category">

        <h1 class="heading">
            <span>P</span>
            <span>A</span>
            <span>C</span>
            <span>K</span>
            <span>A</span>
            <span>G</span>
            <span>E</span>
            <span>S</span>

        </h1>
        <form action="http://localhost/smart travel/package/fetch.php\"  method="POST" enctype="multipart/form-data" method="post">
        <div class="box-container">



        <?php
            // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');
           
            

            $query ="select * from package_tbl ";
            $run = mysqli_query($conn,$query);
            if (mysqli_num_rows($run) > 0){
        
                while($row = mysqli_fetch_array($run)) {

                    $package_id=$row["package_id"];
                    $query2 = "select *from  review_tbl where package_id=\"".$package_id."\"";
                    $run2 = mysqli_query($conn,$query2);
                    $row2 = mysqli_fetch_array($run2);
                    $query3 = "select AVG(rating)from  review_tbl where package_id=\"".$package_id."\"";
                    $run3 = mysqli_query($conn,$query3);
                    $row3 = mysqli_fetch_array($run3);
                    echo" 
                
                        

                            <div class=\"box\">
                            <img src=\"package/uploads/$row[Logo_name]\"   frameborder='0' alt=\"Unable to see photo\">
                                <div class=\"content\">
                                   
                                    <h2 style=\"color:white;\">".$row["title"]."<br>
                                    <i class=\"fa fa-tag\" aria-hidden=\"true\">".$row['price']."</i><br></h2>
                                    <h2 style=\"color:white;\"> (".mysqli_num_rows($run2).")rating :  ".$row3[0]."</h2>
                                    

                                    <button type=\"submit\" name=\"destination\" class=\"btn\" formaction=\"http://localhost/smart travel/package/fetch.php\"><input type=\"radio\" name=\"packageId\" value=\"".$package_id."\"  >see more</button>
                                </div>
                            </div>
                        

                            

                      
                        ";
                                    }
                        echo"</form>";
                                   
                    }
                   

            mysqli_close($conn);
        ?>






        </div>

    </form>
    </section>

    <div style="width:100%;height:2px;background-color:antiquewhite;"></div>

    <!-- footer section  -->

    <section class="footer" id="aboutus">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p><i>Just a random website suggesting you destinations and travel agents</i></p>
            </div>
            
            <div class="box">
                <h3>quick links</h3>
                <i>
                <a href="#">home</a>
                <a href="#services">services</a>
                <a href="#category">packages</a>
               
            </div>
            <div class="box" >
                <h3>follow us</h3>
            
            <a href="">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
                <a href="">linkedin</a>
            
            </div>

        </div>

        <!-- <h1 class="credit"> @<span> US</span> | all rights reserved! 2022 </h1> -->

    </section> 
    </div>


    <!-- custom js file link  -->
    <script src="script.js"></script>

</body> 
</html>