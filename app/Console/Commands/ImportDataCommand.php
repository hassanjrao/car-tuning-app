<?php

namespace App\Console\Commands;

use App\Imports\ImportBrandsJob;
use App\Imports\ImportChipTuningJob;
use App\Imports\ImportEngineJob;
use App\Imports\ImportModelJob;
use App\Imports\ImportTypeJob;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        Excel::Import(new ImportChipTuningJob, "csv/data.xlsx");

    }
}
