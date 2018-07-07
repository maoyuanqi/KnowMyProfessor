<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/23 0023
 * Time: 22:44
 */
namespace app\api\controller;

class GetProfessorInfo extends Base {
    function index () {
        $professor_id=$this->request->post('professor_id');

        $professor_info=db('professor')->where('professor_id',$professor_id)->field('name,department')->find();
        $course_info=db('course')->where('professor_id',$professor_id)->field('name,course_id')->select();
        if ($professor_info == null){
            $info_data = array('professor_id' => intval($professor_id), 'info' => array());
            $feedback = array('code' => 0, 'msg' => '无该教授信息', 'data' => $info_data);
        }
        else{
            $info_data = array('professor_id'=>intval($professor_id),'professor_info'=>$professor_info,'course_info'=>$course_info);
            $feedback = array('code' => 1,'msg' => '获取成功', 'data' => $info_data);
        }
        return json($feedback);
    }
}