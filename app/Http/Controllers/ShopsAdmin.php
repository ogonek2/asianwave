<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use App\Models\Shops;

class ShopsAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Shops', [
            'Shops' => Shops::all()
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
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $compressedPath = null;

        if ($req->hasFile('banner')) {
            $image = $req->file('banner');

            $img = Image::make($image->getRealPath());

            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $fileName = uniqid() . '.webp';
            $compressedPath = 'shops/' . $fileName;

            $fullDir = storage_path('app/public/shops');

            if (!file_exists($fullDir)) {
                mkdir($fullDir, 0755, true);
            }

            $img->encode('webp', 80)->save(storage_path('app/public/' . $compressedPath));
        }

        Shops::create([
            'name' => $req->name,
            'description' => $req->description,
            'banner' => $compressedPath,
            'link' => $req->link ?? null
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
        $getPost = Shops::findOrFail($id);

        if ($getPost) {
            $validator = $req->validate([
                'name' => 'required|max:255',
                'description' => 'required',
            ]);

            if ($req->hasFile('banner')) {
                $image = $req->file('banner');

                $img = Image::make($image->getRealPath());

                $img->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $fileName = uniqid() . '.webp';
                $compressedPath = 'shops/' . $fileName;

                $fullDir = storage_path('app/public/shops');

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
                'description' => $req->description,
                'link' => $req->link ?? null
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
        Shops::findOrFail($id)->delete();

        return redirect()->back();
    }
}
