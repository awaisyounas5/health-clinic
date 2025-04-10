<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'active')->take(3)->get();
        return view('welcome', compact('blogs'));
    }
    public function blog()
    {
        $blogs = Blog::where('status', 'active')->paginate(5);
        return view('blog', compact('blogs'));
    }
    public function single_blog($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 'active')->first();
        $blogs = Blog::where('status', 'active')->take(3)->get();
        $previous = Blog::where('id', '<', $blog->id)->where('status', 'active')->orderBy('id', 'desc')->first();
        $next = Blog::where('id', '>', $blog->id)->where('status', 'active')->orderBy('id', 'asc')->first();
        $category_counts = BlogCategory::select('id', 'title', 'slug')
            ->withCount(['blogs as count'])
            ->get();

        return view('blog_single', compact('blog', 'blogs', 'next', 'previous', 'category_counts'));
    }
    public function contact_us()
    {
        return view('contact_us');
    }
    public function contact_us_store(Request $request)
    {
        try {
            DB::beginTransaction();
            $contact_us = ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            DB::commit();
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUsMail($details));
            return redirect()->back()->with('success', 'Your message has been received');
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function appointment()
    {
        return view('appointment');
    }
    public function about_us()
    {
        return view('about_us');
    }
}
