<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $audio = public_path('media/uploaded/nhatky.mp3');
        // $getID3 = new \getID3();
        // $audioInfo = $getID3->analyze($audio);
        // // $getID3->CopyTagsToComments($audioInfo);
        // dd($audioInfo);

        // $wallpaper = public_path('media/uploaded/wallpapers.zip');
        // $getID3 = new \getID3();
        // $wallpaperInfo = $getID3->analyze($wallpaper);
        // dd($wallpaperInfo);

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
                $fileType = $file->getMimeType();

                $fileName = $file->getClientOriginalName();
                $filePath = public_path('media/uploaded/' . $fileName);

                $media = [
                    'title' => $fileName,
                    'url' => 'media/uploaded/' . $fileName,
                    'type' => $fileType,
                    'meta' => [
                        'size' => $file->getSize()
                    ]
                ];

                // Handle image manipulation during upload: jpg, jpeg
                if ($fileType === 'image/jpeg') {
                    // Fix the image orientation
                    $image = \Image::make($file->getPathname())->orientate();
                    $image->save($filePath);

                    $media['meta']['exif'] = $image->exif();
                    $media['meta']['width'] = $image->width();
                    $media['meta']['height'] = $image->height();
                } else {
                    // Handle Audio: .mp3
                    $getId3SupportedTypes = [
                        'audio/mpeg', 
                        'video/avi', 
                        'video/quicktime', 
                        'image/png', 
                        'image/gif', 
                        'application/pdf', 
                        'application/zip',
                        'video/x-matroska'
                    ];
                    
                    $metadataFields = [
                        'audio',
                        'playtime_seconds',
                        'playtime_string',
                        'tags.id3v2',
                        'comments',
                        'mpeg',
                        'video',
                        'zip.entries_count',
                        'zip.files',
                        'zip.uncompressed_size',
                        'video/webm',
                        'audio/webm',
                        'application/x-rar-compressed',
                        'application/octet-stream',
                        'application/x-zip-compressed',
                        'multipart/x-zip',
                    ];

                    if (in_array($fileType, $getId3SupportedTypes)) {
                        $file->storeAs('uploaded', $fileName, 'public_media');

                        // $audio = public_path('media/uploaded/SampleAudio_0.4mb.mp3');
                        $getID3 = new \getID3();
                        $analyzedInfo = $getID3->analyze($filePath);

                        if ($analyzedInfo) {
                            foreach ($metadataFields as $analyzedField) {
                                $analyzedValue = Arr::get($analyzedInfo, $analyzedField);

                                if (is_null($analyzedValue)) { 
                                    continue;
                                }
                                
                                Arr::set($media['meta'], $analyzedField, $analyzedValue);
                            }
                        }
                    }
                }

                Media::create($media);
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
