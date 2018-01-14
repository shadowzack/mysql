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
//if (!isset($_COOKIE["dbstart"])) {
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
//#############phone ####################################
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

//###############has############################
$sql="CREATE TABLE IF NOT EXISTS has(
    id INT(60) UNSIGNED PRIMARY KEY,
    field_name VARCHAR(30),
    FOREIGN KEY (id) REFERENCES engineer(id),
    FOREIGN key (field_name) REFERENCES software_field(field_name) ON UPDATE CASCADE
)";
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
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id INT(60) UNSIGNED,
    product_name VARCHAR(30) ,
    budget INT(100),
    datee VARCHAR(60),
    FOREIGN KEY (project_id) REFERENCES projects(project_id) )";
    //, UNIQUE (product_name) 
    $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}
/*
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
*/

$sql="CREATE TABLE IF NOT EXISTS stages (
    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stage_name VARCHAR(30) ,
    UNIQUE (stage_name)
     )";
    $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="CREATE TABLE IF NOT EXISTS tools (
    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tool_name VARCHAR(30) ,
    UNIQUE(tool_name)
  )";
    $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="CREATE TABLE IF NOT EXISTS development_stages (
     id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id INT(60) UNSIGNED,
    stage_name VARCHAR(30),
    tool_name VARCHAR(30),
    FOREIGN KEY (stage_name) REFERENCES stages(stage_name) ON DELETE CASCADE,
    FOREIGN KEY (tool_name) REFERENCES tools(tool_name),
    FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE  )";
    $query=mysqli_query($conn,$sql);
if(!$query)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}












//IGNORE 

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



if(!isset($_COOKIE['lg'])) {
   


$sql="INSERT IGNORE INTO `engineer` (`id`, `firstname`, `lastname`, `addresss`, `age`, `birthdate`) VALUES
(1, 'mahmod', 'hasan', 'haifa', 20, '06/19/1997'),
(2, 'avi', 'ytsak', 'tel-aviv', 27, '12/12/1990'),
(3, 'jolyana', 'bder', 'tira', 24, '12/11/1993'),
(4, 'mechal', 'lorn', 'hdera', 31, '05/22/1986'),
(5, 'omer', 'peli', 'haifa', 23, '01/24/1994'),
(6, 'mohamd', 'amer', 'nazerah', 25, '03/06/1992'),
(7, 'ytask', 'merkav', 'htzfon', 21, '06/06/1996'),
(8, 'yoni', 'rbin', 'nharya', 18, '03/07/1999'),
(9, 'ahmad', 'mhamid', 'kfar kra', 24, '10/22/1993'),
(10, 'david', 'jack', 'hertslya', 29, '02/19/1988');
";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="INSERT IGNORE INTO `has` (`id`, `field_name`) VALUES
(1, 'client side'),
(2, 'client side'),
(3, 'data base mangment'),
(5, 'fullstack'),
(7, 'meanstack'),
(4, 'moblie'),
(8, 'moblie'),
(6, 'server side'),
(9, 'unix'),
(10, 'unix kernel');";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="INSERT IGNORE INTO `milestones` (`id`,`project_id`, `product_name`, `budget`, `datee`) VALUES
(1,1, 'pp', 200000, '12/12/1999'),
(2,2, 'produ', 5220, '04/05/2001'),
(3,3, 'straming', 5515521, '12/12/1997'),
(4,4, 'ech srveer', 53456, '02/22/2005'),
(5,5,'java', 252515, '01/04/1988'),
(6,6, 'wirless', 56454, '04/06/2007'),
(7,7, 'auto driveing', 4531, '12/08/2013'),
(8,8, 'social', 521111, '05/07/2009'),
(9, 9,'drive onlie ', 400000, '12/09/2001'),
(10,10, 'x linux', 1, '01/15/2018');";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="INSERT IGNORE INTO `phone` (`phone`, `id`) VALUES
(75867857, 1),
(4294967295, 1),
(665546, 2),
(5478567, 2),
(4526456, 4),
(47475, 5),
(5464785, 6),
(4757486, 7),
(424536465, 8),
(7578, 10),
(7865787, 10),
(475647567, 10);";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="INSERT IGNORE INTO `projects` (`project_id`, `project_name`, `starting_time`, `customer_name`, `taoor`) VALUES
(1, 'web os', '11/11/2000', 'yoni', 'web opreation system'),
(2, 'virtual one', '12/05/2005', 'noamn', 'windows virtual os'),
(3, 'x stramer', '03/12/2007', 'amer', 'online stramer for web aplications'),
(4, 'draw 3d', '11/05/2001', 'mohamd', 'drawing 3d objects'),
(5, 'controlless', '12/22/2004', 'tmir', 'conrtol planes wirlessly'),
(6, 'charge free', '02/22/1999', 'moamin', 'wirless charging'),
(7, 'hands free', '05/06/2009', 'omar', 'autonomis driving'),
(8, 'live', '05/05/2013', 'mahmod', 'social media with every thing live'),
(9, 'mega drive', '06/06/1999', 'keli', 'cloud storage sulition'),
(10, 'linux x', '08/08/2018', 'mahmod hasan', 'Linux destro our final project');
";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$sql="INSERT IGNORE INTO `software_field` (`id`, `field_name`, `expertise`) VALUES
(1, 'web', 'low'),
(2, 'unix', 'low'),
(3, 'fullstack', 'hight'),
(4, 'meanstack', 'low'),
(5, 'unix kernel', 'very hieght'),
(6, 'server side', 'low'),
(7, 'client side', 'hight'),
(8, 'windows server', 'maduim'),
(9, 'moblie', 'student'),
(10, 'data base mangment', 'height');";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}


$sql="INSERT IGNORE INTO `works` (`project_id`, `engineer_id`, `grade`) VALUES
(1, 1, 7),
(1, 2, 1),
(1, 5, 4),
(2, 1, 5),
(2, 4, 2),
(2, 10, 5),
(3, 1, 3),
(3, 4, 1),
(3, 8, 5),
(3, 9, 5),
(3, 10, 8),
(4, 1, 1),
(4, 5, 5),
(4, 7, 5),
(5, 1, 3),
(5, 7, 5),
(6, 1, 5),
(6, 4, 2),
(7, 1, 5),
(7, 3, 5),
(8, 1, 6),
(8, 3, 4),
(8, 5, 4),
(8, 6, 4),
(8, 8, 7),
(8, 9, 8),
(9, 1, 5),
(10, 1, 6);";
$query=mysqli_query($conn,$sql);
if(!$query)
{
echo "Error creating table: " . mysqli_error($conn)."<br>";
}


setcookie('lg', 'ro',time()+31556926 ,'/');
$_COOKIE['lg'] = 'ro';
}
?>
