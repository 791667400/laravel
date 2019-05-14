<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/5/13
 * Time: 17:06
 */

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function Test(Request $resquest)
    {
      return json_encode(['s'=>1]);
    }
    public function post()
    {
        return json_encode(['s'=>'post']);
    }
    public function post1()
    {
        return json_encode(['s'=>'post1']);
    }
    public function Test1(Request $resquest)
    {
        $url='http://laravelshop.test/test.php';
        //$url='https://www.cicgf.com/test.php';
        Log::info(date('Y-m-d H:i:s').'='.$url);
        try{
            $data = ['username'=>'乔峰','skill'=>'擒龙手'];
            $headers = array('Content-Type: application/x-www-form-urlencoded');
            $curl = curl_init(); // 启动一个CURL会话
            curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
            curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
            curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
            curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Post提交的数据包
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
            curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($curl); // 执行操作
            if (curl_errno($curl)) {
                echo 'Errno'.curl_error($curl);//捕抓异常
            }
            curl_close($curl); // 关闭CURL会话
            echo($result);
            Log::info('关闭URL请求');
            Log::info(json_encode($result));
        }catch (\Exception $e) {
            Log::info(json_encode($e->getMessage()));
        }
        
    }
}