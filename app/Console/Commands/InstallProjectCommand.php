<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Coping dummy images to storage folder. fresh migrate and seed. Create link to storage.';

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
        // Create storage link
        $this->call('storage:link');

        // Deleting old folders
        File::deleteDirectory(public_path('storage/images/products'));
        File::deleteDirectory(public_path('storage/images/actions'));

        // Coping images to storage
        $products = File::copyDirectory(public_path('images/products'), public_path('storage/images/products'));
        $actions = File::copyDirectory(public_path('images/actions'), public_path('storage/images/actions'));

        // Migrate Database
        $migrate = $this->call('migrate:fresh', [
            '--seed' => true
        ]);

        // Info messages
        if($products) {
            $this->info('Product images copy success to storage folder');
        }
        if($actions) {
            $this->info('Actions images copy success to storage folder');
        }
    }
}
