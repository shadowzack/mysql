



<?php
if(isset($_GET['tool_id'])){
     
 //mysqli_autocommit($conn,FALSE);
 /* $sql="DELETE FROM tool WHERE tool=? AND id=?";
  $qury=$conn->prepare($sql);
  
    $tool=$_POST['tool'];
  $qury->bind_param("ii",$tool,$id);
  $result=$qury->execute();*/
  $tool_id=$_GET['tool_id'];
  $tool_name=$_GET['tool_name'];
//  $tool=$_POST['tool'];
$project_id=$_GET['id'];
mysqli_query($conn,"DROP TRIGGER before_delete_tool;");
$trigger=" CREATE TRIGGER before_delete_tool BEFORE DELETE ON tools 
FOR EACH ROW
BEGIN 
DELETE FROM development_stages WHERE tool_name='$tool_name';

END;
";
 $trigger_result=mysqli_query($conn,$trigger);
 if(!$trigger_result)
 {
      echo  mysqli_error($conn)."<br>";
 }
$sql="DELETE  FROM tools WHERE id='$tool_id' ";
$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo  mysqli_error($conn)."<br>";
}
if($result){
 // mysqli_commit($conn);
?>
  <div class="alert alert-success">
    <strong>Success!</strong> tool successfully deleted <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here </a>
  </div>
<?php
}
else
{ 
?>
  <div class="alert alert-error">
    <strong>error!</strong> error <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here </a>
  </div>
  <?php
 
 }

die;
}
?>


<div class="row">
  <div class="col-xs-12">
    <h2>
      delete tool number
    </h2>
    <!--<form method="POST" action="./?module=projects&page=deletetool&id=<?=$_GET['id']?>">-->

      <div class="form-group">
        <?php
        $sql="SELECT * FROM tools ";
        $res=mysqli_query($conn,$sql);
        ?>

         <table class="table table-striped">
        <thead>
          <tr>
            <th>tools</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
        while($row=mysqli_fetch_assoc($res)){
          ?>
             <tr>
          <td>
                <?=$row['tool_name'];?>
              </td>

             

              <td>
            
                <a href="./?module=projects&page=deletetool&id=<?=$_GET['id']?>&tool_id=<?=$row['id']?>&tool_name=<?=$row['tool_name'];?>">
                 <button   name="tool_btn" class="btn btn-warning">delete</button>
                </a>
              </td>
              </tr>
      
          <?php
          
        }
        ?>
    
      </tbody>
      </table>
    </div>

    


    <!--</form>-->
  </div>
</div>
