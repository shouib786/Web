<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <link href="css_grid.css" rel ="stylesheet" type="text/css">        
        <link href = "style.css" rel = "stylesheet" type="text/css">
        <title>Display</title>
    </head>

    <body>
        
            <div class= container>
                    <!--------------------------------------Header------------------------------>
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
                                <li><a href  = "index.php"> Home</a></li>
                                <li><a href="browse.php"> Browse</a></li>
                                <li><a class = "current" href="web_display.php">Display</a></li>
                                <li><a href="order_history.php">Order History</a></li>
                            </ul> 
                        </nav>
        
        
                        <!--"Basket" and "Sign in/Log in" box on the rigt of header-->
                        <div class = nested>
                        <div class = basket>
                            <a href  = "Basket.html"> 
                            <img src = "Images/shopping-cart.PNG"></a>
                        </div>
                            <?php if (isset($_SESSION['loggedInUserEmail'])) : ?>
            
                    <div class="sign">
                        <?php echo $_SESSION['loggedInUserEmail']; ?>
                        
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
                        
                     <!---------------------------------------------------------------------------->

                     <div class = "loginbox">
                            <form action="Display.php" method="get">

                                
                                Email: <input type="email" name="email" required>
                                <input type="submit">


                            </form>

                        
                        </div>                     

                     <!----------------------------------------------------------------------------------------->
<footer>
        <p id = contacts>Contacts <br>
           07411602902 <br>
           shouib.a786@gmail.com<br></p>
       <p id = T&C>
           Terms and Condtion
       </p>    
       <p id = Policy>
           Cookie Policy
       </p>
       
       Copyright &copy; 2019 Shouib Ahmadi
      
   </footer>     
    
</div>

    </body>

</html>