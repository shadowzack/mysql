<?php
//v_s_s_p= view spesfic stage abon all projects



?>
  <div class="row">
    <div class="col-xs-8">
      <h2></h2>
    </div>
    <div class="col-xs-4">

<?php
/*
$query="SELECT development_stages.tests,development_stages.design,development_stages.coding
development_stages.con_management,development_stages.requirements
 FROM development_stages";
$res = mysqli_query($conn, $query);
    if ($res) {
        $count2=mysqli_num_fields($res);
        echo($count2);
        */?>
        <form action="./?module=projects&page=v_s_s_p" method="post">
        <select name="dev_select" class="form-control" onchange="this.form.submit()" required>
                  <option value="" disabled selected hidden>choose stage...</option>
             
               <option value="tests">
                          tests
                      </option>
                           
               <option value="unit_testing">
                          unit testing
                      </option>
                      <option value="design">
                          design
                      </option>
                      <option value="coding">
                          coding
                      </option>
                      <option value="con_management">
                          con_management
                      </option>
                      <option value="requirements">
                          requirements
                      </option>
    

      </select>
      </form>
    </div>
    <div class="col-xs-12">



      <table class="table table-striped">
        <thead>
          <tr>
          <th>project name</th>
            <th>id</th>
            <th><?php
            
            if(isset($_POST['dev_select'])){
            echo $_POST['dev_select'];}?></th>
          </tr>
        </thead>
        <tbody>
<?php
        if(isset($_POST['dev_select'])){

//echo $_POST['dev_select'];
$tmp=$_POST['dev_select'];
$query="SELECT development_stages.project_id,projects.project_name,development_stages.stage_name,development_stages.tool_name FROM development_stages
 INNER JOIN projects
  ON development_stages.project_id=projects.project_id
  WHERE development_stages.stage_name='$tmp'
  ORDER BY project_id
";
$res = mysqli_query($conn, $query);
if(!$res)
{
echo mysqli_error($conn)."<br>";
}
if ($res) {
   // $sql="SELECT project_name FROM projects WHERE projects.project_id="
   $last_elm=0;
   while($row=mysqli_fetch_assoc($res)){
      
    if ($last_elm==$row['project_id']) {
      ?>
      <tr>
                <td>
                   
                  </td>
                <td>
                   
                  </td>
                  
                  <td>
                    <?=$row['tool_name'];?>
                  </td>
                </tr>
      <?php
    }else{
    ?>
                <tr style="border-top:4px solid gray">
                <td>
                    <?=$row['project_name'];?>
                  </td>
                <td>
                    <?=$row['project_id'];?>
                  </td>
                  
                  <td>
                    <?=$row['tool_name'];?>
                  </td>
                </tr>
                  <?php

    }
$last_elm=$row['project_id'];
}
}
  }  ?>      
 

        </tbody>
      </table>
      <?php/*
}else{
  include('inc/problem/no_results.php');
}*/
?>

    </div>
  </div>