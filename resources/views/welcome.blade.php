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
					請仔細閱讀論壇規則後再發布新話題,否則我們將可能刪除您的貼子或者封禁您的帳號:)
				</div>
				<ul class="list-group">
    <li class="list-group-item">本站<font color=red>只接受</font>時事政治/家長不宜的話題,其他帖子請移步另一個大家知道的論壇^^</li>
    <li class="list-group-item">本站不得發布任何QQ群或者其他廣告連結</li>
    <li class="list-group-item">不得在本站公開發布您的個人隱私訊息,為了您的安全著想</li>
    <li class="list-group-item">本站沒有管理員會在帖子下面給予管理方面的回覆,有事請給我們發郵件</li>
    <li class="list-group-item text-danger">不得外洩地址,否則我們會終止社區服務</li>
     <li class="list-group-item">我們不保證您在這裡的數據<b class="text-info">永久存在</b>,同時本站的刪封標準由管理員掌控</li>
  </ul>
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