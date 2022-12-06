<!DOCTYPE html>
<html>
<body style="background-color:#FFF0F5;">
<button onclick="history.back()">Go Back</button>
  </body>
<head>
	<title>
		Login System
	</title>
	
	<meta name="viewport"

		content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
		.navbar {
                    float: center;
                    align-items: center;
                    justify-content: space-between;
                    padding: 1px 1px;
                    background-color: #D3D3D3;
                    color: #f1f1f1;
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
			color: #D3D3D3;
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
<nav class="navbar">
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="/login">Login</a></li>
         <li><a href="/register">Register</a></li>
         <li><a href="default.asp">Home</a></li>
         
       </div>
     </ul>
   </nav>

   <!-- Navbar items -->
	<div id="navlist">
		<!-- search bar right align -->
		<div class="search">
			<form action="/welcomesearch" method="POST" >
				<input type="text"
					placeholder=" Search"
					name="term"
                    value="<?php echo $query_string?>">
                    {!! csrf_field() !!}
				<button>
					<i class="fa fa-search"
						style="font-size: center; color:black;">
					</i>
				</button>
			</form>
		</div>
	</div>

    <br><br><br>

</body>

</html>	


<?php
  require '\xampp\htdocs\web\vendor\autoload.php';
  $term = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
  $client =  Elastic\Elasticsearch\ClientBuilder::create()->build();
  $word = strip_tags($_POST['term']);
  $params = [
      'index' => 'supritha',
      'from' => 0,
      'size' => 501,
      'type' => '_doc',
      'body' => [
          'query' => [
              'multi_match' => [
                  'query' => $term,
                  'fields' => ['author','$year','university','degree','program','abstract','title','advisor','wiki_terms']

                  ]
              ]
          ]
      ];


      $response = $client->search($params);
      $total = $response['hits']['total']['value'];
      if ($total == 0){
        echo'<div style="text-align:center;" class="alert alert-danger success-block">';
        echo '<h5>No Results Found..!</h5>';
        echo '<script>alert("Not a valid Search")</script>';
        }
        else{
        echo
        "<div>
        <h3><b><i>$total search results for $term</b></i><h3>
        <br>
        </div>";
        echo 
        '<table class="table table-stripped" id="dt1">
        <tbody>';
    
    
    //Highlighting words

    function highlightKeyWord($text, $term){
        $new_string = preg_replace('#'. preg_quote($term) .'#i', '<span style="background-color: grey;">\\0</span>', $text);
        return $new_string;
    }

    foreach( $response['hits']['hits'] as $source){
        $etd_file_id = (isset($source['_source']['etd_file_id'])? $source['_source']['etd_file_id'] : "");
        $year= (isset($source['_source']['year'])? highlightKeyWord($source['_source']['year'], $term) : "");
        $author= (isset($source['_source']['author'])? highlightKeyWord($source['_source']['author'], $term): "");
        $university = (isset($source['_source']['university']) ? highlightKeyWord($source['_source']['university'],$term) : "");
        $degree = (isset($source['_source']['degree']) ? highlightKeyWord($source['_source']['degree'],$term) : "");
        $program = (isset($source['_source']['program']) ? highlightKeyWord($source['_source']['program'],$term) : ""); 
        $abstract = (isset($source['_source']['abstract']) ? highlightKeyWord($source['_source']['abstract'], $term) : ""); 
        $title = (isset($source['_source']['title']) ? highlightKeyWord($source['_source']['title'], $term) : ""); 
        $advisor = (isset($source['_source']['advisor']) ? highlightKeyWord($source['_source']['advisor'], $term): ""); 
        $pdf = (isset($source['_source']['relation_haspart']) ? highlightKeyWord($source['_source']['relation_haspart'], $term): ""); 
        $wiki_terms = (isset($source['_source']['wiki_terms']) ? highlightKeyWord($source['_source']['wiki_terms'],$term) : ""); 
  
        $view_abstract =  mb_strimwidth($abstract, 0, 500, "...");
        echo "<tr>
  
      <td>
      <a href='/summarypage/".$etd_file_id."'><b>Title:</b> ".$title." </a><br><br>
      <b>Author(s):</b> ".$author." <br>
      <b>University:</b> ".$university." <br>
      <b>Year:</b> ".$year." <br><br>
      <b>Abstract:</b>".$abstract."<br> 
      <b>id:</b>".$etd_file_id."<br>
      <form method='GET' action='/download'>
      <input type='hidden' name='q' valu='".$etd_file_id."' />
      <td></td>
      </td>
      </form>
      </td>";
    
      echo"</tr>";
  }
      echo "</tbody></table>";
}

echo "<br>";
$number_of_pages = 5;
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a href="/rp&page=' . $page . '">' . $page .   '</a>';
    echo " "; 
}
    ?>

<footer>
    copyright &copy; <script>document.write(new Date().getFullYear())</script> 
</footer>


