
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosylin's Cookbook</title>

<script type='text/javascript'src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap5 CSS -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script> 
  
    <!-- Bootstrap5 JavaScript -->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type='text/css'>
    
        body{
            height: 200px;

        }

        form{
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
        }
        .rclogo{
            float: left;
            height: 125px;
            padding-left: 175px;
            padding-top: 10px;

        }

        .r-icon{
            width: 100px;
            margin-top: 40px;
            
            margin-right: 100px;
            display: block;
            position: relative;
            top: -30px;
            
        } 

        .gbag{
            background: url(img/grocerybag.jpg ) no-repeat center center fixed;
            min-height: 600px;       
            /* min-height: 600px;
            background-image: url(img/grocerybag.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; */
        }

        
        
         .gbag-blur-img {
            background: url(img/grocerybag.jpg ) no-repeat center center fixed;
            min-height: 600px; 
             /* filter: blur(8px); */   
    width : 100%;
    height: 100%;
    filter        : blur(8px);
    -moz-filter   : blur(8px);
    -webkit-filter: blur(8px);
    -o-filter     : blur(8px);
            }
            #form-id{
                background-color: transparent;
                position:relative;
                top:-600px; 
            }
            #form-update{
                background-color: transparent;
                position:relative;
                top:-600px; 
            }   

        li > a:hover{
            background-color: crimson !important;
            
            text-shadow:0px 0px 4px white !important;
                }

        #form1 {
            display: none;
        }
        .input{
            height: 60px;
            
        }
          
                 
        </style>

<link rel="stylesheet" type="text/css" href="style.css">
       
       <script>
        $(document).ready(function() {
  
        $("#formButton").click(function() {
        $("#form1").toggle()
    
        })
    
        $('#noDelete').click(function() {
        $("#form1").toggle()
        })

        
        })
        
           
    
       </script>    
</head>
<body >
    
    <header class="bg-primary">
        
    
        <div class="container">
        <br><br><br><br>
            <div class="row">
            <div class="col"></div>
            <div class='col'>
            <a class="navbar-brand text-secondary" href="index.php"><h1 class="ms-5">Rosylin's Cookbook</h1></a>
            </div>
            <div class="col">
                
            </div>
            <div class="col">
                 <img src="img/RC.png" alt="rc-logo" class="rclogo">
            </div>
            <div class="col">
                   
                  </div>       
            </div>
        </div>
        
                
    <nav class="navbar navbar-dark bg-primary navbar-expand-md">
            <div class="container-fluid ">
            <button class="navbar-toggler mx-auto " type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" >
                
                <span class="navbar-toggler-icon " ></span>
            </button>
<br>
<br>
<br>
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav mx-auto">
                    <li class='nav-item  mx-auto active'>
                        <a class="nav-link text-dark" aria-current="page" href="index.php">Find a recipe</a>
                    </li>
                    <li class='nav-item mx-auto'>
                        <a class="nav-link text-dark" href="add.php" >Add a recipe</a>
                    </li>
                    <li class='nav-item mx-auto'>
                        <a class='nav-link text-dark' href="see_all.php">See all recipes</a>
                    </li>
                                                                 
                </ul>
            </div>
        </div>
    </nav>
    
    </header>
