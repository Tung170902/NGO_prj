<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog\Post;
use App\Models\Blog\Category;
use Exception;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(Request $request)
    {
        if ($request->q) {
            $posts = Post::where('name', 'like', '%' . $request->q . '%')->orderBy('id', 'desc')->paginate(3);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(3);
        }


        return view('admin.blog.post.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'q' => $request->q
        ]);
    }


    public function create(Request $request)
    {

        if ($request->hasFile('thumbnail')) {
            $originName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('thumbnail')->move(public_path('images'), $fileName);
            $url = asset('images/' . $fileName);
        } else {
            return redirect("admin/blog/post")->with('error', 'Thumbnail required !');
        }


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->category_id == 0) {
            return redirect("admin/blog/post")->with('error', 'Category required !');
        }

        $data = $request->all();
        $data['content'] = $data['wysiwyg-editor'] ?? ' ';
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;
        $data['thumbnail'] = $url;

        try {
            Post::create($data);
            return redirect("admin/blog/post")->with('success', 'Create success !');
        } catch (Exception $e) {
            return redirect("admin/blog/post")->with('error', $e->getMessage());
        }

        return redirect("admin/blog/post")->with('error', 'ERROR');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->all();
        $data['description'] = $data['wysiwyg-editor'] ?? ' ';
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;

        if (isset($data['active']) && $data['active']) {
            $data['active'] = true;
        } else {
            $data['active'] = false;
        }

        try {
            $post = Post::find($id);
            if (!$request->hasFile('thumbnail')){
                $data['thumbnail'] = $post->thumbnail;
            } else {
                if ($request->hasFile('thumbnail')) {
                    $originName = $request->file('thumbnail')->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $request->file('thumbnail')->getClientOriginalExtension();
                    $fileName = $fileName . '_' . time() . '.' . $extension;
                    $request->file('thumbnail')->move(public_path('images'), $fileName);
                    $url = asset('images/' . $fileName);
                    $data['thumbnail'] = $url;
                } else {
                    return redirect("admin/blog/post")->with('error', 'Thumbnail required !');
                }
            }
            $post->update($data);
            $post->save();
            return redirect("admin/blog/post")->with('success', 'Update success !');
        } catch (Exception $e) {
            return redirect("admin/blog/post")->with('error', $e->getMessage());
        }

        return redirect("admin/blog/post")->with('error', 'ERROR');
    }

    public function delete($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();
            return redirect("admin/blog/post")->with('success', 'Delete success !');
        } catch (Exception $e) {
            return redirect("admin/blog/post")->with('error', $e->getMessage());
        }

        return redirect("admin/blog/post")->with('error', 'ERROR');
    }
}
