<!DOCTYPE html>
<html>
<body style="background-color:#FFF0F5;">
  </body>
<head>
	<title>
		Summary2
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
		</style>
        </head>



<?php
  require '\xampp\htdocs\web\vendor\autoload.php';
  $client =  Elastic\Elasticsearch\ClientBuilder::create()->build();
  $params = [
    'index' => 'supritha',
    'body'  => [
        'query' => [
            "multi_match" => [
                "query" =>$id_abstract, 
                "fields"=>[ "etd_file_id" ] 
            ],
            ],
        ],
];

$response = $client->search($params);   
   
    echo 
    '<table class="table table-stripped" id="dt1">
    <tbody>';

      foreach( $response['hits']['hits'] as $source){
        $etd_file_id = (isset($source['etd_file_id'])? ($source['etd_file_id']) : "");
        $year= (isset($source['_source']['year'])? ($source['_source']['year']) : "");
        $author= (isset($source['_source']['author'])? ($source['_source']['author']) : "");
        $university = (isset($source['_source']['university']) ? ($source['_source']['university']) : "");
        $degree = (isset($source['_source']['degree']) ? ($source['_source']['degree']) : "");
        $program = (isset($source['_source']['program']) ? ($source['_source']['program']) : ""); 
        $abstract = (isset($source['_source']['text']) ? ($source['_source']['text']) : ""); 
        $title = (isset($source['_source']['title']) ? ($source['_source']['title']) : ""); 
        $advisor = (isset($source['_source']['advisor']) ? ($source['_source']['advisor']) : ""); 
        $pdf = (isset($source['_source']['relation_haspart']) ? ($source['_source']['relation_haspart']) : ""); 
        $wiki_terms = (isset($source['_source']['wiki_terms']) ? ($source['_source']['wiki_terms']) : ""); 
        echo "<tr>
        <td>
        <b>Title:</b> ".$title."<br><br>
        <b>Author(s):</b> ".$author." <br>
        <b>University:</b> ".$university." <br>
        <b>Year:</b> ".$year." <br><br> 
        <b>Abstract:</b>".$abstract."<br>
        </td>
        </form>
        </td>";
      
        echo"</tr>";
    
}