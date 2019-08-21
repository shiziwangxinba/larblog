@extends('layouts.app')
@section('content')
<div class="container">
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
<div style="margin:12px;"></div>
<div class="panel panel-default">
		<div class="panel-heading" style="background:#fff">
			{{$topic->username}}&nbsp;&nbsp;回覆於{{$topic->created_at}}&nbsp;&nbsp;<span class="pull-right" style="font-weight:bold" Onclick="quotereply(1230);">No.12038</span>
		</div>
		<div class="panel-body">
			王陌回到家门口，摘下手套，从公文包里拿出钥匙开了门。<br>
　　进屋后，他在玄关换好鞋，脱掉大衣挂在衣钩上，公文包也放在一旁，稍作停顿，循着声音走进了厨房。厨房里熟悉的身影忙碌着，一会儿拿起刀处理食材，一会儿又掀开锅盖往里面添汤加料，王陌倚靠在门旁盯着对方看，一言不发。
		</div>
	</div>
	<div class="form-group" style="max-width:260px;margin-top:120px;">
		<label>暱稱</label>
		<input type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
		<label>內容</label>
		<textarea class="form-control" name="content" rows="6"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-lg btn-primary" type="submit">提交</button>
	</div>
	</div>
</div>
<script>
	function quotereply(id){
		alert(id);
	}
	</script>
@endsection