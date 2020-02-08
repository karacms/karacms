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
    public function index()
    {
        $media = Media::paginate(20);

        return frontend('media/index', compact('media'));
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
    public function update(Request $request, $id)
    {
        //
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
