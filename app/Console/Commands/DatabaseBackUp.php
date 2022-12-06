<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class DatabaseBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make database backup';

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
     * @return int
     */
    public function handle()
    {


        $filename = "backup_" . Carbon::now()->format('Y_m_d_H_i_s') . ".sql";

        $db_username = "root";

        $db_password = "";

        $db_name = "newsportal";
  
        $command = "mysqldump --opt --user=$db_username --password=$db_password $db_name > " . storage_path("/app/public/db_backups/$filename");
  
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);
    }
}
