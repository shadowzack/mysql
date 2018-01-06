<?php
if(isset($_POST['porject_btn'])){

$sql=$conn->prepare("INSERT INTO works (engineer_id, project_id) VALUES (?,?)");
$id=$_GET['id'];
$project_id=$_POST['project_selsect'];
$sql->bind_param("ii",$id,$project_id);

$result=$sql->execute();

if($result){
?>
<div class="alert alert-success">
  <strong>Success!</strong> porject successfully Added <a href="./?module=engineer&page=info&id=<?=$_GET['id'];?>">click here</a>.
</div>
<?php
}else{
   

?>
<div class="alert alert-danger">
  <strong>Error!</strong> error in adding project <a href="./?module=engineer&page=addproject&id=<?=$_GET['id'];?>">click here</a> to retry.
</div>
<?php

}
die;
}

?>
<div class="row">
  <div class="col-xs-12">
    <h2>
      add project number
    </h2>
    <form method="POST" action="./?module=engineer&page=addproject&id=<?=$_GET['id'];?>">

      <div class="form-group">
        <label for="project_selsect">Projectname:</label>
        <?php
        $tmpid=$_GET['id'] ;
                   $sql="SELECT  projects.project_name,works.engineer_id,projects.project_id
                   FROM projects
                   INNER JOIN works
                   ON projects.project_id=works.project_id
                   WHERE  engineer_id!=$tmpid";
                  $res=mysqli_query($conn,$sql);
                  if ($res) {
                  $count2=mysqli_num_fields($res);
                 // echo($count2);
                  ?>
                  <select name="project_selsect" class="form-control" required>
                            <option value="" disabled selected hidden>choose project...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res))
                  {
                      ?>
                         <option value="<?=$row['project_id'];?>">
                                    <?=$row['project_name'];?>
                                </option>
                 <?php
                  }
                
                }?>

                        </select>

      </div>
      <button type="submit"   class="btn btn-default" name="porject_btn">add</button>
    </form>
  </div>
</div>