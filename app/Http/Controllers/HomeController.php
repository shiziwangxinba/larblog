<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Topic;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest())
        {
            return view('auth.login');
        }else{
            $topic = User::find(Auth::id())->topic()->take(5)->orderby('id','desc')->get();
            return view('home')->with('topic',$topic);
        }
        
    }
    public function getcaptcha()
    {
        return response()->json([
            'code' => 200,
            'message' => '请求成功',
            'data' => captcha_src('math'),
        ]);
    }
    public function get_token(Request $request)
    {
        if(Auth::guest())
        {
            return "您无权如此";
        }else
        {
            $this->validate($request, [
    'captcha' => 'captcha|required',
    ]);
            if(Auth::user()->is_block != 0)
            {
                return "您无权如此";
            }
            DB::table('users')->where('id',Auth::id())->update(['is_block' => 1]);
            return redirect('/home');
        }
    }
}
