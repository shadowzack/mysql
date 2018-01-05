<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
$sql="DELETE FROM phone WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(!$result)
      echo "Error creating table: " . mysqli_error($conn)."<br>";
      
$sql="DELETE FROM engineer WHERE id=$id";
 $result=mysqli_query($conn,$sql);
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
        <a href="./?module=engineer&page=create">click here</a> to retry.
    </div>
<?php
 }
}
?>