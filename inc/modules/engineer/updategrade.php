
<?php


if(isset($_POST['update_btn'])){
    $tmpproject=$_GET['id'];
    $tmpid=$_GET['eid'];
    $check1=$_POST['check'];
    $grade = $_POST['grade'];

$sql="UPDATE  works SET grade=$grade WHERE engineer_id=$tmpid AND project_id=$tmpproject";
 $result=mysqli_query($conn,$sql);
if($result){

?>
    <div class="alert alert-success">
        <strong>Success!</strong> grade successfully updates
        <a href="./?module=engineer&page=info&id=<?php echo $tmpid;?>">click here</a>.
    </div>
    <?php
}else{
?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in updating grade
        <a href="./?module=engineer&page=updategrade&id=<?php echo $tmpproject;?>&eid=<?php echo $tmpid;?>">click here</a> to retry.
    </div>
    <?php
}
die;
}
?>

<?php
$tmpproject=$_GET['id'];
$tmpid=$_GET['eid'];

$sql= "SELECT * FROM works WHERE engineer_id=$tmpid AND project_id=$tmpproject Limit 1";
$result=mysqli_query($conn,$sql);
$old_data=mysqli_fetch_assoc($result);
?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      update grade for project
    </h2>
    <form method="POST" action="./?module=engineer&page=updategrade&id=<?=$tmpproject?>&eid=<?=$tmpid?>">
    <div class="form-group">
        <label for="grade">grade:</label>
        <?php
       $check=0;
        if ($old_data['grade']==null) {
            $check=1;
            ?>
            <input type="number" min="1" max="10" name="grade" class="form-control" placeholder=" not graded yet"  required>
           
            <input type="hidden" name="check" value=" <?php echo $check;?>">
          
            <?php
        }else{
        ?>
        <input type="number" min="1" max="10" name="grade" class="form-control" value="<?=$old_data['grade'];?>" required>
        <input type="hidden" name="check" value=" <?php echo $check;?>">
        <?php
    }
    ?>
    </div>

      <button type="submit" class="btn btn-default" name="update_btn">update</button>
    </form>
  </div>
</div>
