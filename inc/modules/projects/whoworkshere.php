<?php

$query="SELECT * FROM projects";
$results = mysqli_query($conn, $query);
$count=mysqli_num_rows($results);
?>
  <div class="row">
    <div class="col-xs-8">
      <h2>engineers who worked on this project</h2>
    </div>

    <div class="col-xs-12">

      <?php
if($results){
?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>engineers id</th>
            <th>engineers fields</th>
            <th>projecct id</th>
          </tr>
        </thead>
        <tbody>
          <?php
      /*  $sql="SELECT  engineer.id, has.field_name
        FROM    engineer   
        INNER JOIN has 
           ON engineer.id=has.id
           
        ";*/
    $tmp=$_GET['id'];
    /* $sql2="SELECT works.engineer_id,works.project_id,has.field_name
     FROM has
     INNER JOIN works
     ON has.id=works.engineer_id
     WHERE project_id=$tmp
     ORDER BY field_name ASC";*/
     $sql2="SELECT works.engineer_id,works.project_id,has.field_name
     FROM has
     INNER JOIN works
     ON has.id=works.engineer_id
     WHERE project_id IN(SELECT works.project_id
     FROM works
     WHERE works.project_id=$tmp)
     ORDER BY field_name ASC";

        $res=mysqli_query($conn,$sql2);
        //echo(mysqli_num_rows($res));
        while($row=mysqli_fetch_assoc($res))
         {
            
           
                ?>
                <tr>
                <td>
                <?=$row["engineer_id"]?>
                </td>
                <td>
                <?=$row["field_name"]?>
                </td>
                <td>
                <?=$row["project_id"]?>
                </td>
                <td>
                
                <a href="./?module=engineer&page=info&id=<?php echo $row['engineer_id'];?>">
                  <button type="button" class="btn btn-success">info</button>
                </a>
              </td>
              </tr>
                <?php
            
         }
         
          
        ?>
       
            <?php
     
     ?>

        </tbody>
      </table>
      <?php
}else{
  include('inc/problem/no_results.php');
}
?>

    </div>
  </div>