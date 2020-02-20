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
              
<!----------------------------------------------------------------------------------->
    <div class = "loginbox"> 
<?php
//Connecting to MongoDB
$mongoClient = new MongoClient('localhost');           //localhost 27017

//connecting to database
$db = $mongoClient -> ecommerce;

//access collections
$collection = $db -> customers;

    //function to display the document to html

    // stores the user's input in a varaible
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);

    //takes the variable of user's input and puts it in a field
    $showCustomer = ["email" =>  $email];

    //finds the 'password' field in the 'customers' collections 
    $cursor = $collection->find($showCustomer);

    //redirects to display page
    


    //Output the result        
    echo "<h1>Customer Details</h1>";
    foreach($cursor as $cust){
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
        echo "<a href = 'index.php'>Home Page </a>";
        
       
       
    }
    //header ('Location: Display.html');

//closes the the connection of MongoDB
$mongoClient -> close();
?>
         </div>  
<!----------------------------------------------------------------------------------->
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
    </body>
</html>              