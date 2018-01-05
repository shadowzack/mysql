<?php
if(isset($_POST['save'])){

    $field_name = $_POST['field_name'];
    $expertise = $_POST['expertise'];
 
    
$sql="INSERT INTO software_field (expertise, field_name)
VALUES ('$expertise','$field_name')";
 $result=mysqli_query($conn,$sql);
if($result){

?>
    <div class="alert alert-success">
        <strong>Success!</strong> software_field successfully created
        <a href="./?module=software_field&page=list">click here</a>.
    </div>
    <?php
}else{

    $check = mysqli_real_escape_string($conn,$field_name);
    $sql = "SELECT field_name FROM software_field WHERE field_name=$check";
    $result = mysqli_query($conn,$sql);
   
    if(mysqli_num_rows($result)>0){
?>
        <div class="alert alert-danger">
        <strong>Error!</strong> field name already exists
        <a href="./?module=software_field&page=create">click here</a> to retry.
    </div>

<?php
}else{
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in creating software_field
        <a href="./?module=software_field&page=create">click here</a> to retry.
    </div>
    <?php
}
die;
}

}

?>

    <div class="row">
        <div class="col-xs-12">
            <h2>
                Create new software_field
            </h2>
            <form method="POST" action="./?module=software_field&page=create">
                <div class="form-group">
                    <label for="field_name">field_name:</label>
                    <input type="text" name="field_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="expertise">expertise:</label>
                    <input type="text" name="expertise" step="any" class="form-control" required>
                </div>
                
        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>