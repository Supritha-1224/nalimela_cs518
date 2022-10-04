<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="style.css" />
   <title>Document</title>
   @section('head')
        <style>
            .navbar {
                    float: center;
                    align-items: center;
                    justify-content: space-between;
                    padding: 100px 100px;
                    background-color: #FFF0F5;
                    color: #FFF0F5;
                    text-align: center;
                    }
                    .nav-links a {
                    color: black;
                    }
                    /* NAVBAR MENU */
                    .menu {
                    text-align: center;
                    display: flex;
                    gap: 1em;
                    font-size: 25px;
                    list-style: none;
                    }
                    .menu li:hover {
                    background-color:#FFF0F5;
                    border-radius: 0px;
                    transition: 0.3s ease;
                    }
                    .menu li {
                    padding: 100px 100px;
                    }
        </style>
 </head>
 <body>
   <nav class="navbar">
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="/login">Login</a></li>
         <li><a href="/register">Register</a></li>
       </div>
     </ul>
   </nav>
 </body>
</html>