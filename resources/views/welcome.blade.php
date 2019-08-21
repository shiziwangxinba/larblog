@extends('layouts.app')
@section('content')
<div class="container">
	@include('layouts.has')
	<div class="alert alert-danger"><i class="glyphicon glyphicon-info-sign"></i>若有需要聯絡管理者,請透過<a href="javascript:;" class="alert-link">&nbsp;{{config('app.email')}}&nbsp;</a>向我們發信</div>
	<div class="rows">
		<div class="col-md-3 col-lg-3">
			<button class="btn btn-block btn-info" Onclick="window.location.href='/topic/create'">發新話題</button>
			<div class="panel panel-info" style="margin-top:7px;margin-bottom:1em;">
				<div class="panel-heading" role="tab" id="bbsrule">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					論壇規則
				</a>
				</div>
				  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="bbsrule">
				<div class="panel-body">
					<h3>在發帖前請閱讀</h3>
					<p>本站話題敏感,您不得將本站地址發布到任何公開網路社群,否則我們將有可能終止對您的服務。</p>
					<p>為了安全著想,本站開閉時間由站方決定,另外我們會週期性地清理帖子以保證發帖者的安全.</p>
					<p>不得在本站發布任何QQ群或者其他廣告連結，尤其是淘寶網</p>
					<p>不得在本站公開發布您的任何私人訊息，為了您的安全著想</p>
					<p class="text-danger">另外,本站沒有管理員會公開在帖子下面留言,一般情況下我們都將通過數據庫管理工具來對帖子/用戶進行管理,一切使用管理員馬甲的帖子都是虛假的</p>
				</div>
			</div>
			</div>
		</div>
		<div class="col-md-9 col-lg-9">

			@foreach($topic as $list)
			<li class="list-group-item">
				<span class="pull-right badge">{{$list->reply_count}}</span>
				<div class="topicinfo">
					<a href="/topic/{{$list->id}}" class="h-title">{{$list->title}}</a>
				</div>
				<div class="topic-info">
					最後回覆:{{$list->updated_at}}&nbsp;·&nbsp;發文者:{{$list->username}}
				</div>
				<div id="summarylist" class="list-group-item-text">{{$list->summary}}</div>
			</li>
			@endforeach
			<div align="center">{{$topic->links()}}</div>
		</div>
	</div>
</div>
<style>.h-title{color:#4169E1;font-size:18px;}.topic-info{color:#4682B4;font-size:12px;}#summarylist{font-size:14px;color:#999;margin-top:1px;clear:both;}</style>
@endsection