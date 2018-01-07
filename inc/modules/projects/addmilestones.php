<?php
if(isset($_POST['save'])){

    
    $project_id = $_GET['id'];
  
    $product_name = $_POST['product_name'];
    $budget=$_POST['budget'];
   
    $datee=$_POST['datee'];


$sql="INSERT INTO milestones (project_id, product_name,budget,datee)
VALUES ('$project_id','$product_name','$budget','$datee')";
 $result=mysqli_query($conn,$sql);
if($result){
?>
    <div class="alert alert-success">
        <strong>Success!</strong> project milestones successfully created 
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in creating project milestones
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a> to retry.
    </div>
    <?php
}
die;
}
//}

?>

    <div class="row">
        <div class="col-xs-12">
            <h2>
                Create new project milestones
            </h2>
            <form method="POST" action="./?module=projects&page=addmilestones&id=<?=$_GET['id'];?>">
                <div class="form-group">
                    <label for="product_name">product_name:</label>
                    <input type="text" name="product_name" class="form-control" required>
                </div>
              
                <div class="form-group">
                    <label for="budget">budget:</label>
                    <input type="text" name="budget" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="datee">datee:</label>
                    <input type="tel" name="datee" class="form-control" required>
                </div>
                 
                

        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>