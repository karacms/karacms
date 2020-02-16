<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Facades\DB;
use App\Services\DbService;

class InstallAndUpdate
{
    protected $migrator;

    protected DbService $dbService;

    public function __construct(DbService $dbService)
    {
       $this->dbService = $dbService;

        $this->migrator = app('migrator');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Test database connection
        $hasConnected = $this->dbService->isConnected();

        // If no migrations table found, run the fresh install
        if ((! $hasConnected ||  ! Schema::hasTable('migrations')) && ! $request->is('installation')) {
            return redirect('/installation');
        }

        return $next($request);
    }
}
