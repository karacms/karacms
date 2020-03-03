<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbService
{
    public function isConnected()
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }

    public function isDbMigrated()
    {
        return Schema::hasTable('migrations');
    }
}
