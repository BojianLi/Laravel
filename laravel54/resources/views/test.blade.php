<!-- 继承模板 -->
@extends('layout')	


<!-- 头部修改 -->
{{--重写头部--}}
@section('header')
    <!-- New Header -->
    @parent   
@stop

{{--重写侧边栏--}}
@section('left')
     @parent   
@stop


{{--重写主内容--}}
@section('content')
   我是主体，你们都要听我的！
 
@stop