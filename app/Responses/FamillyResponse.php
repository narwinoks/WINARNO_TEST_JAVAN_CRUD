<?php

namespace App\Responses;

class FamillyResponse
{
    public const SUCCESS_RESPONSE = [
        'success' => true,
        'code' => '200',
        'message' => 'Successfully created data',
    ];

    public const FAMILLY_SUCCESS = [
        'success' => true,
        'code' => '200',
        'message' => 'Successfully',
    ];

    public const FAMILLY_NOT_FOUND = [
        'success' => false,
        'code' => '404',
        'message' => 'Data not found',
    ];
    public const FAMILLY_FAILED = [
        'success' => false,
        'code' => '404',
        'message' => 'Data not found',
    ];

}
