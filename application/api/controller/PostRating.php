<?php
/**
 * Created by PhpStorm.
 * User: baoziii
 * Date: 2018/6/23 0023
 * Time: 22:45
 */
namespace app\api\controller;

class PostRating extends Base {
    function index () {
        $professor_id = $this->request->post('professor_id');
        $email = $this->request->post('email');
        $rating = $this->request->post('rating');
        $post_data = db('rating')->data(['rating' => $rating,'professor_id'=>$professor_id,'email'=>$email])->insert();

        if ($post_data == null){
            $data = array('professor_id' => intval($professor_id), 'email' => array());
            $feedback = array('code' => 0, 'msg' => '无该教授信息', 'data' => $data);
        }
        else{
            ##this is for real-time update on the scores and votes of a professor
            $updated=db('professor')->where('professor_id',$professor_id)->inc('score',$rating)->inc('votes',1)->update();
            ##############################################################################

            $data = array('professor_id'=>intval($professor_id),'email'=>$email);
            $feedback = array('code' => 1,'msg' => '提交成功', 'data' => $data);
        }
        return json($feedback);
    }

}