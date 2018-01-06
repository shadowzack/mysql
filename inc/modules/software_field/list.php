<?php

$query="SELECT * FROM software_field";
$results = mysqli_query($conn, $query);

?>
  <div class="row">
    <div class="col-xs-8">
      <h2>software field List</h2>
    </div>
    <div class="col-xs-4">

      <a href="./?module=software_field&page=create">
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
            <th>field_name</th>
            <th>expertise</th>
          </tr>
        </thead>
        <tbody>
          <?php
     while($row=mysqli_fetch_assoc($results)){

?>
            <tr>
              <td>
                <?=$row['id'];?>
              </td>
              <td>
                <?=$row['field_name'];?>
              </td>
              <td>
                <?=$row['expertise'];?>
              </td>

<!--
              <td>
                <a href="./?module=software_field&page=info&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-primary">info</button>
                </a>
              </td>
              -->
              <td>
                <a href="./?module=software_field&page=delete&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-warning">Delete</button>
                </a>
              </td>
              <td>
                <a href="./?module=software_field&page=update&id=<?php echo $row['id'];?>">
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