<?php

$query="SELECT * FROM projects";
$results = mysqli_query($conn, $query);

?>
  <div class="row">
    <div class="col-xs-8">
      <h2>projects List</h2>
    </div>
    <div class="col-xs-4">

      <a href="./?module=projects&page=create">
        <button type="button" class="btn btn-success pull-right">create new</button>
      </a>
      <a href="./?module=projects&page=allprojects">
        <button type="button" class="btn btn-success pull-right">engineers that work in all projects</button>
      </a>
      <a href="./?module=projects&page=v_s_s_p">
        <button type="button" class="btn btn-success pull-right">view witch project uses spicfied devolpemnt stage</button>
      </a>
    </div>
    <div class="col-xs-12">

      <?php
if($results){
?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>project name</th>
            <th>starting_time</th>
            <th>customer name</th>
           
            <th>description</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
     while($row=mysqli_fetch_assoc($results)){
      
?>
            <tr>
              <td>
                <?=$row['project_id'];?>
              </td>
              <td>
                <?=$row['project_name'];?>
              </td>
              
              <td>
                <?=$row['starting_time'];?>
              </td>
              <td>
                <?=$row['customer_name'];?>
              </td>
              <td>
                <?=$row['taoor']; ?>
              </td>
              <!--
              <td>
                <?=$row['product']; ?>
              </td>
              <td>
                <?=$row['budget'];?>
              </td>
              <td>
                <?=$row['datee'];?>
              </td>
              
              <td>
                <?=$row['devolopment_tools'];?>
              </td>-->
              <td>
                <a href="./?module=projects&page=info&id=<?php echo $row['project_id'];?>">
                  <button type="button" class="btn btn-success">info</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=whoworkshere&id=<?php echo $row['project_id'];?>">
                  <button type="button" class="btn btn-primary">who works here</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=delete&id=<?php echo $row['project_id'];?>">
                  <button type="button" class="btn btn-warning">Delete</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=update&id=<?php echo $row['project_id'];?>">
                  <button type="button" class="btn btn-success">Edit</button>
                </a>
              </td>
             
            </tr>
            <?php
     }
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