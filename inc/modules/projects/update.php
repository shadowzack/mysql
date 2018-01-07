
<?php

if(isset($_POST['update_btn'])){
    $project_name = $_POST['project_name'];
    $taoor=$_POST['taoor'];
    $starting_time = $_POST['starting_time'];
    $customer_name=$_POST['customer_name'];
  /*  $product=$_POST['product'];
    $budget = $_POST['budget'];
    $datee=$_POST['datee'];
    $devolopment_tools = $_POST['devolopment_tools'];
 */

$sql="UPDATE  projects SET project_name='$project_name', starting_time='$starting_time',
customer_name='$customer_name',taoor='$taoor' WHERE projects.project_id='{$_GET['id']}'";
 $result=mysqli_query($conn,$sql);
if($result){

?>
    <div class="alert alert-success">
        <strong>Success!</strong> project successfully updates
        <a href="./?module=projects&page=list">click here</a>.
    </div>
    <?php
}else{
?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in updating project
        <a href="./?module=projects&page=create">click here</a> to retry.
    </div>
    <?php
}
die;
}
?>

<?php

$sql= "SELECT * FROM projects WHERE project_id={$_GET['id']} Limit 1";
$result=mysqli_query($conn,$sql);
$old_data=mysqli_fetch_assoc($result);

?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      Edit project
    </h2>
    <form method="POST" action="./?module=projects&page=update&id=<?=$_GET['id'];?>">
    <div class="form-group">
        <label for="project_name">project_name:</label>
        <input type="text" name="project_name" class="form-control" value="<?=$old_data['project_name'];?>" required>
    </div>
    
    <div class="form-group">
        <label for="starting_time">starting_time:</label>
        <input type="text" name="starting_time" class="form-control"  value="<?=$old_data['starting_time'];?>" required>
    </div>
    <div class="form-group">
        <label for="customer_name">customer_name:</label>
        <input type="text" name="customer_name" step="any" class="form-control"   value="<?=$old_data['customer_name'];?>" required>
    </div>
    <div class="form-group">
        <label for="taoor">taoor:</label>
        <input type="text" name="taoor" step="any" class="form-control"  value="<?=$old_data['taoor'];?>" required>
    </div>
    <!--
    <div class="form-group">
        <label for="product">product:</label>
        <input type="text" name="product" step="any" class="form-control"  value="<?=$old_data['product'];?>" required>
    </div>
    <div class="form-group">
        <label for="budget">budget:</label>
        <input type="text" name="budget" step="any" class="form-control"  value="<?=$old_data['budget'];?>" required>
    </div>
    <div class="form-group">
        <label for="datee">datee:</label>
        <input type="text" name="datee" step="any" class="form-control"  value="<?=$old_data['datee'];?>" required>
    </div>
    <div class="form-group">
        <label for="devolopment_tools">devolopment_tools:</label>
        <input type="text" name="devolopment_tools" step="any" class="form-control"  value="<?=$old_data['devolopment_tools'];?>" required>
    </div>
   -->

      <button type="submit" class="btn btn-default" name="update_btn">update</button>
    </form>
  </div>
</div>
