<?php
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
    birthdate VARCHAR(10)
    )";
     

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
$sql="CREATE TABLE IF NOT EXISTS has(
    id INT(60) UNSIGNED PRIMARY KEY,
    field_name VARCHAR(30),
    FOREIGN KEY (id) REFERENCES engineer(id),
    FOREIGN key (field_name) REFERENCES software_field(field_name) 
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


//#####################projects#####################################
$sql="CREATE TABLE IF NOT EXISTS projects (
    project_id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    project_name VARCHAR(30)  ,
    starting_time VARCHAR(20) ,
    customer_name VARCHAR(40) ,
    taoor VARCHAR(260) 
    )";

$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}
//#################milestones##############
$sql="CREATE TABLE IF NOT EXISTS milestones (
    project_id INT(60) UNSIGNED PRIMARY KEY,
    product_name VARCHAR(30) ,
    budget INT(100),
    datee VARCHAR(60),
    FOREIGN KEY (project_id) REFERENCES projects(project_id) ,
    UNIQUE (product_name) )";
    $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}
//#################development_stages##############
$sql="CREATE TABLE IF NOT EXISTS development_stages (
    project_id INT(60) UNSIGNED PRIMARY KEY,
    tests VARCHAR(30) ,
    design VARCHAR(100),
    con_management VARCHAR(60),
    requirements VARCHAR(60),
    coding VARCHAR(60),
    FOREIGN KEY (project_id) REFERENCES projects(project_id)  )";
    $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}
//#############works######################
$sql="CREATE TABLE  IF NOT EXISTS works (
    project_id INT(60) UNSIGNED NOT NULL,
    engineer_id INT(60) UNSIGNED NOT NULL,
    grade INT(10) UNSIGNED,
    PRIMARY KEY (project_id, engineer_id),
    CONSTRAINT Constr_engineer_works_project_id_fk
        FOREIGN KEY (project_id) REFERENCES projects (project_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT Constr_engineer_project_engineer_id_fk
    FOREIGN KEY (engineer_id) REFERENCES engineer(id)
        ON DELETE CASCADE ON UPDATE CASCADE
    )";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}


//$sql=mysql_query("CREATE TRIGGER `proff_delete` BEFORE DELETE ON `Professors` FOR EACH ROW DELETE FROM PhonesProff where PhonesProff.Professors_id=OLD.id");


?>
