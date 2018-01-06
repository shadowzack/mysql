<?php
if(isset($_POST['save'])){

    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
 
   // $phone=$_POST['phone'];
    $birthdate=$_POST['birthdate'];
    $field_name=$_POST['field_name'];
    $date=$birthdate;
    $date = explode("/", $date);
    $date = $date[1].'-'.$date[0].'-'.$date[2];
$dob = new DateTime($date);
$now = new DateTime();
$difference = $now->diff($dob);
$age = $difference->y;



$sql="INSERT INTO engineer (firstname, lastname, addresss,age,birthdate)
VALUES ('$firstname','$lastname','$address','$age','$birthdate')";
 $result=mysqli_query($conn,$sql);
if($result){
    $id = mysqli_insert_id($conn);
$sql="INSERT INTO has(id,field_name) VALUES('$id','$field_name')";
$res=mysqli_query($conn,$sql);
if($res){
?>
    <div class="alert alert-success">
        <strong>Success!</strong> engineer successfully created
        <a href="./?module=engineer&page=list">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in creating engineer
        <a href="./?module=engineer&page=create">click here</a> to retry.
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
                Create new engineer
            </h2>
            <form method="POST" action="./?module=engineer&page=create">
                <div class="form-group">
                    <label for="firstname">firstname:</label>
                    <input type="text" name="firstname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lastname">lastname:</label>
                    <input type="text" name="lastname" step="any" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">address:</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <!--
                <div class="form-group">
                    <label for="age">age:</label>
                    <input type="text" name="age" step="any" class="form-control" required>
                </div>-->

                <div class="form-group">
                    <label for="field_name">field_name:</label>
                    <?php
                     $sql2="SELECT field_name FROM software_field";
                     $res=mysqli_query($conn,$sql2);
                     ?>
                        <select name="field_name" class="form-control" required>
                            <option value="" disabled selected hidden>choose field...</option>
                            <?php
                     while($row=mysqli_fetch_assoc($res)){
                             ?>
                                <option value[]="<?=$row['field_name'];?>">
                                    <?=$row['field_name'];?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                       <!-- <input type="tel" name="field_name" class="form-control" required>-->
                </div>
                <div class="form-group">
                    <label for="birthdate">birthdate:</label>
                    <input type="text" id="date" name="birthdate" step="any" class="form-control" required>
                    <small>Enter date as Month / Day / Year</small>
                </div>
        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>