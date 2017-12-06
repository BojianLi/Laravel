{{--继承模板--}}
@extends('layout');

{{--重写头部--}}
@section('header')
    @parent    //继承父类
    New Header
@stop

@section('sidebar')
    <a href="{{action('StudentController@urlTest')}}">url(action)</a>
    <a href="{{url('url')}}">url(url)</a>
    <a href="{{Route('url')}}">url(route)</a>
    New Sidebar
@stop

{{--yield 继承--}}
@section('content')
    {{--1，模板中输出PHP变量--}}
    {{--<p>{{$name}}</p>--}}
    {{--2.模板中调用PHP代码--}}
    {{--<p>{{time()}}</p>--}}
    {{--<p>{{date('Y-m-d H:i:s',time())}}</p>--}}
    {{--<p>{{in_array($name,$arr)? 'ture':'false'}}</p>--}}
    {{--<p>{{var_dump($arr)}}</p>--}}
    {{--<p>{{$name or 'default'}}</p>--}}
    {{--3,引入子视图 include--}}
    {{--@include('student.common1',['message'=>'小明']);--}}

    @if($name == 'sean')
       I'm sean
    @elseif($name == 'xiaobai')
       I'm xiaobai
    @else
       no
    @endif

    <br>

    @unless($name != 'xiaobai')
      I'm xiaobai;
    @endunless

    <br>
    @for($i=1;$i < 3; $i++)
     <p>{{$i}}</p>
   @endfor
    <br>
    @foreach($student as $v)
       <p>{{$v->s_name}}</p>
    @endforeach

    @forelse($student as $s)
        <p>{{$s->s_name}}</p>
    @empty
        null
    @endforelse
@stop