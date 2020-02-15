<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $media = Media::ofTag($request->tag)->ofType($request->type)->paginate(20);
        $allTags = Media::allAvailableTags();

        return frontend('media/index', compact('media', 'allTags'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $file = Media::findOrFail($id);
        $allTags = Media::allAvailableTags();
        $fileTags = $file->tags()->pluck('groups.id')->toArray();
        
        return view('media/edit', compact('file', 'allTags', 'fileTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array_filter($request->all());

        $media = Media::find($id);
        $media->update($data);

        // Sync tags
        if (isset($data['tags'])) {
            $media->tags()->sync($data['tags']);
        }

        return back()->withMessage('Media updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request, Response $response)
    {
        if ($request->file('media')) {

            $files = $request->file('media');

            foreach ($files as $file) {
                $fileName = $file->storeAs('uploaded', $file->getClientOriginalName(), 'public_media');
                $mediaPath = public_path('media/' . $fileName);

                $image = \Image::make($mediaPath);

                // @todo: Specify URL here
                Media::create([
                    'title' => $file->getClientOriginalName(),
                    'url' => 'media/' . $fileName,
                    'type' => $file->getMimeType(),
                    'meta' => [
                        'size' => $file->getSize(),
                        'exif' => $image->exif()
                    ]
                ]);
            }

            // $avatarName = last(explode('/', $avatarPath));
            return [
                'status' => 'success'
            ];
        }

        return [
            'status' => 'Error'
        ];
    }
}
