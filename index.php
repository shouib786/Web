<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
      <link href = "css_grid.css" rel ="stylesheet" type="text/css">
        <link href = "style.css" rel = "stylesheet" type="text/css">
            <title> Home </title>   
    </head>

    
    <body>

        <div class= container>
            <!--------------------------------------Header--------------------------------------->
              <header>          
                <div class = logo> 
                        <a href= "Index2.html"> 
                        <img src="Images/A..PNG"  
                            style ="width:250px;
                                    height:250px;">
                        </a>
                        </div>
              </header> 
           
                <!--The navigation bar-->
                <nav>
                    <ul>
                        <li><a class = "current" href  = "index.php"> Home</a></li>
                                <li><a href="browse.php"> Browse</a></li>
                                <li><a href="order_history.php">Order History</a></li>
                    </ul> 
                </nav>


                <!--"Basket" and "Sign in/Log in" box on the rigt of header-->
                <div class = nested>
                 <a href="Basket.html">
                     <div class = basket>
                    <img src = "Images/shopping-cart.PNG">
                    </a>
                </div>

            
                <?php if (isset($_SESSION['loggedInUserEmail'])) : ?>
            
                    <div class="sign">
                        <form action="Display.php" method="get">
                        <input type="Submit" name="email" value="<?php echo $_SESSION['loggedInUserEmail']; ?>">
                        
                        <a href= "logout.php">Logout</a>
                        
                        <input type="hidden" name="email" value="<?php echo $_SESSION['loggedInUserEmail']; ?>">
                    </div>
                    
                <?php else : ?>
            
            
                    <div class = sign>
                        <a href  = "login.html">Login</a>
                        <a href  = "registration.html">Sign up</a>
                    </div>
                <?php endif; ?>
            </div>
                
            <!------------------------------------------------------------------------------------->



            <!------------------------------------Articles----------------------------------------->

            <article>
               <h1 id="welcome">WELCOME TO </h1><h1 id="A">A.</h1>
               <p>Shop For the best merchandise and clothing</p>
            </article>



            <div class = cookie>
            <p>This is where the reccomendation part is going to be. It can say "Please sign in" and once sign in, it will show the page ect.<br>
            Btw please feel free to tell me or make any changes with the pages. (the black background is on css_grid.html)</p>
            </div>

            <!------------------------------------------------------------------------------------>

            <!---------------------------------footer--------------------------------------------->
                <footer>
                     <p id = contacts>Contacts <br>
                        07712345678 <br>
                        adot@simple.co.uk<br></p>
                    <p id = T&C>
                        Terms and Condtion
                    </p>    
                    <p id = Policy>
                        Cookie Policy
                    </p>
                    
                    Copyright &copy; 2018 Amerson Ferrer   
                </footer> 
            <!----------------------------------------------------------------------------------->       
        </div>
                
    </body>
    
</html>