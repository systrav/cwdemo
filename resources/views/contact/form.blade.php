@extends('layout')


@section('title')
    @lang('common.title', ['sub'=> __('common.sub_contact_create')] )
@endsection


@section('content')

<h1>@lang('common.sub_contact_create')</h1>
<p>
    <a href="{{url('cwdemo/contacts')}}">＜＜@lang('common.sub_contact_index')</a>
</p>

@if ($errors->any())
    <div style="background-color:#eeaabb">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{url('cwdemo/contacts/create')}}" enctype="multipart/form-data" class="pure-form pure-form-stacked">
<fieldset>
<legend>入力項目</legend>

<label>性<input type="text" name="firstname" value="{{old('firstname')}}" required /></label>
<label>名<input type="text" name="lastname" value="{{old('lastname')}}" required /></label>

<label>性（フリガナ）<input type="text" name="firstname_kana" value="{{old('firstname_kana')}}" required /></label>
<label>名（フリガナ）<input type="text" name="lastname_kana" value="{{old('lastname_kana')}}" required /></label>

<label>性別
    <label><input type="radio" name="gender" value="1" required {{ old('gender')=='1'?'checked':''}} >男性</label>
    <label><input type="radio" name="gender" value="2" required {{ old('gender')=='2'?'checked':''}} >女性</label>
</label>

<label>生年月日<input id="datepicker" type="text" name="birth_date" value="{{old('birth_date')}}" required /></label>
<script>
$(function(){
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
} );
</script>

<label>電話番号１<input type="text" name="telno_1" value="{{old('telno_1')}}" required /></label>
<label>電話番号２<input type="text" name="telno_2" value="{{old('telno_2')}}"/></label>
<label>電話番号３<input type="text" name="telno_3" value="{{old('telno_3')}}"/></label>

<label>件名<input type="text" name='title' value='{{old('title')}}' required /></label>
<label>お問合せ内容<textarea type="text" name='body' style='width:500px;height:15em;' required >{{old('body')}}</textarea ></label>

<label>写真データ
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
    <input name="attachment1" type="file" />
    <input name="attachment2" type="file" />
</label>

<label>備考欄<textarea name='memo_1' style='width:500px;height:10em;'>{{old('memo_1')}}</textarea></label>

{{ csrf_field() }}

<button type="submit" class="pure-button pure-button-primary">送信</button>
</fieldset>
</form>

@endsection