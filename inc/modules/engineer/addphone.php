<?php
if(isset($_POST['phone'])){

$sql=$conn->prepare("INSERT INTO phone (phone, id) VALUES (?,?)");
$id=$_GET['id'];
$phone=$_POST['phone'];
$sql->bind_param("ii",$phone,$id);

$result=$sql->execute();

if($result){
?>
<div class="alert alert-success">
  <strong>Success!</strong> phone number successfully Added <a href="./?module=engineer&page=info&id=<?=$_GET['id'];?>">click here</a>.
</div>
<?php
}else{
    
$url_id = mysqli_real_escape_string($conn,$_POST['phone']);
$sql = "SELECT phone FROM phone WHERE phone=$url_id";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) >0){
   //cant have same phone number twise 
?>
<div class="alert alert-danger">
  <strong>phone already exists </strong> <a href="./?module=engineer&page=addphone&id=<?=$_GET['id'];?>">click here</a> to retry.
</div>
   <?php
}else{
   //phone doesent exist

?>
<div class="alert alert-danger">
  <strong>Error!</strong> error in adding phone <a href="./?module=engineer&page=addphone&id=<?=$_GET['id'];?>">click here</a> to retry.
</div>
<?php
}
}
die;
}

?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      add phone number
    </h2>
    <form method="POST" action="./?module=engineer&page=addphone&id=<?=$_GET['id'];?>">

      <div class="form-group">
        <label for="email">Phone Number:</label>
        <input type="text"  name="phone" class="form-control" required>
      </div>
      <button type="submit"   class="btn btn-default">add</button>
    </form>
  </div>
</div>