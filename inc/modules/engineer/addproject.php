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
                   $sql="SELECT projects.project_name,projects.project_id
                   FROM projects 
                   WHERE projects.project_id  NOT IN (SELECT  projects.project_id
                   FROM projects
                   INNER JOIN works
                   ON projects.project_id=works.project_id
                   WHERE  engineer_id=$tmpid
                   GROUP BY projects.project_name)
                ";
                 /*  $sql="SELECT projects.project_name,projects.project_id
                   FROM projects
                   INNER JOIN (SELECT projects.project_name,projects.project_id AS id
                   FROM projects
                   INNER JOIN works
                   ON projects.project_id!=works.project_id
                   WHERE engineer_id=$tmpid
                   GROUP BY id)AS T
                   ON project_id=T.id
                    ";*/
                  $res=mysqli_query($conn,$sql);
                  if(!$res)
                {
echo  mysqli_error($conn)."<br>";
}
                  if ($res) {
                  $count2=mysqli_num_rows($res);
                  if ($count2==0) {
                    echo "<h2>"."this engineer already works on all projects"."</h2>";
                  }
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


<?php 

/*
   $tmpid=$_GET['id'] ;
                   $sql="SELECT  projects.project_name,works.engineer_id,projects.project_id
                   FROM projects
                   INNER JOIN works
                   ON projects.project_id=works.project_id
                   WHERE  engineer_id!=$tmpid";
                   $sql2="SELECT project_name,project_id
                   FROM projects
                  ";
                   $sql="SELECT DISTINCT  T.project_name,T.pid,engineer_id FROM(SELECT project_name ,project_id AS pid
                   FROM projects) AS T
                   INNER JOIN works
                   ON T.pid=works.project_id
                   WHERE works.engineer_id=$tmpid
                    ";
                  $res=mysqli_query($conn,$sql);
                
                  $res2=mysqli_query($conn,$sql2);

                  $count2=mysqli_num_rows($res);
                  echo($count2);
                  if ($res) {
                    $myarr=[];
                    $i=0;
                
                    while($row=mysqli_fetch_assoc($res))
                    {
                      $myarr[$i]=$row['project_name'];
                      $i++;
                      echo $row['project_name'];
                    }
                    $mainarr=[];
                    $mainarrkey=[];
                    $f=0;
                    
                    while($row=mysqli_fetch_assoc($res2))
                    {
                     // foreach($row as $key => $var)
 // {
  //echo $row['project_name'];
    //  echo $key . ' = ' . $var . '<br />';
    
   for ($z=0; $z < $i; $z++) { 
    
     if (!array_search($row['project_name'],$myarr)) {
     
     if (!array_search($row['project_name'],$mainarr)) {
       $mainarr[$f]=$row['project_name'];
       $mainarrkey=[$f]=$row['project_id'];
       $f++;
     }
     }
   }

  //}
}
for ($l=0; $l < $f; $l++) { 
 echo $mainarr[$l];
 echo $mainarrkey[$l];
 echo "<br>";
}






















 $c=0;
                              $sqll="SELECT projects.project_name,works.engineer_id,projects.project_id,works.grade
                              FROM projects
                              INNER JOIN works
                              ON projects.project_id=works.project_id
                              WHERE engineer_id=$tmpid ";
                             $res2=mysqli_query($conn,$sqll);
                  while($row=mysqli_fetch_assoc($res))
                  {
                        while ($row2=mysqli_fetch_assoc($res2)) {
                          if ($row2['project_id']!=$row['project_id']) {
                            $c++;
                          }
                        }
                        mysqli_data_seek($res2, 0);
                        if ($c>0) {
                          $c=0;
                        
                      ?>
                         <option value="<?=$row['project_id'];?>">
                                    <?=$row['project_name'];?>
                                </option>
                 <?php
                        }
                  }
                
*/
?>