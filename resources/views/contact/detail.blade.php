@extends('layout')


@section('title')
    @lang('common.title', ['sub'=> __('common.sub_contact_d')] )
@endsection


@section('content')

    <h1>@lang('common.sub_contact_detail')</h1>
    <p>
        <a href="{{url('cwdemo/contacts/list')}}">＜＜@lang('common.sub_contact_list')</a>
    </p>
    
    <div class="pure-menu">
    <ul class="pure-menu-list">
        <li class="pure-menu-item">ID：{{$con->id}}</li>
        <li class="pure-menu-item">日付：{{$con->created_at}}</li>
        <li class="pure-menu-item">姓名：{{$con->firstname}} {{$con->lastname}}</li>
        <li class="pure-menu-item">姓名(カナ)：{{$con->firstname_kana}} {{$con->lastname_kana}}</li>
        <li class="pure-menu-item">性別：{{$con->gender==1?'男性':($con->gender==2?'女性':'不明')}}</li>
        <li class="pure-menu-item">生年月日：{{$con->birth_date}}</li>
        <li class="pure-menu-item">電話番号１：{{$con->telno_1}}</li>
        <li class="pure-menu-item">電話番号２：{{$con->telno_2}}</li>
        <li class="pure-menu-item">電話番号３：{{$con->telno_3}}</li>
        <li class="pure-menu-item">件名：{{$con->title}}</li>
        <li class="pure-menu-item">お問合せ内容：<pre>{{$con->body}}</pre></li>
        <li class="pure-menu-item">備考欄：<pre>{{$con->memo_1}}</pre></li>
        
        @foreach ($files as $k=>$f)
        <li class="pure-menu-item">写真データ{{$k+1}}：
            <img src="data:{{$f->mime_type}};base64,{{base64_encode($f->data)}}" style="max-width:300px;height:auto;">
        </li>
        @endforeach
    </ul>
    </div>
@endsection