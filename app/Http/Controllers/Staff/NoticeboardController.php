<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Noticeboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeboardController extends Controller
{
    public function index(){
        $notices = Noticeboard::where('created_by', Auth::user()->created_by)->get();
        return view('staff.noticeboards.index', compact('notices'));
    }
}
