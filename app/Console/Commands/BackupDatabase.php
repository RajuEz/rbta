<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    protected $backupPath = '/opt/backups/database/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $connection = config('database.default');
        $host = config('database.connections.' . $connection . '.host');
        $userName = config('database.connections.' . $connection . '.username');
        $password = config('database.connections.' . $connection . '.password');
        $database = config('database.connections.' . $connection . '.database');

        $file = app_path('src/backup.sh');

        shell_exec($file . " $userName $password $host $database 2>&1");
//        $this->withoutBashFile($host, $userName, $password, $database);
    }

    private function withoutBashFile($host, $userName, $password, $database)
    {
        $path = $this->backupPath . $database . '-' . Carbon::now()->format('Y-m-d') . '.sql';

        $command = "mysqldump -h $host -u $userName -p$password $database > $path";
        exec($command);
    }
}
