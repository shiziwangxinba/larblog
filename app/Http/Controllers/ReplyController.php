<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Auth;
use App\Reply;
class ReplyController extends Controller
{
    //
    public function store(Request $request)
    {
    	if(Auth::guest())
    	{
    		return "您未登入無法使用回覆功能";
    	}else
    	{
    		$this->validate($request,[
    			'topic_id' => 'required',
    			'content' => 'required|min:6',
    			'username' => 'required|max:8',
    		]);
    		$topic = Topic::find($request->input('topic_id'));
    		if($topic && $topic->status == 1)
    		{
    			if(Auth::user()->is_block == 1)
    			{
    				$reply = new Reply;
    				$reply->topic_id = $request->input('topic_id');
    				$reply->is_delete = 0;
    				$reply->user_id = Auth::id();
    				$reply->content = nl2br($request->input('content'));
    				$reply->username = e($request->input('username'));
    				if($request->input('quotereply'))
    				{
    					$reply->quotecontent = $request->input('quotereply');
    				}else
    				{
    					$reply->quotecontent = '';
    				}
    				$reply->save();
    				$topic->reply_count = $topic->reply_count+1;
    				$topic->save();
    				return redirect('/topic/'.$topic->id)->with('status','success')->with('message','回覆成功,謝謝您');
    			}else
    			{
    				return redirect('/')->with('status','danger')->with('message','您在本站沒有發帖權限,請前往用戶中心開通');
    			}
    		}else
    		{
    			return redirect('/')->with('status','info')->with('message','本帖已經被刪除,您無法再回覆:(');
    		}
    	}
    }
    public function show(Reply $reply)
    {
        if(Auth::guest())
        {
            return response()->json([
                'code' => '10003',
                'message' => '請先登入系統',
                'data' => '',
            ]);
        }
        if($reply->is_delete == 1)
        {
            return response()->json([
                'code' => '10004',
                'message' => '本帖已經被刪除',
                'data' =>'',
            ]);
        }else
        {
            return response()->json([
                'code' => '200',
                'message' => '獲取回覆數據成功:)',
                'data' => "引用來自&nbsp;".$reply->username."&nbsp;的回帖<br/>".$reply->content,
            ]);
        }
    }
}
