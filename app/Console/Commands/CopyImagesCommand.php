<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copy:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy seeder images from public to storage';

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
        File::deleteDirectory(public_path('storage/images/products'));
        File::deleteDirectory(public_path('storage/images/actions'));

        $products = File::copyDirectory(public_path('images/products'), public_path('storage/images/products'));
        $actions = File::copyDirectory(public_path('images/actions'), public_path('storage/images/actions'));

        if($products) {
            $this->info('Product images copy success to storage folder');
        }
        if($actions) {
            $this->info('Actions images copy success to storage folder');
        }
    }
}
