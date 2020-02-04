<?php
namespace App\Forms\Fields;

use App\Forms\Abstracts\BaseField;

class BlockEditor extends BaseField
{
    public function __construct($props, $form)
    {
        $this->default = json_encode([]);
        
        parent::__construct($props, $form);
    }
}