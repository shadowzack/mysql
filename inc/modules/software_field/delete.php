<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
$sql="DELETE FROM software_field WHERE id=$id";
$result=mysqli_query($conn,$sql);

 if($result)
 {
?>
<div class="alert alert-success">
  <strong>Success!</strong> software_field successfully deleted <a href="./?module=software_field&page=list">click here</a>.
</div>
<?php
 }
 else{
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> you cant delete feild without deleting engineers who work here
        <a href="./?module=software_field&page=list">click here</a> to retry.
    </div>
<?php
 }
}
?>