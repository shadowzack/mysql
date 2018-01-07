<?php
if(isset($_POST['save'])){

    
    $project_id = $_GET['id'];
  
    $tests = $_POST['tests'];
    $design=$_POST['design'];
   
    $con_management=$_POST['con_management'];

    $requirements=$_POST['requirements'];
    $coding=$_POST['coding'];

$sql="UPDATE development_stages SET 
tests='$tests',design='$design',con_management='$con_management' ,coding='$coding',con_management='$con_management' WHERE development_stages.project_id='{$_GET['id']}'
";
 $result=mysqli_query($conn,$sql);

if($result){
?>
    <div class="alert alert-success">
        <strong>Success!</strong> project devvolment stages successfully updates 
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in updating project devolment stages
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a> to retry.
    </div>
    <?php
}
die;
}
//}

?>

<?php


$sql= "SELECT * FROM development_stages WHERE development_stages.project_id={$_GET['id']} Limit 1";
$result=mysqli_query($conn,$sql);
$old_data=mysqli_fetch_assoc($result);
?>
    <div class="row">
        <div class="col-xs-12">
            <h2>
                update project development_stages
            </h2>
            <form method="POST" action="./?module=projects&page=updatedev&id=<?=$_GET['id'];?>">
                <div class="form-group">
                    <label for="tests">tests:</label>
                    <input type="text" name="tests" class="form-control" value="<?=$old_data['tests'];?>" required>
                </div>
              
                <div class="form-group">
                    <label for="design">design:</label>
                    <input type="text" name="design" class="form-control" value="<?=$old_data['design'];?>"  required>
                </div>
                
                <div class="form-group">
                    <label for="con_management">con_management:</label>
                    <input type="tel" name="con_management" class="form-control" value="<?=$old_data['con_management'];?>" required>
                </div>
                    
                <div class="form-group">
                    <label for="coding">coding:</label>
                    <input type="tel" name="coding" class="form-control" value="<?=$old_data['coding'];?>" required>
                </div>
                   
                <div class="form-group">
                    <label for="requirements">requirements:</label>
                    <input type="tel" name="requirements" class="form-control" value="<?=$old_data['requirements'];?>" required>
                </div>
                

        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>