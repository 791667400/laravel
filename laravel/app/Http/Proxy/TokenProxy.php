<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/13
 * Time: 15:33
 */
namespace App\Http\Proxy;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TokenProxy
{
    protected $http;
    /*
    public function __construct(\GuzzleHttp\Client $http)
    {
        $this->http=$http;
    }
    */
    public function __construct(){
        $http = new Client([
                'timeout'         => 3.14
        ]);
        $this->http=$http;
    }
    public function proxy($grant_type='password',array $data=[]){
        
        $data =[
            'username'=>'791667400@qq.com',
            'password'=>'123456',
            'grant_type'=>'password',
            'scope' =>'',
            'client_id' => '2',
            'client_secret' =>'DQA6GhzI8Ov6tsQJKmNjwreelSDXlke7KhhNKpCX'
        ];
        Log::info('--proxy--');
        Log::info(json_encode($data));
        Log::info('--url:http://com.test/oauth/token--');
        $response = $this->http->post('http://com.test/oauth/token', [
            'form_params' => $data
        ]);
        Log::info('--statusCode--');
        $statusCode = $response->getStatusCode();
        $rsp =json_decode((string)$response->getBody(), true);
        Log::info($statusCode);
        Log::info($rsp);

        return response()->json([
                 'success' => true, 
                 'message' => '获取成功',
                 'token' => $rsp['access_token']
        ]);
    }
}