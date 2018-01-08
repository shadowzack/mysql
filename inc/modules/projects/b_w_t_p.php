<?php
///////best and worst three projects 

?>
    <div class="row">
        <div class="col-xs-8">
            <h2>best three projects</h2>
        </div>

        <div class="col-xs-12">



            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>name</th>
                        <th>project id</th>
                        <th>average</th>
                        <th>actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $query="SELECT T.average,T.id,T.namee
            FROM (SELECT AVG(works.grade) AS average,works.project_id AS id,projects.project_name As namee
            FROM works
            INNER JOIN projects
            ON works.project_id=projects.project_id
           GROUP BY works.project_id 
           ORDER BY AVG(works.grade) DESC) AS T
           LIMIT 3";
           
           $results = mysqli_query($conn, $query);
           $count=mysqli_num_rows($results);
               
               
               if($results){
               

          
          while($row=mysqli_fetch_assoc($results))
         {


        ?>
                    <tr>
                    <td>
                            <?=$row["namee"]?>
                        </td>
                        <td>
                            <?=$row["id"]?>
                        </td>
                        <td>
                            <?=$row["average"]?>
                        </td>

                        <td>

                            <a href="./?module=projects&page=info&id=<?=$row["id"]?>">
                                <button type="button" class="btn btn-success">info</button>
                            </a>
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
        <div class="col-xs-8">
            <h2>worst three projects</h2>
        </div>

        <div class="col-xs-12">



            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>name</th>
                        <th>project id</th>
                        <th>average</th>
                        <th>actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $query="SELECT T.average,T.id,T.namee
            FROM (SELECT AVG(works.grade) AS average,works.project_id AS id,projects.project_name As namee
            FROM works
            INNER JOIN projects
            ON works.project_id=projects.project_id
           GROUP BY works.project_id 
           ORDER BY AVG(works.grade) ASC) AS T
           LIMIT 3";
           
           $results = mysqli_query($conn, $query);
           $count=mysqli_num_rows($results);
               
               
               if($results){
               

          
          while($row=mysqli_fetch_assoc($results))
         {


        ?>
                    <tr>
                    <td>
                            <?=$row["namee"]?>
                        </td>
                        <td>
                            <?=$row["id"]?>
                        </td>
                        <td>
                            <?=$row["average"]?>
                        </td>

                        <td>

                            <a href="./?module=projects&page=info&id=<?=$row["id"]?>">
                                <button type="button" class="btn btn-success">info</button>
                            </a>
                        </td>
                    </tr>
                    <?php
            
         }

        ?>



                </tbody>
            </table>
            </div>
    </div>
          
          
          
          
            <?php
}}else{
  include('inc/problem/no_results.php');
}
?>

       