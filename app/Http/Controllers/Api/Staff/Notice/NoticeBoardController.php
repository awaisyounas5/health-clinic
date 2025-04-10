<?php

namespace App\Http\Controllers\Api\Staff\Notice;

use App\Http\Controllers\Controller;
use App\Models\Noticeboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeBoardController extends Controller
{
    public function index(){
        $notices = Noticeboard::where('created_by', Auth::user()->created_by)->get();
        return response()->json(['status'=>true,'notices'=>$notices]);
    }
}
