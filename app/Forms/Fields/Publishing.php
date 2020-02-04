<?php
namespace App\Forms\Fields;

use App\Forms\Abstracts\BaseField;
use Carbon\Carbon;

class Publishing extends BaseField
{
    public function render()
    {
        $fields = [
            'type' => 'card',
            'id' => 'publishing',
            'title' => 'Publishing',
            'fields' => [
                [
                    'type' => 'select',
                    'key' => 'status',
                    'id' => 'status',
                    'title' => 'Status',
                    'options' => [
                        'draft' => 'Draft',
                        'live' => 'Live'
                    ],
                    'default' => 'live'
                ],
                [
                    'type' => 'datetime',
                    'key' => 'created_at',
                    'id' => 'created-at',
                    'title' => 'Date Created',
                    'default' => Carbon::now()->format('Y-m-d\TH:i')
                ],
                [
                    'type' => 'datetime',
                    'key' => 'updated_at',
                    'id' => 'updated-at',
                    'title' => 'Last Updated',
                    'default' => Carbon::now()->format('Y-m-d\TH:i')
                ],
                [
                    'type' => 'submit',
                    'class' => 'p-2 rounded-sm bg-blue-500 text-white hover:bg-blue-700',
                    'id' => 'submit',
                    'title' => 'Save Changes'
                ]
            ]
        ];

        return $this->form->renderField($fields);
    }
}