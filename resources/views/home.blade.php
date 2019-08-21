@extends('layouts.app')

@section('content')
<style>#h-thread{display: block;padding: 14px 12px;position: relative;background-color: #fff;}.valign-between{display: flex;justify-content: space-between;}#h-thread .item-top{font-size: .9em;color: #999;height: 20px;}.item-title{padding-top: 9px;color:#999;}</style>
<div class="container">
    @if(Auth::user()->is_block == 0)
<div class="alert alert-warning">您没有发帖凭证将无法在本站发帖，请先申请</div>
@elseif(Auth::user()->is_block == 2)
<div class="alert alert-danger">这号被永封了,没救了</div>
@else
<div class="alert alert-info">该帐号发帖状态正常^^</div>

@endif
    <div class="panel panel-success">
        <div class="panel-heading">
            用戶信息
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label>
                   用戶郵箱
                </label>
                <input type="email" class="form-control" value="{{Auth::user()->email}}" />
            </div>
             <div class="form-group">
                <label>
                    用戶名(UID:{{Auth::id()}})
                </label>
                <input type="email" class="form-control" value="{{Auth::user()->name}}" />
            </div>
            <div class="form-group">
                <label>加入本站時間</label>
                <p>{{Auth::user()->created_at}}</p>
            </div>
        </div>
    </div>
<div>
    @if(Auth::user()->is_block == 0)
    <form action="/get_token" method="post">
        {{ csrf_field() }}
    <div class="page-header">
  <h1>申請發帖憑證</h1>
</div>
    <div class="form-group">
        <label>驗證碼</label>
        <div class="input-group">
        <input type="text" name="captcha" class="form-control" />
        <span class="input-group-btn">
            <button class="btn btn-default" id="yanzheng" type="button">獲取/刷新驗證碼</button>
        </span>
    </div>
    </div>
    <div class="form-group">
<span id="yanzheng_div"></span>
    </div>
    <div class="form-group">
        <button class="btn btn-success btn-lg">送出申請</button>
    </div>
</div>
</form>
@endif
</div>
<div class="container">
    <p>【您最新的五條帖子】</p>
    @foreach($topic as $list)
    <div id="h-thread">
        <div class="valign-between item-top"><span class="pull-left"><span class="
glyphicon glyphicon-user">{{$list->username}}</span>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-comment">{{$list->reply_count}}</span></span><span class="pull-right glyphicon glyphicon-dashboard">{{$list->created_at}}</span></div>
        <div class="item_title"><a href="">{{$list->title}}</a></div>
    </div>

    @endforeach
    <div style="margin-bottom:1em;">&nbsp;</div>
</div>
<script>
    $("#yanzheng").click(function(){
$.ajax({
'url' :'/yanzheng',
'type': 'get',
success:function(data){
$("#first_echo").hide();
$("#yanzheng_div").html("<img src="+data.data+" />");
}

});
    });
 </script>

@endsection
