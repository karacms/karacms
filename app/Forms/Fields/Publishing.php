<?php
namespace App\Forms\Fields;

use App\EasyCall;
use App\Forms\Abstracts\BaseField;
use Carbon\Carbon;

class Publishing extends BaseField
{
    use EasyCall;

    private function getFields()
    {
        return [
            'type' => 'card',
            'id' => 'publishing',
            'title' => 'Publishing',
            'fields' => [
                [
                    'type' => 'hidden',
                    'key' => 'creator_id',
                    'default' => 1
                ],
                [
                    'type' => 'hidden',
                    'key' => 'type',
                    'default' => 'post'
                ],
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
    }

    public function render()
    {
        return $this->form->renderField($this->getFields());
    }
}