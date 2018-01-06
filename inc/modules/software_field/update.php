
<?php

if(isset($_POST['update_btn'])){

    
    $field_name = $_POST['field_name'];
    $expertise = $_POST['expertise'];
    
   /* mysqli_query($conn,'SET foreign_key_checks = 0');
$sql="UPDATE has SET field_name='$field_name' WHERE id='{$_GET['id']}'";
$res=mysqli_query($conn,$sql);
if ($res) {
 
   // mysqli_query($conn,'SET foreign_key_checks = 1');*/
$sql="UPDATE  software_field SET field_name='$field_name', expertise='$expertise' WHERE software_field.id='{$_GET['id']}'";
 $result=mysqli_query($conn,$sql);

 
  
if($result){

?>
    <div class="alert alert-success">
        <strong>Success!</strong> software_field successfully updates
        <a href="./?module=software_field&page=list">click here</a>.
    </div>
    <?php
}else{
?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in updating software_field
        <a href="./?module=software_field&page=create">click here</a> to retry.
    </div>
    <?php
}
die;
}
?>

<?php


$sql= "SELECT * FROM software_field WHERE id={$_GET['id']} Limit 1";
$result=mysqli_query($conn,$sql);
$old_data=mysqli_fetch_assoc($result);
?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      Edit software_field
    </h2>
    <form method="POST" action="./?module=software_field&page=update&id=<?=$_GET['id'];?>">
    <div class="form-group">
        <label for="field_name">field_name:</label>
        <input type="text" name="field_name" class="form-control" value="<?=$old_data['field_name'];?>" required>
    </div>
    <div class="form-group">
        <label for="expertise">expertise:</label>
        <input type="text" name="expertise" step="any" class="form-control"  value="<?=$old_data['expertise'];?>" required>
    </div>
    
           
      <button type="submit" class="btn btn-default" name="update_btn">update</button>
    </form>
  </div>
</div>
