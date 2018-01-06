<?php
if(isset($_POST['delete_btn'])){
     

  $project_id=$_POST['project_id'];

  $id=$_GET['id'];

//  $project_id=$_POST['project_id'];
$sql="DELETE FROM works WHERE project_id='$project_id' AND engineer_id='$id' ";
$result=mysqli_query($conn,$sql);

if($result){
 // mysqli_commit($conn);

?>
  <div class="alert alert-success">
    <strong>Success!</strong> project successfully deleted <a href="./?module=engineer&page=info&id=<?=$_GET['id'];?>">click here </a>
  </div>
<?php
}
else
{ 
?>
  <div class="alert alert-error">
    <strong>error!</strong> error <a href="./?module=engineer&page=info&id=<?=$_GET['id'];?>">click here </a>
  </div>
  <?php
 
 }

die;
}
?>


<div class="row">
  <div class="col-xs-12">
    <h2>
      delete project_id number
    </h2>
    <form method="POST" action="./?module=engineer&page=deleteproject&id=<?=$_GET['id']?>">

      <div class="form-group">
        <?php
        $id=$_GET['id'];
        $sql="SELECT projects.project_name,works.engineer_id,projects.project_id
        FROM projects
        INNER JOIN works
        ON projects.project_id=works.project_id
        WHERE engineer_id=$id ";
       $res=mysqli_query($conn,$sql);
       if ($res) {
       $count2=mysqli_num_rows($res);
      ?>
        

         <table class="table table-striped">
        <thead>
          <tr>
            <th>projects</th>
            <th>projects id</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
        while($row=mysqli_fetch_assoc($res)){
          ?>
             <tr>
          <td>
                <?=$row['project_name'];?>
              </td>
            <td name="">
            <input type="hidden" name="project_id" value=" <?=$row['project_id']?>">
            <?=$row['project_id']?>
            </td>
              <td>
             
                 <button type="submit"  name="delete_btn" class="btn btn-warning">delete</button>
              
              </td>
              </tr>
      
          <?php
          
        
        }
    }

        ?>
    
      </tbody>
      </table>
    </div>

    


    </form>
  </div>
</div>
