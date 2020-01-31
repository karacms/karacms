<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contentType = $request->type ?? 'post';
        $contents = Content::type($contentType)->paginate(20);
        $contentTypeData = Content::getType($contentType);

        return frontend('content/index', compact('contents', 'contentTypeData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contentType = $request->type ?? 'post';
        $contentTypeData = Content::getType($contentType);
        $content = new Content([
            'type' => $contentType
        ]);

        return frontend('content/editor', compact('content', 'contentTypeData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $content = Content::create($data);
        
        return redirect('dashboard/content/' . $content->id)->withMessage('Content created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return $this->edit($content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Content $content
     * @return \Illuminate\Http\Response
     */
    public function edit($content)
    {
        $contentType = $content->type;
        $contentTypeData = Content::getType($contentType);
        
        return view('content/editor', compact('content', 'contentTypeData'));
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
}
