<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
$sql="DELETE FROM projects WHERE project_id=$id";
$result=mysqli_query($conn,$sql);
if(!$result)
      echo "Error creating table: " . mysqli_error($conn)."<br>";

 if($result)
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
}
////////////////////Triggers
?>