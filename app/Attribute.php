<?php
namespace App;

use Illuminate\Support\Facades\Blade;
use App\Content;

class Attribute
{
    use EasyCall;

    public ?int $contentId = null;
    public ?Content $content = null;

    private function forContent(int $id)
    {
        $this->contentId = $id;
        $content = Content::findOrFail($id);
        $this->content = $content;
    }

    public static function forCurrentContent()
    {
        $contentId = request()->get('id');

        return self::forContent($contentId);
    }

    public static function forUser($id)
    {

    }

    public static function forCurrentUser()
    {

    }

    private function renderAll($fields)
    {
        $template = '';

        foreach ($fields as $field) {
            $template .= self::render($field);
        }

        return $template;
    }

    private function render($field)
    {
        if (isset($field['key']) && isset($field['default'])) {
            $field = $this->mergeWithDb($field);
        }

        $fieldType = $field['type'] ?? 'text';
        
        return view('attributes/fields/' . $fieldType, compact('field'));
    }

    private function mergeWithDb($field)
    {
        // @todo: Check if it safe
        $content = $this->content ?? request()->route('content');
        $dbValue = isset($content) ? $content->data($field['key']) : null;
              
        $field['default'] = $dbValue ?? $field['default'];

        if ($field['type'] === 'editorjs') {
            if (empty($field['default']) || is_null($field['default'])) {
                $field['default'] = json_encode([]);
            }
        }

        return $field;
    }
}