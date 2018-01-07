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
        <div class="col-xs-8" style="width:60%">
            <h2>
                <?=$rows[0]['project_name']?> info</h2>
        </div>

        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
            <a href="./?module=projects&page=addmilestones&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success pull-right">add milestones</button>
            </a>
            <a href="./?module=projects&page=adddev&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success">add devolepment stages</button>
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
                devolevment stages</h2>
        </div>

        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">

        </div>

        <div class="col-xs-12">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>tests</th>
                        <th>design</th>
                        <th>con_management</th>
                        <th>requirements</th>
                        <th>coding</th>
                    </tr>
                </thead>
                <tbody>




                    <tr>

                        <?php
                   $sql="SELECT *
                   FROM development_stages
                   WHERE project_id=$tmpid ";
                  $res=mysqli_query($conn,$sql);
                  if ($res) {
                  $count2=mysqli_num_rows($res);
                  while($data=mysqli_fetch_assoc($res))
                  {
                      ?>
                            <td>
                                <?=$data['tests'];?>

                            </td>
                            <td>
                                <?=$data['design'];?>
                            </td>
                            <td>
                                <?=$data['con_management'];?>
                            </td>
                            <td>
                                <?=$data['requirements'];?>
                            </td>
                            <td>
                                <?=$data['coding'];?>
                            </td>
                            <td>
                <a href="./?module=projects&page=updatedev&id=<?php echo $data['project_id'];?>">
                  <button type="button" class="btn btn-success">Edit</button>
                </a>
              </td>
              <td>
                <a href="./?module=projects&page=deletedev&id=<?php echo $data['project_id'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                            <?php
                  }
                
                }?>

                    </tr>
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
                    <tr>
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
                <a href="./?module=projects&page=updatemilestones&id=<?php echo $data['project_id'];?>">
                  <button type="button" class="btn btn-success">Edit</button>
                </a>
              </td>

              <td>
                <a href="./?module=projects&page=deletemilestones&id=<?php echo $data['project_id'];?>">
                  <button type="button" class="btn btn-warning">delete</button>
                </a>
              </td>
                            <?php
                  }
                
                }?>

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