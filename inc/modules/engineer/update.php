
<?php

if(isset($_POST['update_btn'])){

    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $age=$_POST['age'];
    $birthdate=$_POST['birthdate'];

$sql="UPDATE  engineer SET firstname='$firstname', lastname='$lastname', addresss='$address',age='$age',birthdate='$birthdate' WHERE engineer.id='{$_GET['id']}'";
 $result=mysqli_query($conn,$sql);
if($result){

?>
    <div class="alert alert-success">
        <strong>Success!</strong> engineer successfully updates
        <a href="./?module=engineer&page=list">click here</a>.
    </div>
    <?php
}else{
?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in updating engineer
        <a href="./?module=engineer&page=create">click here</a> to retry.
    </div>
    <?php
}
die;
}
?>

<?php


$sql= "SELECT * FROM engineer WHERE id={$_GET['id']} Limit 1";
$result=mysqli_query($conn,$sql);
$old_data=mysqli_fetch_assoc($result);
?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      Edit engineer
    </h2>
    <form method="POST" action="./?module=engineer&page=update&id=<?=$_GET['id'];?>">
    <div class="form-group">
        <label for="firstname">firstname:</label>
        <input type="text" name="firstname" class="form-control" value="<?=$old_data['firstname'];?>" required>
    </div>
    <div class="form-group">
        <label for="lastname">lastname:</label>
        <input type="text" name="lastname" step="any" class="form-control"  value="<?=$old_data['lastname'];?>" required>
    </div>
    <div class="form-group">
        <label for="address">address:</label>
        <input type="text" name="address" class="form-control"  value="<?=$old_data['addresss'];?>" required>
    </div>
    <div class="form-group">
        <label for="age">age:</label>
        <input type="text" name="age" step="any" class="form-control"   value="<?=$old_data['age'];?>" required>
    </div>
    <div class="form-group">
        <label for="birthdate">birthdate:</label>
        <input type="text" name="birthdate" step="any" class="form-control"  value="<?=$old_data['birthdate'];?>" required>
    </div>
           

      <button type="submit" class="btn btn-default" name="update_btn">update</button>
    </form>
  </div>
</div>
