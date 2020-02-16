<?php
namespace App\Services;

class DbService
{
    public function isConnected()
    {
        try {
            \DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }
}
