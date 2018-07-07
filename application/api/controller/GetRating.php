<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/23 0023
 * Time: 22:44
 */
namespace app\api\controller;

class GetRating extends Base {
    function index () {
        //SELECT Professor_ID,Score,Votes from professor where Professor_ID = 10000
        $professor_id=$this->request->post('professor_id');

        $info=db('professor')->where('professor_id',$professor_id)->field('score,votes')->find();
        if ($info == null){
            $data = array('professor_id' => intval($professor_id), 'info' => array());
            $feedback = array('code' => 0, 'msg' => '无该教授信息', 'data' => $data);
        }
        else{
            $data = array('professor_id'=>intval($professor_id),'info'=>$info);
            $feedback = array('code' => 1,'msg' => '获取成功', 'data' => $data);
        }
        return json($feedback);
    }
}