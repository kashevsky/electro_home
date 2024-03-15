<?php

namespace App\Console\Commands;

use App\Models\ApiClient;
use App\Models\Characteristic;
use App\Models\CharacteristicGroup;
use Illuminate\Console\Command;

class ImportCharacteristics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:characteristics';

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
        $apiClient = new ApiClient(env('API_LOGIN'), env('API_PASSWORD'));

        $skip = 0;

        $take = 20;

        while ($apiClient->getParamItems("\$skip={$skip}&\$top={$take}")) {
            $characteristics = $apiClient->getParamItems("\$skip={$skip}&\$top={$take}");

            if (!empty($characteristics)) {
                foreach ($characteristics as $characteristic) {
                    $characteristicGroup = $apiClient->getParamGroup($characteristic['group_id']);
                    $characteristicGroup = CharacteristicGroup::where('title', $characteristicGroup['title_v1'])->first();
                    if (is_object($characteristicGroup)) {
                        Characteristic::firstOrCreate([
                            'title' => $characteristic['title_v1'],
                            'group_id' => $characteristicGroup->id,
                            'type' => $characteristic['item_type'],
                            'name' => $characteristic['field_name'],
                            'is_expanded' => $characteristic['is_expanded'],
                            'is_active' => 1,
                            'in_filter' => $characteristic['in_filter'],
                        ]);
                    }
                }

                $skip += 20;
            }
        }
    }
}
