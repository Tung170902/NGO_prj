<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use Exception;
use Illuminate\Support\Str;

class CampaignController extends Controller
{

    public function index(Request $request)
    {
        if ($request->q) {
            $campaigns = Campaign::where('title', 'like', '%' . $request->q . '%')->orderBy('id', 'desc')->paginate(3);
        } else {
            $campaigns = Campaign::orderBy('id', 'desc')->paginate(3);
        }

        return view('admin.campaign', [
            'campaigns' => $campaigns,
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
            return redirect("admin/campaign")->with('error', 'Thumbnail required !');
        }


        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['content'] = $data['wysiwyg-editor'] ?? ' ';
        $data['slug'] = Str::slug($data['title']);
        $data['total_donate'] = 0;
        $data['user_id'] = Auth::user()->id;
        $data['thumbnail'] = $url;

        try {
            Campaign::create($data);
            return redirect("admin/campaign")->with('success', 'Create success !');
        } catch (Exception $e) {
            return redirect("admin/campaign")->with('error', $e->getMessage());
        }

        return redirect("admin/campaign")->with('error', 'ERROR');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'total' => 'required'
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
            $post = Campaign::find($id);
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
                    return redirect("admin/campaign")->with('error', 'Thumbnail required !');
                }
            }
            $post->update($data);
            $post->save();
            return redirect("admin/campaign")->with('success', 'Update success !');
        } catch (Exception $e) {
            return redirect("admin/campaign")->with('error', $e->getMessage());
        }

        return redirect("admin/campaign")->with('error', 'ERROR');
    }

    public function delete($id)
    {
        try {
            $post = Campaign::find($id);
            $post->delete();
            return redirect("admin/campaign")->with('success', 'Delete success !');
        } catch (Exception $e) {
            return redirect("admin/campaign")->with('error', $e->getMessage());
        }

        return redirect("admin/campaign")->with('error', 'ERROR');
    }
}
