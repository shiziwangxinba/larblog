@extends('layouts.app')
@section('content')
<div class="container">
	@include('layouts.has')
	<div class="center-block" style="max-width:760px;">
		<div class="text-left"><h3>{{$topic->title}}</h3></div>
		<p class="text-info">{{$topic->summary}}</p>
		<div class="panel panel-default">
			<div class="panel-heading" style="background:#fff">
				{{$topic->username}}發布於{{$topic->created_at}}<span class="pull-right">Re:{{$topic->reply_count}}</span>
			</div>
<div class="panel-body">
	{!! $topic->content !!}
</div>
</div>
@foreach($reply as $list)
<div style="margin:12px;"></div>
<div class="panel panel-default">
		<div class="panel-heading" style="background:#fff">
			{{$list->username}}&nbsp;&nbsp;回覆於{{$list->created_at}}&nbsp;&nbsp;<span class="pull-right" style="font-weight:bold" Onclick="quotereply({{$list->id}});">No.{{$list->id}}</span>
		</div>
		<div class="panel-body">
			@if($list->is_delete == 1)
			<font color=red>本帖已經被管理員屏蔽,可發信申訴</font>
			@else
			@if($list->quotecontent)
			<div class="bg-info" style="font-size:13px;padding:10px;margin-bottom:6px;">{!! str_limit($list->quotecontent,'100') !!}</div>
			@endif
			{!! $list->content !!}
			@endif
		</div>
	</div>
@endforeach
<div align="center">{{$reply->links()}}</div>
	<form action="/reply/create" method="post" style="margin-top:60px;">
	<!--hidden-->
	{{ csrf_field() }}
	<input type="hidden" value="{{$topic->id}}" name="topic_id" />
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			{{$errors->first()}}
		</div>
		@endif
	<div class="form-group" style="max-width:260px;">
		<label>暱稱</label>
		<input type="text" name="username" class="form-control" value="= =" placeholder="本站不紀錄馬甲">
	</div>
	<div class="form-group">
		<label>內容</label>
		<textarea class="form-control" name="content" rows="6" placeholder="回覆內容請大於五個漢字^^">{{old('content')}}</textarea>
	</div>
	<div id="hidden" class="form-group">
	</div>
	<div class="form-group">
		<button class="btn btn-lg btn-primary" type="submit">提交</button>
	</div>
</form>
	</div>
</div>
<script>
	function quotereply(id){
		$.ajax({
			'url' :'/reply/'+id,
			'type' :'get',
			success:function(data){
				if(data.code == 200)
				{
					$("#hidden").html("<label>引用内容</label><textarea class='form-control' rows='4' name='quotereply'>"+data.data+"</textarea>");
					 window.scrollTo(0, document.documentElement.scrollHeight-document.documentElement.clientHeight);

				}else
				{
					alert('錯誤返回:'+data.message);
				}
				
			}
		});
	}
	</script>
@endsection