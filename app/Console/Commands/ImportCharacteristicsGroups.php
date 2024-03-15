<?php

namespace App\Console\Commands;

use App\Models\ApiClient;
use App\Models\CharacteristicGroup;
use Illuminate\Console\Command;

class ImportCharacteristicsGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:characteristics-groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import characteristics groups from CRM';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiClient = new ApiClient(env('API_LOGIN'), env('API_PASSWORD'));

        $characteristicsGroups = $apiClient->getParamGroups();
       
        foreach ($characteristicsGroups as $characteristicsGroup) {
            CharacteristicGroup::firstOrCreate([
                'title' => $characteristicsGroup['title_v1'],
                'is_active' => $characteristicsGroup['is_active'],
                'code' => $characteristicsGroup['group_code']
            ]);
        }
    }
}
