@extends('layouts.app')

@section('content')
<!--new-->
<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-danger" >{{$errors->first()}}</div>
    @endif
     <form class="form-horizontal" method="POST" action="{{ route('register') }}">
    <div class="center-block" style="max-width:520px;">
        
        <div class="form-group">
            <label>用戶名</label>
            <input type="text" name="name" value="" class="form-control" />
        </div>
        <div class="form-group">
            <label>電子郵箱</label>
             <div class="input-group">
            <input id="email" type="email" name="email" value="" class="form-control" placeholder="您的郵箱將用於登入" />
             <span class="input-group-btn">
                    <button class="btn btn-default" type="button" Onclick="randmail()">隨機郵箱</button>
                </span>

        </div>
        </div>
        <div class="form-group" id="status" style="display:none;">
        </div>
        <div class="form-group">
            <label>密碼</label>
            <input type="password" class="form-control" name="password" />
        </div>
        <div class="form-group">
            <label>確認密碼</label>
            <input type="password" class="form-control" name="password_confirmation" />
        </div>
         
            {{ csrf_field() }} 

        <div class="form-group " align="center">
           <button class="btn  btn-primary">註冊</button>
        </div>
    </div>
</form>
</div>
<script>
    function randmail(){
        $("#email").val("{{rand(100000,999999999)}}@<?php echo str_random(3); ?>.com");
        $("#status").show();
     $("#status").html("<div class='alert alert-info'>郵箱生成完成,該郵箱不具備任何發信/收件功能.若需獲取一個新的隨機郵箱，請刷新本頁面</div>");
    }

</script>
@endsection
