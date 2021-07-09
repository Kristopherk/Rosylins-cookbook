<?php 

include('config/db_connect.php');

//write query for all recipes
$sql = 'SELECT title FROM recipes ORDER BY title';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free results from memory 
mysqli_free_result($result);

//close connection
mysqli_close($conn);

// explode(',', $pizzas[0]['ingredients']);

//print_r($recipes);
?>




<!DOCTYPE html>
<html lang="en">

   <?php include('templates/header.php'); ?>

   
   <br><br><br>

         <div class="container">
      
      <div class="row">
        <?php

      include('config/db_connect.php');

        //pull up ingredients and directions by entering the title
        if(isset($_POST['title']))
        {
            $title = $_POST['title'];

            $query = "SELECT * FROM `recipes` WHERE title='$title' ";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($query_run))
            {
                ?>
            <div class="col s6 md6 lg10">

<div class="card bg-secondary shadow-lg rounded s6 md6 lg10">
        <img src="img/RR.jpg" class="r-icon mx-auto rounded">
    <div class="card-content center z-depth-0 bg-secondary">
<div class='bg-secondary'>
    <button id="editButton" type="button" class="btn btn-warning"><a href="edit_form.php?title=<?php echo $row['title']; ?>">Edit this recipe</a></button>
    <br><br>
    <input type='button' id="formButton" class="btn btn-warning text-primary" value="Delete this recipe"> </input> <br><br>
            </div>
            <form id="form1" action="index.php" method="POST" class="bg-secondary right-align">
                <h4 class="text-center text-primary">***Are you sure that you want to delete this recipe??***</h4><br>
                
                <button id="noDelete" type="button" class="btn btn-success">Do not delete!</button><br><br>
                
                <input type="hidden" name="title_to_delete" value="<?php echo $row['title'] ?>">
                <input type="submit" name="delete" value="Yes, delete <?php echo $row['title'] ?>" class="btn btn-primary">
                
            </form>
    <h4 class="text-center bg-secondary"><?php echo $row['title']; ?></h4>
        <ul class="list-group">
        
        <?php foreach(explode(',', $row['ingredients']) as $ing ): ?>
            <li class="list-group-item text-center bg-light" > <?php echo htmlspecialchars($ing); ?></li>
        <?php endforeach; ?>
        <h4 class="text-center">Directions:</h4><br>
        <li class="list-group-item text-justify bg-light"> <?php echo $row['directions'] ?></li>

        </ul>
    </div>
    
<div>
        <div class="card-action right-align">

        
            </div>
</div>
</div>

</div>
            <?php
            }
        }
        
        ?>   
           
     

         <!-- formula end -->

            </div>
      </div>
   </div>
   
   

   <?php include('templates/footer.php'); ?>

</html>
