<?php

include('config/db_connect.php');

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $Search = $_POST['search'];
    $sql = "SELECT * FROM recipes WHERE title LIKE '%".$Search."%' ";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
            echo '<a href="#" class="list-group list-group-item-action border p-2">'.$row['title'].'</a>';
        }
    } else {
        echo '<p class="list-group list-group-item"> Record not found </p>';
    }
}


