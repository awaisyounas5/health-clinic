<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $blog_categories = BlogCategory::where('created_by', Auth::user()->id)->get();
        return view('admin.blogs_category.index',compact('blog_categories'));
    }

    public function create()
    {

        return view('admin.blogs_category.create');
    }

    public function store(Request $request)
    {
        try {
            $slug=Str::slug($request->title);
            DB::beginTransaction();
            BlogCategory::create([
                'title' => $request->title,
                'slug'=>$slug,
                'description' => $request->description,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Blog category has been created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id){
        $blog_category = BlogCategory::find($id);
        return view('admin.blogs_category.edit',compact('blog_category'));
    }

    public function update($id,Request $request)
    {
        try {
            $slug=Str::slug($request->title);
            DB::beginTransaction();
            $blog_category = BlogCategory::find($id);
            $blog_category->update([
                'title' => $request->title,
                'slug'=>$slug,
                'description' => $request->description,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Blog category has been update successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $blog_categories = BlogCategory::find($id);
            if ($blog_categories) {
                DB::beginTransaction();
                $blog_categories->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Blog Category has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
