<?php
if(isset($_POST['save'])){

    $result=1;
    $project_id = $_GET['id'];
    if(!empty($_POST['tests'])){
        $tests =$_POST['tests'];
        $result=mysqli_query($conn,"INSERT INTO development_stages (project_id, stage_name,tool_name)
        VALUES ($project_id,'tests','$tests')");
      }      
      if(!empty($_POST['unit_testing'])){
        $unit_testing=$_POST['unit_testing'];
        $result=mysqli_query($conn,"INSERT INTO development_stages (project_id, stage_name,tool_name)
        VALUES ($project_id,'unit_testing','$unit_testing')");
      }
      if(!empty($_POST['design'])){
        $design=$_POST['design'];
        $result= mysqli_query($conn,"INSERT INTO development_stages (project_id, stage_name,tool_name)
        VALUES ($project_id,'design','$design')");
      }
      if(!empty($_POST['con_management'])){
        $con_management=$_POST['con_management'];
        $result=mysqli_query($conn,"INSERT INTO development_stages (project_id, stage_name,tool_name)
        VALUES ($project_id,'con_management','$con_management')");
      }
      if(!empty($_POST['requirements'])){
        $requirements=$_POST['requirements'];
        $result= mysqli_query($conn,"INSERT INTO development_stages (project_id, stage_name,tool_name)
        VALUES ($project_id,'requirements','$requirements')");
      }
   
      if(!empty($_POST['coding'])){
        $coding=$_POST['coding'];
       $result= mysqli_query($conn,"INSERT INTO development_stages (project_id, stage_name,tool_name)
        VALUES ($project_id,'coding','$coding')");
      }
 
  
if($result){
?>
    <div class="alert alert-success">
        <strong>Success!</strong> project development_stages successfully added
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a>.
    </div>
    <?php
}else{

?>
    <div class="alert alert-danger">
        <strong>Error!</strong> error in adding project development_stages
        <a href="./?module=projects&page=info&id=<?=$_GET['id'];?>">click here</a> to retry.
    </div>
    <?php
}
die;
}
//}

?>

    <div class="row">
        <div class="col-xs-12">
            <h2>
                add new project development_stages
            </h2>
            <?php
            $sql="SELECT * FROM stages ORDER BY id";
            $res=mysqli_query($conn,$sql);
            $i=0;
        $arr=[];
            while ($row=mysqli_fetch_assoc($res)) {
                $arr[$i]=$row['stage_name'];
                $i++;
            }


            $sql="SELECT * FROM tools";
           $res_tool=mysqli_query($conn,$sql);
            ?>
                <form method="POST" action="./?module=projects&page=adddev&id=<?=$_GET['id'];?>">
                    <div class="form-group">
                        <label for="tests">
                            <?=$arr[0]?>:</label>
                        <select name="tests" class="form-control">
                            <option value="" disabled selected hidden>choose tool...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res_tool))
                  {
                      ?>
                                <option value="<?=$row['tool_name'];?>">
                                    <?=$row['tool_name'];?>
                                </option>
                                <?php
                  }
                  mysqli_data_seek( $res_tool, 0 );
                ?>

                        </select>
                        <!-- <input type="text" name="tests" class="form-control" required>-->
                    </div>
                    <div class="form-group">
                        <label for="unit_testing">
                            <?=$arr[1]?>:</label>
                        <select name="unit_testing" class="form-control">
                            <option value="" disabled selected hidden>choose tool...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res_tool))
                  {
                      ?>
                                <option value="<?=$row['tool_name'];?>">
                                    <?=$row['tool_name'];?>
                                </option>
                                <?php
                  }
                  mysqli_data_seek( $res_tool, 0 );
                ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="design">
                            <?=$arr[2]?>:</label>
                            <select name="design" class="form-control">
                            <option value="" disabled selected hidden>choose tool...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res_tool))
                  {
                      ?>
                                <option value="<?=$row['tool_name'];?>">
                                    <?=$row['tool_name'];?>
                                </option>
                                <?php
                  }
                  mysqli_data_seek( $res_tool, 0 );
                ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="con_management">
                            <?=$arr[3]?>:</label>
                            <select name="con_management" class="form-control">
                            <option value="" disabled selected hidden>choose tool...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res_tool))
                  {
                      ?>
                                <option value="<?=$row['tool_name'];?>">
                                    <?=$row['tool_name'];?>
                                </option>
                                <?php
                  }
                  mysqli_data_seek( $res_tool, 0 );
                ?>

                        </select>
                              </div>
                    <div class="form-group">
                        <label for="requirements">
                            <?=$arr[4]?>:</label>
                            <select name="requirements" class="form-control">
                            <option value="" disabled selected hidden>choose tool...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res_tool))
                  {
                      ?>
                                <option value="<?=$row['tool_name'];?>">
                                    <?=$row['tool_name'];?>
                                </option>
                                <?php
                  }
                  mysqli_data_seek( $res_tool, 0 );
                ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="coding">
                            <?=$arr[5]?>:</label>
                            <select name="coding" class="form-control">
                            <option value="" disabled selected hidden>choose tool...</option>
                            <?php
                  while($row=mysqli_fetch_assoc($res_tool))
                  {
                      ?>
                                <option value="<?=$row['tool_name'];?>">
                                    <?=$row['tool_name'];?>
                                </option>
                                <?php
                  }
                  mysqli_data_seek( $res_tool, 0 );
                ?>

                        </select>
                    </div>


        </div>
        <button type="submit" class="btn btn-default" name="save">Submit</button>
        </form>
    </div>
    </div>