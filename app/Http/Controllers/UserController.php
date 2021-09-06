<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if ($request->q) {
            $users = User::where('role','!=','admin')->where('name','like','%'.$request->q.'%')->orderBy('id', 'desc')->paginate(3);
        } else {
            $users = User::where('role','!=','admin')->orderBy('id', 'desc')->paginate(3);
        }
        return view('admin.user', [
            'users' => $users,
            'q' => $request->q
        ]);
    }

    public function profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return view('admin.profile', [
            'user' => $user,
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
            User::create($data);
            return redirect("admin/user")->with('success', 'Create success !');
        } catch (Exception $e) {
            return redirect("admin/user")->with('error', $e->getMessage());
        }

        return redirect("admin/user")->with('error', 'ERROR');
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
            $user = User::find($id);
            $user->update($data);
            $user->save();
            return redirect("admin/user")->with('success', 'Update success !');
        } catch (Exception $e) {
            return redirect("admin/user")->with('error', $e->getMessage());
        }

        return redirect("admin/user")->with('error', 'ERROR');
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect("admin/user")->with('success', 'Delete success !');
        } catch (Exception $e) {
            return redirect("admin/user")->with('error', $e->getMessage());
        }

        return redirect("admin/user")->with('error', 'ERROR');
    }
}
