<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $id_main=$_GET['id_main'];
$sql="DELETE FROM milestones WHERE id=$id_main";
$result=mysqli_query($conn,$sql);

 if($result)
 {
?>
<div class="alert alert-success">
  <strong>Success!</strong> milestone successfully deleted 
  <a href="./?module=projects&page=info&id=<?php echo $_GET['id'];?>">click here</a>.
</div>
<?php
 }
 else{
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> error in deleting milestone
        <a href="./?module=projects&page=info&id=<?php echo $_GET['id'];?>">click here</a> to retry.
    </div>
<?php
 }
}
?>