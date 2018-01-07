<?php
if(isset($_POST['save'])){

    
    $project_id = $_GET['id'];
  
    $product_name = $_POST['product_name'];
    $budget=$_POST['budget'];
   
    $datee=$_POST['datee'];


$sql="UPDATE milestones SET 
product_name='$product_name',budget='$budget',datee='$datee' WHERE milestones.project_id='{$_GET['id']}'
";
 $result=mysqli_query($conn,$sql);

if($result){
?>
    <div class="alert alert-success">
        <strong>Success!</strong> project milestones successfully updates 
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in updating project milestones
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a> to retry.
    </div>
    <?php
}
die;
}
//}

?>

<?php


$sql= "SELECT * FROM milestones WHERE milestones.project_id={$_GET['id']} Limit 1";
$result=mysqli_query($conn,$sql);
$old_data=mysqli_fetch_assoc($result);
?>
    <div class="row">
        <div class="col-xs-12">
            <h2>
                Create new project milestones
            </h2>
            <form method="POST" action="./?module=projects&page=updatemilestones&id=<?=$_GET['id'];?>">
                <div class="form-group">
                    <label for="product_name">product_name:</label>
                    <input type="text" name="product_name" class="form-control" value="<?=$old_data['product_name'];?>" required>
                </div>
              
                <div class="form-group">
                    <label for="budget">budget:</label>
                    <input type="text" name="budget" class="form-control" value="<?=$old_data['budget'];?>"  required>
                </div>
                
                <div class="form-group">
                    <label for="datee">datee:</label>
                    <input type="tel" name="datee" class="form-control" value="<?=$old_data['datee'];?>" required>
                </div>
                 
                

        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>