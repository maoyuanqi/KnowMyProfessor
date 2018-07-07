<?php
namespace app\utils;

class HttpRequest extends Base{
    function curl_request ($url, $data_array, $method){
        if (is_array($data_array)){
            $data = json_encode($data_array);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array(
                    "Cache-Control: no-cache",
                    "Content-Type: application/json",
                    "version: v3.0"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            $callback = (object)["response" => $response, "err" => $err];
            return $callback;
        }
        else{
            $callback = (object)["err" => "这就不是一个array！"];
            return $callback;
        }
    }
}

