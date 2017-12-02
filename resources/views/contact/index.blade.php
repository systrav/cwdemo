@extends('layout')


@section('title')
    @lang('common.title', ['sub'=> __('common.sub_contact_index')] )
@endsection


@section('content')

<h1>@lang('common.sub_contact_index')</h1>
<ul>
    <li><a href="{{url('cwdemo/contacts/form')}}">お問い合わせフォーム</a></li>
    <li><a href="{{url('cwdemo/contacts/list')}}">お問い合わせ一覧</a></li>
</ul>

@endsection