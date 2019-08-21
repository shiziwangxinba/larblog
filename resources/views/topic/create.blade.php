@extends('layouts.app')
@section('content')
<div class="container">
	<form action="/topic/create" method="post">
		{{ csrf_field() }}
	@include('layouts.has')
	<div class="center-block" style="max-width:720px;">
		@if(count($errors) > 0)
		<p class="text-danger">{{$errors->first()}}</p>
		@endif
		<p align="center"><b><span class="glyphicon glyphicon-pencil"></span>新建話題</b></p>
		<div class="form-group " style="max-width:250px;">
			<label>暱稱</label>
			<input type="text" name="username" value="{{Auth::user()->name}}" class="form-control" />
		</div>
		<div class="form-group">
			<div class="help-block">本站採取匿名制度,您可以隨意選用不同的馬甲,會員們並不會知道你究竟是誰,在您不告知大眾的情況下:)當然，我們的系統默認使用您的用戶名進行填充</div>
		</div>
		<div class="form-group">
			<label>標題</label>
			<input type="text" name="title" value="" class="form-control">
		</div>
		<div class="form-group">
			<label>一句話介紹</label>
			<input type="text" name="summary" value="" class="form-control" placeholder="請在這裡填入一句話簡介幫助網友理解這個主題^^">
		</div>
		<div class="form-group">
			<label>內容</label>
			<textarea rows="16" class="form-control" name="content"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-success glyphicon glyphicon-pencil" type="submit">送出貼子</button>
		</div>
	</div>
</form>
</div>
@endsection