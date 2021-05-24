<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Bin;

class BinGC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gc:bins';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Expired Logs';

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
        $bins = Bin::where('delete_after', '<', now())->get();

        foreach($bins as $bin) {
            $bin->logs()->delete();
            $bin->delete();
        }
    }
}
