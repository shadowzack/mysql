<?php
$tmpid=$_GET['id'];
 $sql="SELECT engineer.firstname, engineer.lastname,engineer.addresss,engineer.age,engineer.birthdate, phone.phone
 FROM engineer
 LEFT JOIN phone
 ON engineer.id=phone.id
 where engineer.id=$tmpid
";
$result=mysqli_query($conn,$sql);
if ($result) {
  

$count=mysqli_num_rows($result);
while($data=mysqli_fetch_assoc($result)) $rows[]=$data;
?>
    <div class="row">
        <div class="col-xs-8" style="width:60%">
            <h2>
                <?=$rows[0]['firstname'];?>
                    <?=$rows[0]['lastname']?> info</h2>
        </div>

        <div class="col-xs-4" style="display:flex;flex-direction: row-reverse;justify-content: space-around;width:40%;">
            <a href="./?module=engineer&page=addphone&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success pull-right">add phone</button>
            </a>
            <a href="./?module=engineer&page=deletephone&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-warning">delete phone</button>
            </a>
            <a href="./?module=engineer&page=addproject&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-success">add project</button>
            </a>
            <a href="./?module=engineer&page=deleteproject&id=<?=$_GET['id'];?>">
                <button type="button" class="btn btn-warning pull-right">delete project</button>
            </a>
            
        </div>

        <div class="col-xs-12">

            <?php
if($count>0){
?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Age</th>
                        <th>birthdate</th>
                        <th>address</th>
                        <th>field name</th>
                        <th>Phones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
?>



                    <tr>

                        <!--  <td><?=$diff?></td>-->
                        <td>
                            <?=$rows[0]['age'];?>
                        </td>
                        <td>
                            <?=$rows[0]['birthdate'];?>
                        </td>
                        <td>
                            <?=$rows[0]['addresss'];?>
                        </td>

                        <?php
                            $id=$tmpid;
                            $sql2="SELECT * FROM has WHERE id=$id";
                            $res2 = mysqli_query($conn, $sql2);
                            
                            if($res2){
                              
                             $rows2=mysqli_fetch_assoc($res2);
                            ?>
                            <td>
                                <?=$rows2['field_name']; ?>
                            </td>
                            <?php
                         }?>

                                <?php
                            
                            for($i=0 ; $i<mysqli_num_rows ($result ) ; $i++ )
                            {
                                ?>


                                    <td>
                                        <?=$rows[$i]['phone'];?>
                                            <td>
                                                <?php
                            }
                            ?>




                    </tr>
                    <?php
     }
     ?>






                </tbody>
                <tr style="border-top:4px solid black;">
                    <th>PROJECTS</th>

                </tr>

                <tr class="inforows" style="border-bottom: 2px solid #ddd;">

                    <?php
                   $sql="SELECT projects.project_name,works.engineer_id
                   FROM projects
                   INNER JOIN works
                   ON projects.project_id=works.project_id
                   WHERE engineer_id=$tmpid ";
                  $res=mysqli_query($conn,$sql);
                  if ($res) {
                  $count2=mysqli_num_rows($res);
                  while($data=mysqli_fetch_assoc($res))
                  {
                      ?>
                        <td>
                            <?=$data['project_name'];?>
                         <td>
                 <?php
                  }
                
                }?>

                </tr>
            </table>
            <?php
}else{
  include('inc/problem/no_results.php');
}
?>

        </div>
    </div>
    <style>
        .inforows td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }
    </style>