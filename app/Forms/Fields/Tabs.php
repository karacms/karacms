<?php
namespace App\Forms\Fields;

use App\Forms\Abstracts\BaseField;

class Tabs extends BaseField
{
    public function getClass()
    {
        $positions = [
            'top' => '',
            'right' => 'flex flex-row-reverse',
            'bottom' => 'flex flex-col-reverse',
            'left' => 'flex flex-row'
        ];

        return $positions[$this->position];
    }

    //
}