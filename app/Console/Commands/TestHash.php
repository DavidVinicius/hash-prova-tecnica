<?php

namespace App\Console\Commands;

use App\Http\Controllers\TestController;
use App\Services\Hash;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class TestHash extends Command
{
    const TOTAL_HITS = 10;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avato:test {string} {--requests=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $string = $this->argument('string');
        $requests = $this->option('requests');
        $hashService = new Hash;                

        for ($i = 1; $i <= $requests; $i++) {
            
            $response = Http::get('http://laravel-app/hash', ['string' => $string]);            
            
            if ($response->getStatusCode() === 429) {
                $this->info("sleeping in " . $i);
                sleep(60);
            }            
        }

        return Command::SUCCESS;
    }
}
