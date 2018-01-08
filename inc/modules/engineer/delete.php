<?php
if (isset($_GET['id'])) {
      $id = $_GET['id'];
      /*
$sql="DELETE FROM phone WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(!$result)
      echo "Error creating table: " . mysqli_error($conn)."<br>";

$sql="DELETE FROM has WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(!$result)
      echo "Error creating table: " . mysqli_error($conn)."<br>";

$sql="DELETE FROM engineer WHERE id=$id";
 $result=mysqli_query($conn,$sql);
*/
mysqli_query($conn,"DROP TRIGGER before_delete_engineer;");
$trigger=" CREATE TRIGGER before_delete_engineer BEFORE DELETE ON engineer 
FOR EACH ROW
BEGIN 
DELETE FROM has WHERE id=$id;
DELETE FROM phone WHERE id=$id;
END;
";
 $trigger_result=mysqli_query($conn,$trigger);
 if(!$trigger_result)
 {
      echo "Error creating table: " . mysqli_error($conn)."<br>";
 }
 $sql="DELETE FROM engineer WHERE id=$id";
 $result=mysqli_query($conn,$sql);
 if(!$result)
 {
      echo "Error creating table: " . mysqli_error($conn)."<br>";
 }
 if($result)
 {
?>
<div class="alert alert-success">
  <strong>Success!</strong> engineer successfully deleted <a href="./?module=engineer&page=list">click here</a>.
</div>
<?php
 }
 else{
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> error in deleting engineer
        <a href="./?module=engineer&page=list">click here</a> to retry.
    </div>
<?php
 }
}
?>