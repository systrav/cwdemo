@extends('layout')


@section('title')
    @lang('common.title', ['sub'=> __('common.sub_contact_index')] )
@endsection


@section('content')

    <h1>@lang('common.sub_contact_create')</h1>

    <p>送信しました。</p>
    <p>
        <a href="{{url('cwdemo/contacts')}}">＜＜@lang('common.sub_contact_index')</a>
    </p>

@endsection