<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/24 0024
 * Time: 0:19
 */
namespace app\api\controller;

class SearchProfessor extends Base {
    function index () {
        $professor_name=$this->request->post('input');
        $string_name='%'.(string)$professor_name.'%';
        $matched=db('professor')->whereLike('name',$string_name)->count();
        $professor_info=db('professor')->whereLike('name',$string_name)->field('name,department,professor_id')->select();
        if ($professor_info == null){
            $data=array();
            $total_data = array('matched'=>$matched,'result'=>$data);
            $feedback = array('code' => 0, 'msg' => '无该教授信息', 'data'=>$total_data);
        }
        else{
            $data=$professor_info;
            $total_data = array('matched'=>$matched,'result'=>$data);
            $feedback = array('code' => 1, 'msg' => '搜索成功','data'=>$total_data);
        }
        return json($feedback);
    }
}