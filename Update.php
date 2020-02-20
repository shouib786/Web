<?php
//Connecting to MongoDB
$mongoClient = new MongoClient('localhost');           //localhost 27017

//connecting to database
$db = $mongoClient -> ecommerce;

//access collections
$collection = $db -> customers;

    //function to update the document to html

    // stores the user's input in a varaible
    $oldPassword = filter_input(INPUT_GET, 'oldPassword', FILTER_SANITIZE_STRING);
    $newPassword = filter_input(INPUT_GET, 'newPassword', FILTER_SANITIZE_STRING);
 
    //serach variable and new variable
    $search = ["password" =>  $oldPassword ];
    $newPass = [ '$set' => [ "password" => $newPassword]];

    //finds the 'password' field in the 'customers' collections 
    $cursorOne = $collection->update( $search, $newPass, $newE);
    $cursorTwo = $collection->find(["password" => $newPassword]);
    
    //header ('Location: Display.php');
    //Output the result        
    /*echo "<!DOCTYPE html>
    <html>
        <head>
            <link href='css_grid.css' rel ='stylesheet' type='text/css'>        
            <link href = 'style.css' rel = 'stylesheet' type='text/css'>
            <title>Log in</title>
        </head>
    
        <body>
            
                <div class= container>
                        <!--------------------------------------Header------------------------------>
                          <header>          
                            <div class = logo> 
                                    <a href= 'index.php'> 
                                    <img src='Images/A..PNG'  
                                        style ='width:250px;
                                                height:250px;'>
                                    </a>
                                    </div>
                          </header> 
                       
                            <!--The navigation bar-->
                            <nav>
                                <ul>
                                    <li><a href  = 'Index2.html'> Home</a></li>
                                    <li><a href='Browse.html'> Browse</a></li>
                                </ul> 
                            </nav>
            
            
                            <!--'Basket' and 'Sign in/Log in' box on the rigt of header-->
                            <div class = nested>
                            <div class = basket>
                                <a href  = 'Basket.html'> 
                                <img src = 'Images/shopping-cart.PNG'></a>
                            </div>
            
                            <div class = sign>
                                    <a href  = 'login.html'>Login</a>
                                    <a href  = 'registration.html'>Sign up</a>
                            </div>
                            </div>
                            
                         <!---------------------------------------------------------------------------->";*/
                         echo "<h1>Customer Details</h1>";
                         foreach($cursorTwo as $cust){
                             echo "<p>";
                             echo "First name: " . $cust['name'];
                             echo "<br>";
                             echo "Last name: " . $cust['surname'];
                             echo "<br>";
                             echo "Password: " . $cust['password']; 
                             echo "<br>";
                             echo "Email: " . $cust['email'];
                             echo "<br>";
                             echo "Address: " . $cust['address'];
                             echo "<br>";
                             echo "Postcode: " . $cust['potal'];
                             echo "</p>";
                             
                             echo "<a href= Update.html> Change Password</a>";
                             echo "<br>";
                             echo "<a href = index.php>Home Page </a>";
    }

    /*echo "<!----------------------------------------------------------------------------------------->
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
    
    </html>";*/
    
    

//closes the the connection of MongoDB
$mongoClient -> close();
?>