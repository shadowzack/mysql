<?php
/*
$conn = mysqli_connect('localhost:3306','root','');
$dbci= new mysqli('localhost:3306','root','');
$dbci->select_db('mydb');*/
$host="localhost:3306";
$user="root";
$pass="";
$db= "mydb";
$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn){
 $FILE_TO_LOAD="problem/connect.php";
 die("Connection failed: " . mysqli_connect_error());
}
$db_selected = mysqli_select_db($conn,"mydb");
if(!$db_selected){

 $FILE_TO_LOAD="problem/connect.php";
}

//creating tables if not exists --------------------------------------------------------------------------------------------------------------------------------------------


//###################ENGINEER############################
$sql="CREATE TABLE IF NOT EXISTS engineer (
    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    addresss VARCHAR(50),
    age int(10),
    birthdate VARCHAR(10),
    field_id INT(60) UNSIGNED
    )";
     /*FOREIGN key (field_id) REFERENCES software_field(id)*/

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}
 $sql="CREATE TABLE IF NOT EXISTS phone(
     phone INT(10) UNSIGNED PRIMARY KEY,
     id INT(60) UNSIGNED ,
     FOREIGN KEY (id) REFERENCES engineer(id)
 )";
 $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}


//#################SOFTWARE FIELD############################
$sql="CREATE TABLE IF NOT EXISTS software_field (
    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    field_name VARCHAR(30) NOT NULL,
    expertise VARCHAR(30) NOT NULL,
    UNIQUE (field_name) )";

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}
/*
$sql="CREATE TABLE  IF NOT EXISTS has (
    field_id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    id INT(60) UNSIGNED ,
    FOREIGN KEY (id) REFERENCES engineer(id),
    FOREIGN KEY (field_id) REFERENCES sef(field_id) )";

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}
*/


//#####################projects#####################################
$sql="CREATE TABLE IF NOT EXISTS projects (
    project_id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    project_name VARCHAR(30)  ,
    devolment_tools VARCHAR(320) ,
    starting_time VARCHAR(20) ,
    customer_name VARCHAR(40) ,
    product VARCHAR(30) ,
    budget INT(100),
    datee VARCHAR(60) ,
    taoor VARCHAR(260) 
    )";

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}


$sql="CREATE TABLE  IF NOT EXISTS works (
    project_id INT(60) UNSIGNED PRIMARY KEY, 
    engineer_id INT(60) UNSIGNED ,
    FOREIGN KEY (engineer_id) REFERENCES engineer(id),
    FOREIGN KEY (project_id) REFERENCES projects(project_id)
    )";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}


//$sql=mysql_query("CREATE TRIGGER `proff_delete` BEFORE DELETE ON `Professors` FOR EACH ROW DELETE FROM PhonesProff where PhonesProff.Professors_id=OLD.id");


?>
