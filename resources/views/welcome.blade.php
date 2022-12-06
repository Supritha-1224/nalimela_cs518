<!DOCTYPE html>
<html lang="en">
 <head>
 <body style="background-color:#FFF0F5;">
  </body>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="style.css" />
   <title>Digital Library</title>
   @section('head')
   <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .navbar {
                    float: center;
                    align-items: center;
                    justify-content: space-between;
                    padding: 10px 10px;
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
                    background-color: #FFF0F5;
                    }
                    .menu li:hover {
                    background-color:#FFF0F5;
                    border-radius: 0px;
                    transition: 0.3s ease;
                    }
                    .menu li {
                    padding: 100px 100px;
                    }
                    /* styling search bar */
		                .search input[type=text]{
                      padding: 10px;
                      font-size: 17px;
                      border: 1px solid grey;
                      float: left;
                      width: 80%;
                      background: #f1f1f1;
                      gap: 1em;
                      justify-content: space-between;
		                }
                    .search{
			              float: center;
			              margin:1px;
                    padding: 10px;
                    gap: 1em;
                    justify-content: space-between;
		                }
		
		                .search button{
			              background-color:#f1f1f1 ;
			              float: left;
                    width: 10%;
                    padding: 10px;
                    color: white;
                    font-size: 17px;
                    border: 1px solid grey;
                    border-left: none; /* Prevent double borders */
                    cursor: pointer;
                    gap: 1em;
                    justify-content: space-between;
		                }

                    footer{
        background: grey;
        font-size: 18px;
        padding: 35px;
        text-align: center;
        right: 0;
        left: 0;
        bottom: 0;
        
    }
        </style>
 </head>
 <body>
   <div>
       <h1 class="text-4xl font-semibold">
           Digital Library
        </h1>
    </div>       
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
		<div class="search">
			<form action="/welcomesearch" method="POST" role="search">
				<input type="text"
					placeholder=" Search"
					name="term">
          {!! csrf_field() !!}
				<button>
					<i class="fa fa-search"
						style="font-size: center; color:black;">
					</i>
				</button>
			</form>
      
		</div>
	</div>
 </body>
</html>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
  

<footer>
         copyright &copy; <script>document.write(new Date().getFullYear())</script> 
</footer>




