<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog\Category;
use Exception;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->q) {
            $categories = Category::where('name','like','%'.$request->q.'%')->orderBy('id', 'desc')->paginate(3);
        } else {
            $categories = Category::orderBy('id', 'desc')->paginate(3);
        }
        return view('admin.blog.category.index', [
            'categories' => $categories,
            'q' => $request->q
        ]);
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->all();
        $data['description'] = $data['wysiwyg-editor'] ?? ' ';
        $data['slug'] = Str::slug($data['name']);
        $data['user_id'] = Auth::user()->id;

        try {
            Category::create($data);
            return redirect("admin/blog/category")->with('success', 'Create success !');
        } catch (Exception $e) {
            return redirect("admin/blog/category")->with('error', $e->getMessage());
        }

        return redirect("admin/blog/category")->with('error', 'ERROR');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);


        $data = $request->all();
        $data['description'] = $data['wysiwyg-editor'] ?? ' ';
        $data['slug'] = Str::slug($data['name']);
        $data['user_id'] = Auth::user()->id;

        if (isset($data['active']) && $data['active']) {
            $data['active'] = true;
        } else {
            $data['active'] = false;
        }

        try {
            $category = Category::find($id);
            $category->update($data);
            $category->save();
            return redirect("admin/blog/category")->with('success', 'Update success !');
        } catch (Exception $e) {
            return redirect("admin/blog/category")->with('error', $e->getMessage());
        }

        return redirect("admin/blog/category")->with('error', 'ERROR');
    }

    public function delete($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect("admin/blog/category")->with('success', 'Delete success !');
        } catch (Exception $e) {
            return redirect("admin/blog/category")->with('error', $e->getMessage());
        }

        return redirect("admin/blog/category")->with('error', 'ERROR');
    }
}
