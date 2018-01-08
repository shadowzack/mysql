<?php
if(isset($_POST['save'])){

    
    $project_name = $_POST['project_name'];
  
    $starting_time = $_POST['starting_time'];
    $customer_name=$_POST['customer_name'];
   
    $taoor=$_POST['taoor'];

  /*  $product=$_POST['product'];
    $budget=$_POST['budget'];
    $datee=$_POST['datee'];
    $devolopment_tools = $_POST['devolopment_tools'];
*/

$sql="INSERT INTO projects (project_name, starting_time,customer_name,taoor)
VALUES ('$project_name','$starting_time','$customer_name','$taoor')";
 $result=mysqli_query($conn,$sql);
if($result){
 /*   $id = mysqli_insert_id($conn);
$sql="INSERT INTO has(id,field_name) VALUES('$id','$field_name')";
$res=mysqli_query($conn,$sql);
if($res){*/
?>
    <div class="alert alert-success">
        <strong>Success!</strong> project successfully created
        <a href="./?module=projects&page=list">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in creating project
        <a href="./?module=projects&page=create">click here</a> to retry.
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
                Create new projects
            </h2>
            <form method="POST" action="./?module=projects&page=create">
                <div class="form-group">
                    <label for="project_name">project_name:</label>
                    <input type="text" name="project_name" class="form-control" required>
                </div>
              
                <div class="form-group">
                    <label for="starting_time">starting_time:</label>
                    <input type="text" id="date" name="starting_time" step="any" class="form-control" required>
                    <small>Enter date as Month / Day / Year</small>
                </div>
                
                <div class="form-group">
                    <label for="customer_name">customer_name:</label>
                    <input type="tel" name="customer_name" class="form-control" required>
                </div>
                 
                
                <div class="form-group">
                    <label for="taoor">taoor:</label>
                    <input type="tel" name="taoor" class="form-control" required>
                </div>
     

        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>