<?php 

include('config/db_connect.php');
    // if(isset($_GET['submit'])){
    //     echo $_GET['directions'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    $title = $ingredients = $directions = $protein = $course ='';     

    $errors = array('directions'=>'', 'title'=>'', 'ingredients'=>'', 'protein'=>'', 'course'=>'');



    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['directions']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);

        //check directions
        if(empty($_POST['directions'])){
            $errors['directions'] = '**Directions are require** <br />';
        } else {
           $directions = $_POST['directions'];
           if(!preg_match('/^[0-9a-zA-Z\s\.\,\!\']+$/', $directions)){
            $errors['directions'] = '**directions must be letters and spaces only**';
           }
        }

        //check protein
        if(empty($_POST['protein'])){
            $errors['protein'] = '**A protein type is required** <br />';
        } else {
           $protein = $_POST['protein'];
           if(!preg_match('/^[a-zA-Z\s]+$/', $protein)){
            $errors['protein'] = '**protein must be letters and spaces only**';
           }
        }

        //check course
        if(empty($_POST['course'])){
            $errors['course'] = '**A course description is required** <br />';
        } else {
           $course = $_POST['course'];
           if(!preg_match('/^[a-zA-Z\s]+$/', $course)){
            $errors['course'] = '**course must be letters and spaces only**';
           }
        }

        //check title
                            
        if(empty($_POST['title'])){
            $errors['title'] = '**A title is required** <br />';
        } 
        else{
            $title = $_POST['title'];
            $query = "SELECT * FROM `recipes` WHERE `title` = '".$title."' ";
            $result = mysqli_query($conn,$query);
            if( mysqli_num_rows ( $result ) > 0)
            { $errors['title'] = '**title is alreay in use**'; }

            if(!preg_match('/^[A-Za-z\s\'\.\,\!0-9]+$/', $title)){
                $errors['title'] = '**title must be letters and spaces only**';
               }    
        } 

        //check ingredients
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = '**Ingredients are required** <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([0-9a-zA-Z\s]+)(,\s*[0-9a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = '**Ingredients must be a comma seperated list**';
            }
        }

        if(array_filter($errors)){
            //echo 'errors in the form';
        } else {

            $directions = mysqli_real_escape_string($conn, $_POST['directions']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
            $protein = mysqli_real_escape_string($conn, $_POST['protein']);
            $course = mysqli_real_escape_string($conn,$_POST['course']);

            // create sql
            $sql = "INSERT INTO recipes(title,directions,ingredients,protein,course) VALUES('$title', '$directions', '$ingredients', '$protein', '$course')";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                //success
                header('Location: index.php');

            } else {
                // error
                echo 'query error: ' . mysqli_error($conn);
            }
        }

    }
    //end of POST check
?>



<!DOCTYPE html>
<html lang="en">

   <?php include('templates/header.php'); ?>   

           <div class="gbag-blur-img container"> </div>
                    
        <form class="form-group" id="form-id" action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
        <h4 class='text-center'>Add Recipe</h4>
        <label>Recipe Title:</label>
        <input class="form-control" type="text" name='title' value="<?php echo htmlspecialchars($title) ?>">
        <div class="text-primary"><?php echo $errors['title']; ?></div>
        <label>Ingredients (comma seperated):</label>
        <textarea class="form-control" rows="5" type="text" name='ingredients' ><?php echo htmlspecialchars($ingredients) ?></textarea>
        <div class="text-primary"><?php echo $errors['ingredients']; ?></div>
        <label>Recipe Directions:</label>
        <textarea class="form-control" rows="5" type="text" name='directions'><?php echo htmlspecialchars($directions) ?></textarea>
        <div class="text-primary"><?php echo $errors['directions']; ?></div>
        <label>Protein type:</label>
        <input class="form-control" type="text" name='protein' value="<?php echo htmlspecialchars($protein) ?>">
        <div class="text-primary"><?php echo $errors['protein']; ?></div>
        <label>Course:</label>
        <input class="form-control" type="text" name='course' value="<?php echo htmlspecialchars($course) ?>">
        <div class="text-primary"><?php echo $errors['course']; ?></div>
        <br>
         <div class="center">
            <input type="submit" name='submit' value='submit' class='btn btn-primary'>
        </div>        
        </form>
   <?php include('templates/footer.php'); ?>

</html>