<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Auth;
class TopicController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$topic = Topic::orderby('updated_at','desc')->paginate(20);
    	return view('welcome')->with('topic',$topic);
    }
    public function create()
    {
    	if(Auth::guest()){
    		return "非常抱歉，您沒有登入，無法進行發帖";
    	}else{
    		return view('topic.create');
    	}
    	
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:30',
            'username' => 'required|max:8',
            'content' => 'required|min:6',
            'summary' => 'required|max:55',
        ]);
        if(Auth::guest() || Auth::user()->is_block != 1)
        {
            return redirect('/topic/create')->with('status','danger')->with('message','抱歉,您沒有登入系統或沒有本站發帖權限');
        }
        $topic = new Topic;
        $topic->user_id = Auth::id();
        $topic->status = 1;
        $topic->reply_count = 0;
        $topic->summary = e($request->input('summary'));
        $topic->title = e($request->input('title'));
        $topic->username = e($request->input('username'));
        $topic->content = nl2br($request->input('content'));
        $topic->save();
        return redirect('/')->with('status','success')->with('message','發帖成功,謝謝您:)');
    }
    public function show(Topic $topic)
    {
        if($topic->status == 2)
        {
            return redirect('/')->with('status','info')->with('message','本帖被管理員限制訪問,請發信申請解除');
        }else
        {
            $reply = Topic::find($topic->id)->comments()->paginate(40);
            return view('topic.show')->with('topic',$topic)->with('reply',$reply);
        }
    }
}
