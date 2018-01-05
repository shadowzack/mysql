<?php
if(isset($_POST['phone'])){
     
 //mysqli_autocommit($conn,FALSE);
 /* $sql="DELETE FROM phone WHERE phone=? AND id=?";
  $qury=$conn->prepare($sql);
  
    $phone=$_POST['phone'];
  $qury->bind_param("ii",$phone,$id);
  $result=$qury->execute();*/
  $phone=$_POST['phone'];
  $id=$_GET['id'];
//  $phone=$_POST['phone'];
$sql="DELETE FROM phone WHERE phone.phone'$phone' AND phone.id='$id' ";
$result=mysqli_query($conn,$sql);

if($result){
 // mysqli_commit($conn);

?>
  <div class="alert alert-success">
    <strong>Success!</strong> phone successfully deleted <a href="./?module=engineer&page=info&id=<?=$_GET['id'];?>">click here </a>
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
      delete phone number
    </h2>
    <form method="POST" action="./?module=engineer&page=deletephone&id=<?=$_GET['id']?>">

      <div class="form-group">
        <?php
        $id=$_GET['id'];
        $sql="SELECT phone FROM phone WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        ?>

         <table class="table table-striped">
        <thead>
          <tr>
            <th>phones</th>
          </tr>
        </thead>
        <tbody>
     
        <?php
        while($row=mysqli_fetch_assoc($res)){
          ?>
             <tr>
          <td>
                <?=$row['phone'];?>
              </td>

              <td>
              <!--  <a href="./?module=engineer&page=deletephone&id=<?php echo $row['phone'];?>">
                 --> <button type="submit"  name="phone" class="btn btn-warning">delete</button>
              <!--  </a>-->
              </td>
              </tr>
      
          <?php
          
        }
        ?>
    
      </tbody>
      </table>
    </div>

    


    </form>
  </div>
</div>
