<?php

$query="SELECT * FROM projects";
$results = mysqli_query($conn, $query);
$count=mysqli_num_rows($results);
?>
  <div class="row">
    <div class="col-xs-8">
      <h2>engineers who worked on all projects</h2>
    </div>
  <!--  <div class="col-xs-4">

      <a href="./?module=projects&page=create">
        <button type="button" class="btn btn-success pull-right">create new</button>
      </a>
      <a href="./?module=projects&page=allprojects">
        <button type="button" class="btn btn-success pull-right">engineers that work in all projects</button>
      </a>
      <a href="./?module=projects&page=create">
        <button type="button" class="btn btn-success pull-right">create new</button>
      </a>
    </div>-->
    <div class="col-xs-12">

      <?php
if($results){
?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>engineers id</th>
            <th>engineers name</th>
            <th>actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
        $sql="SELECT id,firstname FROM engineer";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
         {
             $tmpid=$row['id'];
            $sql2="SELECT works.project_id
            FROM works
            WHERE engineer_id=$tmpid ";
             $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if ($count==$count2) {
                ?>
                <tr>
                <td>
                <?=$row["id"]?>
                </td>
                <td>
                <?=$row["firstname"]?>
                </td>
                <td>
                
                <a href="./?module=engineer&page=info&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-success">info</button>
                </a>
              </td>
              </tr>
                <?php
            }
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