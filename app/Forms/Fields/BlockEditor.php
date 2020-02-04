<?php
namespace App\Forms\Fields;

use App\Forms\Abstracts\BaseField;

class BlockEditor extends BaseField
{
    public function getDefault()
    {
        return json_encode([]);
    }
}