<?php
/**
 * @author  木子飞 
 * @var   [description]  测试模型
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static  function getMember ()
    {
       return 'member name is sean';
    }
}



