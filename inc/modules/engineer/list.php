<?php

$query="SELECT * FROM engineer";
$results = mysqli_query($conn, $query);

?>
  <div class="row">
    <div class="col-xs-8">
      <h2>engineer List</h2>
    </div>
    <div class="col-xs-4">

      <a href="./?module=engineer&page=create">
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
            <th>firstname</th>
            <th>lastname</th>
            <th>address</th>
            <th>age</th>
            <th>birthdate</th>
            <th>field name</th>
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
                <?=$row['firstname'];?>
              </td>
              <td>
                <?=$row['lastname'];?>
              </td>
              <td>
                <?=$row['addresss'];?>
              </td>
              <td>
                <?=$row['age'];?>
              </td>
              <td>
                <?=$row['birthdate']; ?>
              </td>
             
              <?php
              $id=$row['id'];
              $sql="SELECT * FROM has WHERE id=$id";
              $res = mysqli_query($conn, $sql);
              
              if($res){
                
               $rows=mysqli_fetch_assoc($res);
              ?>
               <td>
                <?=$rows['field_name']; ?>
              </td>
              <?php
           }?>
              <td>
                <a href="./?module=engineer&page=info&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-primary">info</button>
                </a>
              </td>
              <td>
                <a href="./?module=engineer&page=delete&id=<?php echo $row['id'];?>">
                  <button type="button" class="btn btn-warning">Delete</button>
                </a>
              </td>
              <td>
                <a href="./?module=engineer&page=update&id=<?php echo $row['id'];?>">
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