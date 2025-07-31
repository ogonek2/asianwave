<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\News;
use App\Models\NewsGroup;

class NewsAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.News', [
            'News' => News::all(),
            'Group' => NewsGroup::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = $req->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $compressedPath = null;

        if ($req->hasFile('banner')) {
            $image = $req->file('banner');

            $img = Image::make($image->getRealPath());

            $img->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $fileName = uniqid() . '.webp';
            $compressedPath = 'news/' . $fileName;

            $fullDir = storage_path('app/public/news');

            if (!file_exists($fullDir)) {
                mkdir($fullDir, 0755, true);
            }

            $img->encode('webp', 80)->save(storage_path('app/public/' . $compressedPath));
        }

        News::create([
            'name' => $req->name,
            'title' => $req->title,
            'description' => $req->sub_description ?? null,
            'content' => $req->content ?? null,
            'banner' => $compressedPath,
        ]);

        return redirect()->back()->with('success', 'Успішно створено!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $getPost = News::findOrFail($id);

        if ($getPost) {
            $validator = $req->validate([
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
            ]);

            if ($req->hasFile('banner')) {
                $image = $req->file('banner');

                $img = Image::make($image->getRealPath());

                $img->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $fileName = uniqid() . '.webp';
                $compressedPath = 'news/' . $fileName;

                $fullDir = storage_path('app/public/news');

                if (!file_exists($fullDir)) {
                    mkdir($fullDir, 0755, true);
                }

                $img->encode('webp', 80)->save(storage_path('app/public/' . $compressedPath));

                $getPost->update([
                    'banner' => $compressedPath,
                ]);
            }

            $getPost->update([
                'name' => $req->name,
                'title' => $req->title,
                'description' => $req->sub_description ?? null,
                'content' => $req->content ?? null,
            ]);

            return redirect()->back()->with('success', 'Успішно!');
        }

        return '404 - Not find is: #' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();

        return redirect()->back();
    }
}
