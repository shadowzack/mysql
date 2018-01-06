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
            <th>devolpemnt tools</th>
            <th>starting_time</th>
            <th>customer name</th>
            <th>product</th>
            <th>budget</th>
            <th>date</th>
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
                <?=$row['devolopment_tools'];?>
              </td>
              <td>
                <?=$row['starting_time'];?>
              </td>
              <td>
                <?=$row['customer_name'];?>
              </td>
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
                <?=$row['taoor']; ?>
              </td>
              <td>
                <a href="./?module=projects&page=info&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-primary">info</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=delete&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-warning">Delete</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=update&id=<?php echo $row['id'];?>">
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