<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;

class UpdateService
{
    /**
     * Run migrate command if needed
     */
    public function runDBUpdateIfExists()
    {
        $notRan = $this->checkForDBUpdate();

        if (count($notRan) > 0) {
            Artisan::call('migrate');
        }
    }

    /**
     * Check if db has to update. Returns not run migrations.
     *
     * @return array
     */
    public function checkForDBUpdate()
    {
        $migrator = app('migrator');

        $ran = $migrator->getRepository()->getRan();
        // $batches = $migrator->getRepository()->getMigrationBatches();
        return array_diff(array_keys($this->getAllMigrationFiles()), $ran);
    }

    /**
     * Retrieve all migration files in database directory
     *
     * @return array
     */
    public function getAllMigrationFiles()
    {
        $migrationPath = database_path() . DIRECTORY_SEPARATOR . 'migrations';

        return app('migrator')->getMigrationFiles($migrationPath);
    }
}
