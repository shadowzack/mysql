<?php
$tmpid=$_GET['id'];
 $sql="SELECT projects.project_id, projects.project_name,projects.starting_time,projects.customer_name,
 projects.taoor
 FROM projects
 where projects.project_id=$tmpid
";
$result=mysqli_query($conn,$sql);
if ($result) {
  

$count=mysqli_num_rows($result);
while($data=mysqli_fetch_assoc($result)) $rows[]=$data;
?>
    <div class="row">
        <div class="col-xs-8" style="width:40%">
            <h2>
                <?=$rows[0]['project_name']?> info</h2>
        </div>

        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:60%;">
            <a href="./?module=projects&page=addmilestones&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success pull-right">add milestones</button>
            </a>
            <a href="./?module=projects&page=adddev&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success">add devolepment stages tools</button>
            </a>
            <a href="./?module=projects&page=addtool&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success">add new tools</button>
            </a>
            <a href="./?module=projects&page=deletetool&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success">delete tools</button>
            </a>

        </div>

        <div class="col-xs-12">

            <?php
if($count>0){
?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>project_id</th>
                        <th>starting_time</th>
                        <th>customer_name</th>
                        <th>taoor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
?>



                    <tr>

                        <!--  <td><?=$diff?></td>-->
                        <td>
                            <?=$rows[0]['project_id'];?>
                        </td>
                        <td>
                            <?=$rows[0]['starting_time'];?>
                        </td>
                        <td>
                            <?=$rows[0]['customer_name'];?>
                        </td>
                        <td>
                            <?=$rows[0]['taoor'];?>
                        </td>


                    </tr>
                    <?php
     }
     ?>






                </tbody>

            </table>
        </div>
    </div>




 


    <div class="row">
        <div class="col-xs-8" style="width:60%">
            <h2>
                milestones</h2>
        </div>

        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">

        </div>

        <div class="col-xs-12">

            <table class="table table-striped">
                <thead>
                    <tr >
                        <th>product_name</th>
                        <th>budget</th>
                        <th>datee</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <?php
                   $sql="SELECT *
                   FROM milestones
                   WHERE project_id=$tmpid ";
                  $res=mysqli_query($conn,$sql);
                  if ($res) {
                  $count2=mysqli_num_rows($res);
                  while($data=mysqli_fetch_assoc($res))
                  {
                      ?>
                            <tr>
                                <td>
                                    <?=$data['product_name'];?>

                                </td>
                                <td>
                                    <?=$data['budget'];?>
                                </td>
                                <td>
                                    <?=$data['datee'];?>
                                </td>
                                <td>
                                    <a href="./?module=projects&page=updatemilestones&id=<?php echo $data['project_id'];?>&id_main=<?php echo $data['id'];?>">
                                        <button type="button" class="btn btn-success">Edit</button>
                                    </a>
                                </td>

                                <td>

                                    <a href="./?module=projects&page=deletemilestones&id=<?php echo $data['project_id'];?>&id_main=<?php echo $data['id'];?>">
                                        <button type="button" class="btn btn-warning">delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                  }
                
                }?>

                    </tr>
                </tbody>
            </table>

        </div>
    </div>




                            <!--    <td>
                <a href="./?module=projects&page=updatedev&id=<?php echo $data['project_id'];?>">
                  <button type="button" class="btn btn-success">Edit</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $data['project_id'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>-->

<style>

tr th{font-size:20px;}
.hhh td{width:50%}
</style>

    <div class="row" style="">
        <div class="col-xs-8" style="width:60%">
        <h2>
                devolevment stages</h2>
        </div>
        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
        </div>
        <div class="col-xs-12">
            <table class="table table-striped">
                    <thead>
                        <tr >
                            <th style="font-size:23px;">tests</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                      $sql="SELECT *
                      FROM development_stages
                      WHERE project_id=$tmpid";
                     $res=mysqli_query($conn,$sql);
                     if ($res) {
                  while($data=mysqli_fetch_assoc($res))
                  {   if ($data['stage_name']=="tests") {
                      ?>
                        <tr class="hhh">
                                <td>
                                    <?php 
                               
                                  echo $data['tool_name'];
                                
                                ?>

                                </td>
                                <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $tmpid;?>&stage=<?php echo $data['stage_name'];?>&tool=<?php echo $data['tool_name'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                                </tr>
                                    <?php 
                  }
               }} ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>

                    <div class="row" style="">
        <div class="col-xs-8" style="width:60%">
        </div>
        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
        </div>
        <div class="col-xs-12">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>unit_testing</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                    mysqli_data_seek( $res, 0 );
                  while($data=mysqli_fetch_assoc($res))
                  {   if ($data['stage_name']=="unit_testing") {
                      ?>
                    <tr class="hhh">
                                <td>
                                    <?php 
                               
                                  echo $data['tool_name'];
                                
                                ?>

                                </td>
                                <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $tmpid;?>&stage=<?php echo $data['stage_name'];?>&tool=<?php echo $data['tool_name'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                                </tr>
                                    <?php 
                  }
               } ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>







<!--degin info -->
<div class="row" style="">
        <div class="col-xs-8" style="width:60%">
        </div>
        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
        </div>
        <div class="col-xs-12">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>design</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                    mysqli_data_seek( $res, 0 );
                  while($data=mysqli_fetch_assoc($res))
                  {   if ($data['stage_name']=="design") {
                      ?>
                       <tr class="hhh">
                                <td>
                                    <?php 
                               
                                  echo $data['tool_name'];
                                
                                ?>

                                </td>
                                <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $tmpid;?>&stage=<?php echo $data['stage_name'];?>&tool=<?php echo $data['tool_name'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                                </tr>
                                    <?php 
                  }
               } ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>



<!--con_management info -->
<div class="row" style="">
        <div class="col-xs-8" style="width:60%">
        </div>
        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
        </div>
        <div class="col-xs-12">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>con_management</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                    mysqli_data_seek( $res, 0 );
                  while($data=mysqli_fetch_assoc($res))
                  {   if ($data['stage_name']=="con_management") {
                      ?>
                       <tr class="hhh">
                                <td>
                                    <?php 
                               
                                  echo $data['tool_name'];
                                
                                ?>

                                </td>
                                <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $tmpid;?>&stage=<?php echo $data['stage_name'];?>&tool=<?php echo $data['tool_name'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                                </tr>
                                    <?php 
                  }
               } ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>






<!--requirements info -->
<div class="row" style="">
        <div class="col-xs-8" style="width:60%">
        </div>
        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
        </div>
        <div class="col-xs-12">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>requirements</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                    mysqli_data_seek( $res, 0 );
                  while($data=mysqli_fetch_assoc($res))
                  {   if ($data['stage_name']=="requirements") {
                      ?>
                       <tr class="hhh">
                                <td>
                                    <?php 
                               
                                  echo $data['tool_name'];
                                
                                ?>

                                </td>
                                <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $tmpid;?>&stage=<?php echo $data['stage_name'];?>&tool=<?php echo $data['tool_name'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                                </tr>
                                    <?php 
                  }
               } ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>





<!--coding info -->
<div class="row" style="">
        <div class="col-xs-8" style="width:60%">
        </div>
        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
        </div>
        <div class="col-xs-12">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>coding</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                    mysqli_data_seek( $res, 0 );
                  while($data=mysqli_fetch_assoc($res))
                  {   if ($data['stage_name']=="coding") {
                      ?>
                      <tr class="hhh">
                                <td>
                                    <?php 
                               
                                  echo $data['tool_name'];
                                
                                ?>

                                </td>
                                <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $tmpid;?>&stage=<?php echo $data['stage_name'];?>&tool=<?php echo $data['tool_name'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                                </tr>
                                    <?php 
                  }
               } ?>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>












    <?php
}else{
  include('inc/problem/no_results.php');
}
?>
        <style>
            .inforows td {
                padding: 8px;
                line-height: 1.42857143;
                vertical-align: top;
                border-top: 1px solid #ddd;
            }
        </style>