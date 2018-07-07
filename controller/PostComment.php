<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/23 0023
 * Time: 22:45
 */
namespace app\api\controller;

class PostComment extends Base {
    function index () {
        $professor_id = $this->request->post('professor_id');
        $email = $this->request->post('email');
        $comment = $this->request->post('comment');
        $post_data = db('comment')->data(['comment' => $comment,'professor_id'=>$professor_id,'email'=>$email])->insert();
        if ($post_data == null){
            $data = array('professor_id' => intval($professor_id), 'email' => array());
            $feedback = array('code' => 0, 'msg' => '无该教授信息', 'data' => $data);
        }
        else{
            $data = array('professor_id'=>intval($professor_id),'email'=>$email);
            $feedback = array('code' => 1,'msg' => '提交成功', 'data' => $data);
        }
        return json($feedback);
    }
}