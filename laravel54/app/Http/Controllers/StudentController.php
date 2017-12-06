<?php
/**
 * Created by PhpStorm.
 * User: libojian
 * Date: 2017/11/22
 * Time: 15:43
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
/*
* @desc  测试增删查改
*/
class StudentController extends Controller
{
     /**
      * DBfacade 操作方式
      * @return [type] 数据操作类型
      */
     public  function test1()
     {    
         // $insert = DB::insert('insert into student(s_name,s_age) values(?,?)',['Ming',22]);          //插入   ??是占位符   可原生SQL添加  返回值 bool型
         // var_dump($insert);
         

         // $update = DB::update('update student set s_age = ? where s_name = ?',[1,'Li']);             //更新    返回类型  int  修改的行数
          // var_dump($update);   
         

         //$delete = DB::delete('delete from student where id > ?',[1]);                               //删除   返回类型  int  受影响的行数
         //var_dump($delete);
         

         $students = DB::select('select * from student where id > ?',[0]);                             //查询  返回值 数组型
         // var_dump($students);
         dd($students);

     }
     

     /**
      *@var   [description]  查询构造器 使用 
      */
     
     public function test2() {
     	 /*************** 新增数据*****************/
             // $info_one = DB::table('student')->insert(['s_name'=>'seam','s_age'=>36]);                                   //插入一条
             // var_dump($info_one);   
             
             //$info_all = DB::table('student')->insert([['s_name'=>'liu','s_age'=>16],['s_name'=>'pan','s_age'=>19]]);     //插入多条数据
             //var_dump($info_all);


             //$id = DB::table('student')->insertGetId(['s_name'=>'kitty','s_age'=>7]);                                //获取插入id
             // var_dump($id);
             
     	 /***************end 新增数据****************/



     	 /************* 更新数据*************************/
           // $num = DB::table('student')->where('id',5)->update(['s_age'=>60]);      //更新为指定内容
            
           //$num = DB::table('student')->increment('s_age',3);                         //自增  默认：1,age后的3是自增3
              
           //$num = DB::table('student')->decrement('s_age',3);   //自减 
           
           //$num = DB::table('student')->where('id',5)->decrement('s_age',3,['s_name'=>'SmallRed']);           //条件自减 并 修改其他内容

           //var_dump($num);
     	 /************ end修改数据***********************/


     	 /************ 删除数据********************************/
           // $num = DB::table('student')->where('id',5)->delete();  //批删 where('id','>=',5)
           
            // DB::table('student')->truncate();    //清空表 没有返回值
            // var_dump($num);
     	 /*********** end 删除数据 ****************************************/

     }


     /**
      * [test3 description] 查询构造器-----查询方法  和 聚合函数
      * @return [type] [description] 
      */
     public function test3() {
         // $student = DB::table('student')->get();   //get()方法  获取表所有数据
         //$student = DB::table('student')->orderBy('id','desc')->first();    //first获取第一条数据
        
        // $student = DB::table('student')->where('id','>=',1)->get();    //单个条件
     	// $student = DB::table('student')->whereRaw('id >= ? and s_age > ?',[3,1])->get();  //多条件搜索
        //$student = DB::table('student')->pluck('s_name');  //返回想要的字段
        
        // $student = DB::table('student')->orderBy('id','desc')->list('s_name','id');         //返回想要的字段  指定键为下标  5.4 不可用
        // $student = DB::table('student')->select('id','s_name')->get();  //获取指定字段
       
        //chunk 分段查询 项目中一次查1000条
        // $student = DB::table('student')->orderBy('id','desc')->chunk(2,function($student){var_dump($student);// if(你的条件) return false  //暂停 
        // });
        // dd($student);
        

        /******聚合函数****************/ 
        //$num = DB::table('student')->count();
        // $max = DB::table('student')->max('s_age');
        // $min = DB::table('student')->min('s_age');
        //$avg = DB::table('student')->avg('s_age');   //返回值  字符串类型
        $sum = DB::table('student')->sum('s_age');     //求和
        var_dump($sum);
      }

    public function orm1()
    {
        //$students = Student::all(); //all() 查询全部
        // $student = Student::find(3);  //find() 根据id查一条
        // $student = Student::findOrfail(320); //根据主键查找 没有查到就报错

        /*****查询构造器查询********/
        // $studnet = Student::get();
        //$studnet = Student::Where('id','>','1')->orderBy('s_age','desc')->first();
//        echo '<pre>';
//        Student::chunk(2,function($student){
//            var_dump($student);
//        });
        /****聚合函数*************/
     //   $num = Student::count();
        $max = Student::max('s_age');
        dd($max);
    }

    public function orm2()
    {
        /*******使用模型新增数据*********/
//        $student = new Student();
//        $student ->s_name = 'sea0';
//        $student ->s_age =26;
//        $boll = $student->save();
//        dd($boll);
//        $time = Student::find(31)->created_at;    // 时间戳处理
//        echo date('Y-m-d H:i;s',$time);

        /*********使用create新增数据******************************/
//        $student = Student::create(['s_name'=>'muzhi1','s_age'=>26]);
//        dd($student);
        /***********end create新增数据 *********************************************/

        //fistOrCreate 用属性查找用户 如果没有这新增 返回新的实例
//        $student =  Student::firstOrCreate(['s_name'=>'imooc']);
//        fistOrNew
        $student = Student::firstOrNew(['s_name'=>'ZL']);  //用属性查找用户 若没有返回新的实例不进行保存  保存用save
        dd($student->save());

    }

    //修改
    public function orm3()
    {
         /***通过模型更新数据   会自动维护修改时间戳updated_at******/
//        $student = Student::find(30);
//        $student->s_name = 'kitty boy';
//        $student->save();
//        var_dump($student);

        /********批量更新***************/
        $num = Student::where('id','>','10')->update(['s_age'=>26]);
        var_dump($num);
    }
    //删除
    public function orm4()
    {
        //模型删除
//        $student = Student::find('1');
//        $bool = $student -> delete();

        //通过主键删除
        $num = Student::destroy(5,6); //里面可以跟数组[5,6]

       //通过指定条件
        $num = Student::where('id','>','5')->delete();
        var_dump($num);

    }

    public function  section1()
    {
        $name = 'xiaobai';
        $arr = ['sean','xiaobai'];
        $student = Student::get();
        $student = [];
       return view('student.section1',['name'=>$name,'arr'=>$arr,'student'=>$student]);
    }

    public  function  urlTest(){
        echo 'urltest';
    }

    public  function  request1(Request $request)
    {
        //  1，取值
//         echo $request->input('name','没有名');  //如果没有这默认
//        if($request->has('name')) echo 'ok';       //判断有没有
//        else 'no';
//        dd($request->all());                        //获取全部
        // 2,判断请求类型
        echo $request->method();

        if($request->isMethod('GET')) echo 'yes GET';
        else    echo 'not get' ;

        var_dump($request->ajax());                 //判断是否是ajax请求

        $res = $request->is('student/*');        //判断是否是student路径下的请求

        var_dump($res);  //返回布尔型

        var_dump('当前url'.$request->url());                //当前url

    }

}