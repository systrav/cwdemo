@extends('layout')


@section('title')
    @lang('common.title', ['sub'=> __('common.sub_contact_list')] )
@endsection


@section('css')
    .pagination li{display:inline;}
@endsection


@section('content')

    <h1>@lang('common.sub_contact_list')</h1>
    <p>
        <a href="{{url('cwdemo/contacts')}}">＜＜@lang('common.sub_contact_index')</a>
    </p>

    <table class="pure-table pure-table-bordered">
        <thead>
            <tr><td>ID</td><td>件名</td><td>日付</td></tr>
        </thead>
        <tbody>
            @foreach ($cons as $con)
            <tr>
                <td>{{$con->id}}</td>
                <td><a href="{{url("cwdemo/contacts/detail/{$con->id}")}}">{{$con->title}}</a></td>
                <td>{{$con->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{$cons->links()}}
@endsection