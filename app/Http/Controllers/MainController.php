<?php

namespace App\Http\Controllers;

use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Slim\Factory\AppFactory;
use Illuminate\Http\Request;
use Elastic\Elasticsearch;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use view;
use session;

require '\xampp\htdocs\web\vendor\autoload.php';
$client = Elasticsearch\ClientBuilder::create()->build();

class MainController extends Controller
{
    public function welcomesearch(Request $request)
    {   
       $query_string = $request->get("term");
       $term = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
          if ($query_string != "") {
              $searchParams = [
                'index' => 'supritha',
                'from' => 0,
                'size' => 5000,
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

        return view('search',["query_string"=>$query_string])->withquery($searchParams);
                    }

}

public function loginsearch(Request $request)
    {   
       $query_string = $request->get("term");
       $term = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
          if ($query_string != "") {
              $searchParams = [
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

        return view('search2',["query_string"=>$query_string])->withquery($searchParams);
                    }

}




public function data($id_abstract)
 {  
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
                        return view('summaryresult',["id_abstract"=>$id_abstract])->withquery($params);
                    }


                    public function data2($id_abstract)
                    {  
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
                                        return view('summaryresult',["id_abstract"=>$id_abstract])->withquery($params);
 }
                

    public function pdfopen($pdf)
    {
        $file = '/Users/hp/Downloads/PDF/PDF/'."$pdf";

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file);
    }

    public function insertdetails(Request $request)
{   
    // $query_string = $request->get("term");
    // $targetfolder = "/Users/hp/Downloads/PDF/PDF/";

    // $targetfolder = $targetfolder . basename( $_FILES['filename']['name']) ;

    // if(move_uploaded_file($_FILES['filename']['tmp_name'], $targetfolder))
    // {
    //     echo "The file ". basename( $_FILES['filename']['name']). " is uploaded";
    // }
    // else{
    //     echo "Problem uploading file";
    // }

    // $pdf_name =$_FILES['filename']['name'];

    $client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $program = $_POST['program'];
            $degree = $_POST['degree'];
            $university = $_POST['university'];
            $abstract = $_POST['abstract'];
    
            $params = [
                'index' => 'supritha',
                'type' => '_doc',
                'body'  => [
                            'title' => $title,
                            'author' => $author,
                            'year' => $year,
                            'program' => $program,
                            'degree' => $degree,
                            'university' => $university,
                            'abstract' => $abstract,
                        'etd_file_id' => rand(500,5000),
                        ],  
        ];

        $response = $client->index($params);
        }
       
        public function uploadpdf($pdf_num)
    {
        $file_name = "C:\Users\hp\Downloads\PDF\PDF";

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        
        readfile($file_name);
    }
    public function api_token()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $users = Auth::user();
            if ($users->getRememberToken() == NULL) {
                $token = Str::random(30);
                $users->setRememberToken($token);
                $users->save();
            }
            return response()->json(['key' => $users->getRememberToken()], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
        
    }
    public function sear_api()
    {
        $terms = request('query');
        $limit = request('W');
        $key = request('key');
        $client =  ClientBuilder::create()->build();
        $resultids = (array)DB::select('select remember_token from users');
        $resultstr = json_encode($resultids);
        
        if ($key != NULL && (str_contains($resultstr, $key) )) {

            $params = [
              'index' => 'supritha',
              'from' => 0,
              'size' => $limit,
              'type' => '_doc',
              'body' => [
                  'query' => [
                      'multi_match' => [
                          'query' => $terms,
                          'fields' => ['author','title','$etd_file_id','$year','university','degree','program','abstract','advisor','wiki_terms'],

          ]
                      ]
              ]
                      ];
                      $results = $client->search($params);
                      $count = $results['hits']['total']['value'];
                      $res = $results['hits']['hits'];
                      $rank = 1;
                     foreach( $res as $r)
                      {   
                        $title[$rank]['title'] = $results['hits']['hits'][$rank-1]['_source']['title'];
                        $author[$rank]['author'] = $results['hits']['hits'][$rank-1]['_source']['author'];
                        $etd[$rank]['etd_file_id'] = $results['hits']['hits'][$rank-1]['_source']['etd_file_id'];
                        $year[$rank]['year'] = $results['hits']['hits'][$rank-1]['_source']['year'];
                        $univ[$rank]['university'] = $results['hits']['hits'][$rank-1]['_source']['university'];
                        $deg[$rank]['degree'] = $results['hits']['hits'][$rank-1]['_source']['degree'];
                        $prog[$rank]['program'] = $results['hits']['hits'][$rank-1]['_source']['program'];
                        $abs[$rank]['abstract'] = $results['hits']['hits'][$rank-1]['_source']['abstract'];
                        $wiki[$rank]['wiki_terms'] = $results['hits']['hits'][$rank-1]['_source']['wiki_terms'];
                        $rank+=1;
                    }
                    return response()->json(['response'=>$title,$author,$etd,$year,$univ,$deg,$prog,$abs,$wiki], 200);
                } else {
                    return response()->json(['error' => 'You are not Authorised to Access query'.$terms.',since there is no key.'], 401);
          }
        }
          }

    
    

    
           
            





 

   