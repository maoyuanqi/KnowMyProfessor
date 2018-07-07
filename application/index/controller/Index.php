<?php
namespace app\index\controller;
use think\facade\Env;

class Index extends Base
{
    public function index()
    {
        include_once(Env::get('root_path').'/public/html/header.html');
        echo "<title>Know My Professor</title></head><body class=\"index\"><div class=\"site-wrapper\"><div class=\"site-wrapper-inner\"><div class=\"cover-container\">";
        include_once(Env::get('root_path').'/public/html/navbar.html');
        include_once(Env::get('root_path').'/public/html/index.html');
        include_once(Env::get('root_path').'/public/html/footer.html');
    }
}
