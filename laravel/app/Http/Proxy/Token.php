<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/14
 * Time: 12:35
 */

namespace App\Http\Proxy;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Log;

class Token
{
    protected $http;

    public function __construct(\GuzzleHttp\Client $http)
    {
        Log::info('con');
        $this->http=$http;
    }
    public function proxy(){
        Log::info('enter');
        $data =[
            'username'=>'791667400@qq.com',
            'password'=>'123456',
            'grant_type'=>'password',
            'scope' =>'',
            'client_id' => '2',
            'client_secret' =>'FYxL4iIpmXBU4XNjESfZYAVrF3qZHtOMeqrBHAJ6'
        ];
        $client = new Client();
        try{
            Log::info('response');
            $response = $client->post('http://com.test/oauth/token',[
                'form_params' => [
                    'grant_type'=>'password',
                    'scope' =>'',
                    'client_id' => '2',
                    'client_secret' =>'FYxL4iIpmXBU4XNjESfZYAVrF3qZHtOMeqrBHAJ6',
                    'username'=>'791667400@qq.com',
                    'password'=>'123456'
                ]
            ]);
            Log::info('success-http://com.test/oauth/token');
        }catch (\Exception $e) {
            Log::info('fail-http://com.test/oauth/token');
            Log::info(json_encode($e->getMessage()));
        }
        $getStatusCode= $response->getStatusCode();
        Log::info('response-end-'.$getStatusCode);
        $rsp =json_decode((string)$response->getBody(), true);
        return response()->json([
            'success' => true,
            'message' => 'token5获取成功',
            'getStatusCode'=>$getStatusCode,
            'data' => json_encode($rsp)
        ]);
        //Log::info(json_encode($rsp));
    }

    public function get_proxy(){
        Log::info('get-enter');
        
        $client = new Client([
            //跟域名
            'base_uri' => 'http://com.test',
            // 超时
            'timeout'  => 2.0,
        ]);
        $response = $client->get('/posts/4',['verify' => false]);

        $code = $response->getStatusCode(); // 200

        Log::info('CODE:' .$code);
        
        return response()->json([
            'success' => true,
            'message' => 'get-token获取成功'
        ]);

     
    }
}