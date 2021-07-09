<?php 

include('config/db_connect.php');
include('searchOutput.php');

if(isset($_POST['delete'])){

    $title_to_delete = mysqli_real_escape_string($conn, $_POST['title_to_delete']);

    $sql = "DELETE FROM recipes WHERE title = '$title_to_delete'";

    if(mysqli_query($conn, $sql)){
        //success
        header('Location: index.php');
    } {
        //failure
        echo 'query error: ' . mysqli_error($conn);
    }

}


$title = $ingredients = $directions = $protein = $course ='';

    
$result= mysqli_query($conn, "SELECT * FROM recipes WHERE title='$title' ");

?>




<?php include('templates/header.php'); ?>

    <div class="gbag ">
        <br>
   <h4 class="text-center">Recipes</h4>

    <div class="container">
        <form action="" method="POST">
        <div class="card-body">
            <input class="form-control" id="search" autocomplete="off" name="title" placeholder="Enter Recipe Title" />
            
            
            <div class="list-group list-group-item-action bg-light" id="content">
                
            </div>
        </div>
            
            <br><br>
            
            <input type="submit" name="search" value="SEARCH BY TITLE" >
        </form>
    </div>

   <div class="container">
      
      <div class="row">
        <?php



        //pull up ingredients and directions by entering the title
        if(isset($_POST['search']))
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
                        <div class="card-action right-align">

                        
                            </div>
                </div>
            </div>
</div>
            <?php
            }
        }
        
        ?>   
           
      </div> 
   </div>
<!--  jQuery and ajax -->
<script>
        $(document).ready(function() {
                    
            $('#search').keyup(function(){
                var Search = $('#search').val();
                if(Search!=""){
                    $.ajax(
                        {
                            url: 'searchOutput.php',
                            method: "POST",
                            data:{search:Search},
                            success:function (data) {
                                $('#content').html(data);
                            }
                        })
                }
                else
                {
                    $('#content').html("");
                }

                $(document).on('click', 'a', function(){
                    $('#search').val($(this).text());
                    $('#content').html('');
                })
            })
            
            
                    });
                
    
       </script>    
   
   <?php include('templates/footer.php'); ?>