<?php

namespace App\Http\Controllers;

use App\Content;
use App\Forms\Form;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public $form;

    public function __construct()
    {
        $this->form = new Form([
            'id' => 'editor',
            'method' => 'post',
            'action' => url('dashboard/content'),
            'name' => 'mainEditorForm',
            'attributes' => '@submit.prevent="saveContent()"'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contentType = $request->type ?? 'post';
        $contents = Content::with('creator')->type($contentType)->paginate(20);
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
        
        $form = $this->form;
        $form->fields = $contentTypeData['fields'];
        $form->data = $content;

        return frontend('content/editor', compact('content', 'contentTypeData', 'form'));
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
        
        $contentTypeData = Content::getType($data['type']);
        $this->form->fields = $contentTypeData['fields'];
        $data = $this->form->patch($data);
        
        $content = Content::createWithMeta($data);
        
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
        
        $form = $this->form;
        $form->fields = $contentTypeData['fields'];
        $form->data = $content;
        $form->action = url('dashboard/content/' . $content->id);

        return view('content/editor', compact('content', 'contentTypeData', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $data = $request->all();

        $contentType = $content->type;
        $contentTypeData = Content::getType($contentType);

        $this->form->fields = $contentTypeData['fields'];
        $data = $this->form->patch($data);
        $content->updateWithMeta($data);

        return back()->withMessage($content->type . ' updated!');
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
