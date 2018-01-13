<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stage_name=$_GET['stage'];
  $tool_name=$_GET['tool'];
$sql="DELETE FROM development_stages WHERE project_id='$id' AND stage_name='$stage_name' AND tool_name='$tool_name'";

$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo "Error creating table: " . mysqli_error($conn)."<br>";
}
 if($result)
 {
?>
<div class="alert alert-success">
  <strong>Success!</strong> development stage successfully deleted 
  <a href="./?module=projects&page=info&id=<?php echo $_GET['id'];?>">click here</a>.
</div>
<?php
 }
 else{
?>
   <div class="alert alert-danger">
        <strong>Error!</strong> error in deleting development stage
        <a href="./?module=projects&page=info&id=<?php echo $_GET['id'];?>">click here</a> to retry.
    </div>
<?php
 }
}
?>