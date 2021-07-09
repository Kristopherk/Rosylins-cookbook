<?php 

include('config/db_connect.php');
    if(count($_POST)>0){
        mysqli_query($conn,"UPDATE recipes set title='" . $_POST['title'] . "',
    ingredients='" . $_POST['ingredients'] .  "',
    directions='" . $_POST['directions'] . "',
    protein='" . $_POST['protein'] . "',
    course='" . $_POST['course'] . "' WHERE title='" . $_POST['title'] . "'" );
    $message = "<p style='color:white;'>Record updated successfully!</p>";
    }

    $result = mysqli_query($conn, "SELECT * FROM recipes WHERE title='" . $_GET['title'] . "'");
    $row= mysqli_fetch_array($result);
   
     
?>



<!DOCTYPE html>
<html lang="en">

   <?php include('templates/header.php'); ?>   

           <div class="gbag-blur-img container"> </div>
                    
        <form class="form-group" name="update-form" id="form-update" action="" method='POST'>
            <div class="text-center bg-success"><?php if(isset($message)) {echo $message; } ?>
            </div>

        <h4 class='text-center'>Edit Recipe</h4>

        <label>Recipe Title:</label>
        <input class="form-control" type="text" name='title' value="<?php echo $row['title']; ?>">
       
        <label>Ingredients (comma seperated):</label>
        <textarea class="form-control" rows="5" type="text" name='ingredients' ><?php echo $row['ingredients']; ?></textarea>
      
        <label>Recipe Directions:</label>
        <textarea class="form-control" rows="5" type="text" name='directions'><?php echo $row['directions']; ?></textarea>
        
        <label>Protein type:</label>
        <input class="form-control" type="text" name='protein' value="<?php echo $row['protein']; ?>">
       
        <label>Course:</label>
        <input class="form-control" type="text" name='course' value="<?php echo $row['course']; ?>">
        
        <br>
         <div class="center">
            <input type="submit" name='submit' value='submit' class='btn btn-primary'>
        </div>        
        </form>
   <?php include('templates/footer.php'); ?>

</html>