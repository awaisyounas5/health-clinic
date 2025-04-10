<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    use ImageUpload;
    public function index()
    {
        $blogs = Blog::where('created_by', Auth::user()->id)->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    public function create()
    {
        $blog_categories = BlogCategory::where('created_by', Auth::user()->id)->get();
        return view('admin.blogs.create',compact('blog_categories'));
    }

    public function store(Request $request)
    {

        try {
            if($request->hasFile('thumbnail')){
                $file_name=$this->imageUpload($request->thumbnail);
            }
            $slug=Str::slug($request->title);
            DB::beginTransaction();
            Blog::create([
                'title' => $request->title,
                'slug'=>$slug,
                'blog_category_id'=>$request->category_id,
                'description' => $request->description,
                'thumbnail'=>$file_name?? null,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Blog has been created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id){
        $blog = Blog::find($id);
        $blog_categories = BlogCategory::where('created_by', Auth::user()->id)->get();
        return view('admin.blogs.edit',compact('blog','blog_categories'));
    }

    public function update($id,Request $request)
    {

        try {
            $blog = Blog::find($id);
            if($request->hasFile('thumbnail')){
                $file_name=$this->imageUpload($request->thumbnail);
            }
            $slug=Str::slug($request->title);
            DB::beginTransaction();
            $blog->update([
                'title' => $request->title,
                'slug'=>$slug,
                'blog_category_id'=>$request->category_id,
                'description' => $request->description,
                'thumbnail'=>$file_name?? $blog->thumbnail,
                'status'=>$request->status,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Blog has been udpate successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $blog = Blog::find($id);
            if ($blog) {
                DB::beginTransaction();
                $blog->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Blog has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
