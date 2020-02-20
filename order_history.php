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
                                <li><a class = "current" href="order_history.php">Order History</a></li>
                            </ul> 
                        </nav>
        
        
                       
                        
                     <!---------------------------------------------------------------------------->

                     <div class = "loginbox">
<?php
//Connecting to MongoDB
$mongoClient = new MongoClient('localhost');           //localhost 27017

//connecting to database
$db = $mongoClient -> ecommerce;

//access collections
$collection = $db -> orderhistory;

    //function to display the document to html

    // stores the user's input in a varaible
    $order = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);

    //takes the variable of user's input and puts it in a field
    $showOrder = ["email" =>  $_SESSION['loggedInUserEmail']];

    //finds the 'password' field in the 'customers' collections 
    $cursor = $collection->find($showOrder);

    //redirects to display page


    //Output the result        
    echo "<h1>Order History</h1>";
    foreach($cursor as $history){
        echo "<p>";
        echo "ID: " . $history['_id'];
        echo "<br>";
        echo "Address: " . $history['shipping_address'];
        echo "<br>";
        echo "Date: " . $history['date']; 
        echo "<br>";
        echo "Time: " . $history['time']; 
        echo "<br>";
        echo "Price " . $history['cost'];
        echo "</p>";
    }

//closes the the connection of MongoDB
$mongoClient -> close();
?>

                        
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