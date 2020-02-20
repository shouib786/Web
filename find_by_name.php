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
$mongoClient = new MongoClient();           //localhost 27017

//connecting to database
$db = $mongoClient -> ecommerce;

//access collections
$collection = $db -> products;

    //function to display the document to html

    // stores the user's input in a varaible
    $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

    //takes the variable of user's input and puts it in a field
    $showProduct = ["name" =>  $name];

    //finds the 'password' field in the 'customers' collections 
    $cursor = $collection->find($showProduct);

    //redirects to display page


    //Output the result        
    echo "<h1>Recommendation</h1>";
    foreach($cursor as $product){
        echo "<p>";
        echo '<img src="images/'.$product["image_url"].'" width="100" height="100">';
        echo "<br>";
        echo "Name: " . $product['name'];
        echo "<br>";
        echo "Type: " . $product['type'];
        echo "<br>";
        echo "Description: " . $product['description']; 
        echo "<br>";
        echo "Price " . $product['price'];
        echo "</p>";
    }

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