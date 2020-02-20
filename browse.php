<?php
session_start();
?>
<!DOCTYPE html>
<html>
    
<script src="sort_search_scripts\js\sort_search.js"></script>
    <script src="basket.js"></script>

    <head>
    <?php
        //Connect to MongoDB
        $mongoClient = new MongoClient();
        //Select a database
        $db = $mongoClient->ecommerce;
        //Display all products sorted by price
        $products = $db->products->find();
    ?>
    <link href = "css_grid.css" rel ="stylesheet" type="text/css">
    <link href = "style.css" rel = "stylesheet" type="text/css">
    
            <title> Browse </title>   
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
                                <li><a class = "current" href="browse.php"> Browse</a></li>
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
                        
                     <!---------------------------------------------------------------------------->
                     
                     
                     
                    

                    <div class = "searches">
                    <button type="button" value="-1" onclick="sortByPrice(this.value)">Sort by price High/Low</button><br>
                    <button type="button" value="1" onclick="sortByPrice(this.value)">Sort by price Low/High</button><br>
                    <button type="button" value="1" onclick="sortByName(this.value)">Sort by name A/Z</button><br>
                    <button type="button" value="-1" onclick="sortByName(this.value)">Sort by name Z/A</button><br>
                    <button type="button" value="1" onclick="sortByType(this.value)">Sort by type A/Z</button><br>
                    <button type="button" value="-1" onclick="sortByType(this.value)">Sort by type Z/A</button><br><br>
                    
                    <p>--------------<p>
                     

                    <form >
                        Find by Name: <input placeholder="Nazgul" id="SearchInput" type="text" onkeyup="findByName(this.value)" > 
                            <button onclick="search()">Save for later</button> <br>
	                    Find by Type: <input placeholder="sword" type="text" onkeyup="findByType(this.value)"><br>
	                    Find by Description (indexed search. search keyword requires to match only one word in description): <input placeholder="Bear" type="text" onkeyup="findByDescription(this.value)">
                    </form>
                        
                    <form method="get" action="find_by_name.php">
                        <script src="recommender.js"></script>
                        <h2>Recommendations</h2>
                        <div id="RecomendationDiv"></div>
                        <input type="hidden" id="RecomendationInput" name="name" value>
                        <input type="submit">
                    </form>
                    <script>
                        //Create recommender object - it loads its state from local storage
                        var recommender = new Recommender();
            
                        //Display recommendation
                        window.onload = showRecommendation;
            
                        //Searches for products in database
                        function search(){
                        //Extract the search text
                        var searchText = document.getElementById("SearchInput").value;
                
                        //Add the search keyword to the recommender
                        recommender.addKeyword(searchText);
                        showRecommendation();
                
                        //#FIXME# PERFORM SEARCH FOR PRODUCTS
                        }
            
                        //Display the recommendation in the document
                        function showRecommendation(){
//                            alert(recommender.getTopKeyword());
                            
                        document.getElementById("RecomendationDiv").innerHTML = recommender.getTopKeyword();
                        document.getElementById("RecomendationInput").value = recommender.getTopKeyword();
                        }
                        </script>
                        <h2>Basket</h2>
                    <div id="BasketDiv">Loading...</div>
                    <script>
                        //Create a new basket
                        var basket = new Basket("basket2.php");
                        basket.get();
                    </script>
                    <button>Check out </button>
                    </div>
                 
                


                    <div class ="products"> 
                     <?php foreach ($products as $product) {?>
                     <span id="txtHint">
                         <div style="margin-top: 20px" >
                             <div class="product-main ">
                                 <a href="#"> <img <?php echo '<img src="images/'.$product["image_url"].'" width="100" height="100">'; ?> </a>
                                 <div><b>Name:</b> <?php echo $product["name"] ; ?></div>
                                 <div><b>Type: </b><?php echo $product["type"] ; ?></div>
                                 <div><b>Level: </b><?php echo $product["level"] ; ?></div>
                                 <div><b>Size: </b><?php echo $product["size"] ; ?></div>
                                 <div><b>Price £: </b><?php echo $product["price"] ; ?></div>
                                 <div><b>Quantity: </b> <?php echo $product["stock_count"] ; ?></div>
                                 <div><b>Description: </b><?php echo $product["description"] ; ?></div>
                                     <div><?php echo '<button onclick=\'basket.add("' . $product["name"] . '", "' . $product["name"] . '", 1)\'> Add to basket </button>'; ?></div>
                             </div>
                         </div>
                     </span>
                     <?php } ?>
                     </div> 


                     <?php 
                     //Close the connection
                     $mongoClient->close();
                     ?>

     
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
    
    