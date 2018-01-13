<?php
if(isset($_POST['tool'])){

$sql=$conn->prepare("INSERT INTO tools (tool_name) VALUES (?)");
$id=$_GET['id'];
$tool=$_POST['tool'];
$sql->bind_param("s",$tool);

$result=$sql->execute();

if($result){
?>
<div class="alert alert-success">
  <strong>Success!</strong> tool successfully Added <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a>.
</div>
<?php
}else{
    
/*$url_id = mysqli_real_escape_string($conn,$_POST['tool']);

$sql = "SELECT id FROM tools WHERE tool_name=$url_id";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) >0){*/
   //cant have same tool  twise 
?>
<div class="alert alert-danger">
  <strong>tool already exists </strong> <a href="./?module=projects&page=addtool&id=<?=$_GET['id'];?>">click here</a> to retry.
</div>
   <?php
   /*
}else{
   //tool doesent exist and there is another problem

?>
<div class="alert alert-danger">
  <strong>Error!</strong> error in adding tool <a href="./?module=projects&page=addtool&id=<?=$_GET['id'];?>">click here</a> to retry.
</div>
<?php
}*/

}
die;
}

?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      add tool number
    </h2>
    <form method="POST" action="./?module=projects&page=addtool&id=<?=$_GET['id'];?>">

      <div class="form-group">
        <label for="email">tool name:</label>
        <input type="text"  name="tool" class="form-control" required>
      </div>
      <button type="submit"   class="btn btn-default">add</button>
    </form>
  </div>
</div>