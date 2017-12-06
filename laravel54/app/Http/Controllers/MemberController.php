<?php
/**
 * @author 木子飞 <[email address]>
 * @var 测试控制器
 */

namespace App\Http\Controllers;
use App\Member;    //加载模型

class MemberController extends Controller
{
	
	public function index() {

		return Member::getMember(); die;
		// return 'index,测试'.'///'.route('member');
		// return view('member-index');  //输出视图文件
		// return view('member/index');     //输出默认视图
		return view('member/index',[
             'name'=>'木子飞',
             'age' =>'22岁'
			]);

	}

	/**
	 * [delete description]  删除方法
	 * @param  [type] $id [description]  绑定id
	 * @return [type]     [description]  
	 */
	public function delete($id = null) {
        return '删除第'.$id.'条数据';
	}
}

