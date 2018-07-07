<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/23 0023
 * Time: 22:44
 */
namespace app\api\controller;

class GetReviews extends Base {
    function index () {
        //SELECT a.Professor_ID,count(b.Comment),b.Email_ID,b.Comment from professor a, reviews b where a.Professor_ID=10000
        $professor_id=$this->request->post('professor_id');

        $info=db('comment')->where('professor_id',$professor_id)->count();
        $email_comment=db('comment')->where('professor_id',$professor_id)->field('email,comment')->select();
        if ($info == null){
            $total_data = array('total' => intval($info), 'data' => array());
            $feedback = array('code' => 0, 'msg' => '无该教授信息', 'reviews' => $total_data);
        }
        else{
            $total_data = array('total' => intval($info), 'data' => $email_comment);
            $feedback = array('code' => 1, 'msg' => '获取成功', 'reviews' => $total_data);
        }
        return json($feedback);
    }
}