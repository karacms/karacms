<?php

namespace App\Forms\Fields;

use App\Forms\Abstracts\BaseField;
use Carbon\Carbon;

class DateTime extends BaseField
{
    public $class = 'px-2 py-1 rounded-sm border border-gray-200 w-full';

    /**
     * Output format for datetime-local field
     */
    public function getDefault()
    {
        $default = parent::getDefault();
        
        if (is_string($default)) {
            $default = Carbon::createFromDate($default);
        }

        return $default->format('Y-m-d\TH:i');
    }

    public function patch($value)
    {
        return Carbon::createFromDate($value)->format('Y-m-d H:i:s');
    }
}