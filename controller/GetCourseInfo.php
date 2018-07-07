<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/23 0023
 * Time: 22:44
 */
namespace app\api\controller;

class GetCourseInfo extends Base {
    function index () {
        $course_id=$this->request->post('course_id');

        $course_info=db('course')->where('course_id',$course_id)->field('name,info,professor_id')->find();
        if ($course_info == null){
            $info_data = array('course_id' => intval($course_id), 'info' => array());
            $feedback = array('code' => 0, 'msg' => '无该课程信息', 'data' => $info_data);
        }
        else{
            $info_data = array('course_id'=>intval($course_id),'info'=>$course_info);
            $feedback = array('code' => 1,'msg' => '获取成功', 'data' => $info_data);
        }
        return json($feedback);
    }
}