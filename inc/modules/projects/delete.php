<?php



if (isset($_GET['id'])) {
  $id = $_GET['id'];
$init=mysqli_stmt_init($conn);
$stmt= mysqli_stmt_prepare($init,"DELETE FROM projects WHERE project_id=?");
  mysqli_stmt_bind_param($init,"i",$id);
 /*$sql="DELETE FROM projects WHERE project_id=$id";
$result=mysqli_query($conn,$sql);
if(!$result)
      echo "Error creating table: " . mysqli_error($conn)."<br>";
*/

////////////////////prepare stmt
?>



<?php 


  mysqli_autocommit($conn,FALSE);
$sql="DELETE FROM development_stages WHERE project_id=$id";
$result=mysqli_query($conn,$sql);

 if($result)
 {
?>

<?php


 }
 else{
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> error in deleting development_stages
        <a href="./?module=projects&page=info&id=<?php echo $_GET['id'];?>">click here</a> to retry.
    </div>
<?php
mysqli_rollback($conn);

 }


?>

<?php 

	$id = $_GET['id'];
$sql="DELETE FROM milestones WHERE project_id=$id";
$result=mysqli_query($conn,$sql);

 if(!$result)
 {
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> error in deleting milestone
        <a href="./?module=projects&page=info&id=<?php echo $_GET['id'];?>">click here</a> to retry.
    </div>
<?php
 }

 mysqli_query($conn,"DROP TABLE development_stages");

mysqli_autocommit($conn,TRUE);

$res=mysqli_stmt_execute($init);
 if($res)
 {
?>
<div class="alert alert-success">
  <strong>Success!</strong> project successfully deleted <a href="./?module=projects&page=list">click here</a>.
</div>
<?php
 }
 else{
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> error in deleting project
        <a href="./?module=projects&page=create">click here</a> to retry.
    </div>
<?php
 }
 mysqli_stmt_close($init);

}

?>
