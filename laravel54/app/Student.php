<?php
/**
 * Created by PhpStorm.
 * User: libojian
 * Date: 2017/11/23
 * Time: 18:40
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';    //指定表名

    protected $primaryKey = 'id';   //指定id

    public $timestamps =  true;    //自动维护时间戳 liunx时间戳

    protected function getDateFormat()   //unix时间
    {
        return time();
    }

    /***laravel 查询时间戳会将Unix时间戳 自动处理成liunx时间戳 防止处理办法****/
    protected function asDateTime($value)
    {
        return $value;
    }
    /***********end 结束 **********************************************/
    protected $fillable = ['s_name','s_age'];    //指定允许批量赋值的字段
    protected $guarded =[];                      //指定不允许批量赋值的字段
}