<x-app-layout>
<!DOCTYPE html>
<html>
<body style="background-color:#FFF0F5;">
  </body>
<head>
	<title>
		Create a Search Bar using HTML and CSS
	</title>
	
	<meta name="viewport"
		content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		
		/* styling navlist */
		#navlist {
			background-color: #D3D3D3;
			position: absolute;
			width: 100%;
		}
		
		/* styling navlist anchor element */
		#navlist a {
			float:left;
			display: block;
			color: black;
			text-align: center;
			padding: 12px;
			text-decoration: none;
			font-size: 15px;
		}
		.navlist-right{
			float:right;
		}

		/* hover effect of navlist anchor element */
		#navlist a:hover {
			background-color: #D3D3D3;
			color: black;
		}
		
		/* styling search bar */
		.search input[type=text]{
			width:300px;
			height:25px;
			border-radius:25px;
			border: none;

		}
		
		.search{
			float:right;
			margin:7px;

		}
		
		.search button{
			background-color: #D3D3D3;
			color: #f2f2f2;
			float: right;
			padding: 5px 10px;
			margin-right: 16px;
			font-size: 12px;
			border: none;
			cursor: pointer;
		}

		footer{
        background: grey;
        font-size: 18px;
        padding: 35px;
        text-align: center;
        position: adsolute;
        right: 0;
        left: 0;
        bottom: 0;
    }
	</style>
</head>

<body>
	
	<!-- Navbar items -->
	<div id="navlist">

		<!-- search bar right align -->
		<div class="search">
			
			<form action="/loginsearch" method="POST">
				@csrf
				<input type="text"
					placeholder=" Search"
					name="term">
				
				<button>
					<i class="fa fa-search"
						style="font-size: 18px;">
					</i>
				</button>
				
			</form>
			<a href="/insert">User Details</a>
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


</x-app-layout>

