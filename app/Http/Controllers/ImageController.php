<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();

        return view('admin.images.index', compact('images'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => ['required', 'string', 'max:255'],
            'category_id'  => ['required', 'exists:categories,id'],
            'image'        => ['required', 'string'],
            'description'  => ['nullable', 'string'],
        ]);
        Image::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'link' => $request->image,
            'description' => $request->description
        ]);
        return redirect('/admin/images')->with('success', 'Successfully added new image');
    }

    public function create()
    {
        return view('admin.images.create', [
            'categories' => Category::all()
        ]);
    }


    public function edit($id)
    {

        return view('admin.images.edit', [
            'image' => Image::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }


    public function update(Request $request, Image $image)
    {
        $this->validate($request, [
            'name'         => ['required', 'string', 'max:255'],
            'category_id'  => ['required', 'exists:categories,id'],
            'image'        => ['required', 'string'],
            'description'  => ['nullable', 'string'],
        ]);

        if ($request->image !== $image->link) {
            Storage::disk('public')->delete($image->link);
        }

        $image->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'link' => $request->image,
            'description' => $request->description
        ]);

        return redirect('/admin/images')->with('success', 'Successfully added new image');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        Storage::disk('public')->delete($image->link);
        return response("success", 204);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:10240',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = '/images/' . $name;
            Storage::disk('public')->put($filePath, fopen($file, 'r+'), 'public');
            return $filePath;
        }
    }

    public function delete_image(Request $request)
    {
        $fileId = $request->getContent();
        Storage::disk('public')->delete($fileId);
        return response('', 204);
    }
}
