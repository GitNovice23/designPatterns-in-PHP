<?php

    include "connection.php";
    
    // the codes below will enable us to fetch data from the database and display it on the table

    // Fetch data from the database
    $query = "select*from products";
    $sql = mysqli_query($connection,$query);
    
    // to verify if the query to was executed successfully
    if(!$sql){
        die("Failed to execute query".mysqli_error($connection));
    }

    // check if the are any row in the result set
    if(mysqli_num_rows($sql) <= 0){
        die("No products founnd");
    }

    //fetch all rows into an array 
    $results = [];
    while($row = mysqli_fetch_assoc($sql)){
        $results[] = $row;
    }

    // since we are connected to the database, no need to use this array to fill the table
    // $products = array(
    // [
    //     "ID" => 1,
    //     "Name" => "orange",
    //     "category" => "fruits",
    //     "price" => 20000,
    //     "status" => "sold",
    // ],
    // [  
    //     "ID" => 2,
    //     "Name" => "Yaris",
    //     "category" => "car",
    //     "price" => 20000000,
    //     "status" => "Available",

    // ],
    // [
    
    //     "ID" => 3,
    //     "Name" => "t-shirt",
    //     "category" => "Dresses",
    //     "price" => 20000,
    //     "status" => " ",

    // ]
    // );

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class= "container">
        <div class= "div1">
            <button class="btn"><a href="addproduct.php">Add product</a></button>
        </div>
        <div class= "div2">
            <table border = "1px solid black" height = 100px width = 1350px>
        <thead>
            <tr>
                <th>ID</th>
            
                <th>Name</th>
                <th>Categories</th>
                <th>prices</th>
                <th>status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($results as  $prod){
            ?>
            <tr>
                <td><?= $prod["ID"]?></td>
                <td><?= $prod["Name"]?></td>
                <td><?= $prod["Categories"]?></td>
                <td><?= $prod["prices"]?></td>
                <td><?= $prod["status"]?></td>
                <td>
                    <div class="btns">
                        <button id="btn1"><a href="Delete.php?id=<?= $prod['ID'] ?>">Delete</a></button>
                        <button id="btn2"><a href="Edit.php?id=<?= $prod['ID'] ?>">Edit</a></button>
                        
                    </div>
                    
                </td>
            </tr>
            <?php 
                }
            ?>
            <tr>
                <td colspan = "4"></td>
                <td colspan = "2">Total: </td>
            </tr>
        </tbody>
    </table> 
        </div>
    </div>
    
   
</body>
</html>