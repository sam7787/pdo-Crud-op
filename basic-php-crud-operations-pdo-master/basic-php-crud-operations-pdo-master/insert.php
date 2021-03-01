<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $city_name = $_POST['city_name'];

 echo $first_name;
 // variables for input data
 
 // sql query for inserting data into database
 
    $sql_query = "INSERT INTO users(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city_name')";
 	mysql_query($sql_query);
        
   // sql query for inserting data into database
 
}
?>