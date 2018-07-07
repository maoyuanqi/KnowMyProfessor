<?php
namespace app\professor\controller;
use think\facade\Env;

class Index extends Base
{
    public function index()
    {
        include_once(Env::get('root_path').'/public/html/header.html');
        echo "<title>Professor - Know My Professor</title><script src=\"/static/js/professor.js\"></script></head><body class=\"index\"><div class=\"site-wrapper\"><div class=\"site-wrapper-inner\"><div class=\"cover-container\">";
        include_once(Env::get('root_path').'/public/html/navbar.html');
        include_once(Env::get('root_path').'/public/html/professor.html');
        include_once(Env::get('root_path').'/public/html/footer.html');
    }

    public function professor($id = -1){
        include_once(Env::get('root_path').'/public/html/header.html');
        echo "<title>Professor - Know My Professor</title><script src=\"/static/js/professor_detail.js\"></script></head><body class=\"index\"><div class=\"site-wrapper\"><div class=\"site-wrapper-inner\"><div class=\"cover-container\">";
        include_once(Env::get('root_path').'/public/html/navbar.html');
        include_once(Env::get('root_path').'/public/html/professor_detail.html');
        include_once(Env::get('root_path').'/public/html/footer.html');
    }
}
