<?php
if(isset($_POST['save'])){

    
    $project_id = $_GET['id'];
  
    $tests = $_POST['tests'];
    $design=$_POST['design'];
   
    $con_management=$_POST['con_management'];
    $requirements=$_POST['requirements'];
    $coding=$_POST['coding'];

$sql="INSERT INTO development_stages (project_id, tests,design,con_management,requirements,coding)
VALUES ('$project_id','$tests','$design','$con_management','$requirements','$coding')";
 $result=mysqli_query($conn,$sql);
if($result){
?>
    <div class="alert alert-success">
        <strong>Success!</strong> project development_stages successfully created 
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in creating project development_stages
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
                Create new project development_stages
            </h2>
            <form method="POST" action="./?module=projects&page=adddev&id=<?=$_GET['id'];?>">
                <div class="form-group">
                    <label for="tests">tests:</label>
                    <input type="text" name="tests" class="form-control" required>
                </div>
              
                <div class="form-group">
                    <label for="design">design:</label>
                    <input type="text" name="design" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="con_management">con_management:</label>
                    <input type="tel" name="con_management" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="requirements">requirements:</label>
                    <input type="tel" name="requirements" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="coding">coding:</label>
                    <input type="tel" name="coding" class="form-control" required>
                </div>
                

        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>