<?php

namespace App\Console\Commands;

use App\Models\CountryRegion;
use App\Models\UF;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PopulateUF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:uf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate UF table with API of IBGE';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function getData() : \Illuminate\Http\Client\Response
    {
        return Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->warn('Requesting data');

        $response = $this->getData();

        if($response->successful()) {

            $data = $response->json();

            $this->info(count($data) . ' states founds');

            foreach ($data as $uf) {

                DB::beginTransaction();

                try{
                    $region = CountryRegion::firstOrCreate([
                        'id' => $uf['regiao']['id'],
                        'name' => $uf['regiao']['nome'],
                        'initials' => $uf['regiao']['sigla'],
                    ]);

                    UF::updateOrCreate([
                        'name' => $uf['nome'],
                        'initials' => $uf['sigla'],
                        'country_region_id' => $region->id
                    ]);

                    DB::commit();
                    $this->info($uf['nome'] . ' inserted successfully');

                }catch( \Throwable $e){
                    DB::rollBack();
                    throw $e;
                }
            }
        }else{
            $this->error('bad response, status code: ' . $response->status());
        }
    }
}
