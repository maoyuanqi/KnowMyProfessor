<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/24 0024
 * Time: 0:20
 */
namespace app\api\controller;

class SearchCourse extends Base {
    function index () {
        $course_name=$this->request->post('input');
        $string_name='%'.(string)$course_name.'%';
        $matched=db('course')->whereLike('name',$string_name)->count();
        $course_info=db('course')->whereLike('name',$string_name)->field('name,info,course_id')->select();
        if ($course_info == null){
            $data=array();
            $total_data = array('matched'=>$matched,'result'=>$data);
            $feedback = array('code' => 0, 'msg' => '无该课程信息', 'data'=>$total_data);
        }
        else{
            $data=$course_info;
            $total_data = array('matched'=>$matched,'result'=>$data);
            $feedback = array('code' => 1, 'msg' => '搜索成功','data'=>$total_data);
        }
        return json($feedback);
    }
}