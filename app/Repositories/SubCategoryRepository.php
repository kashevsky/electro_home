<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\SubCategory;

class SubCategoryRepository extends ModuleRepository
{
    use HandleMedias, HandleNesting;

    public function __construct(SubCategory $model)
    {
        $this->model = $model;
    }

    protected $relatedBrowsers = ['products'];

    public function afterSave($model, $fields): void
    {
        if(isset($fields['medias']['image'][0]['thumbnail'])){
            $model->image = $fields['medias']['image'][0]['thumbnail'];
            $model->save();
        }

        $this->updateRepeater(
            $model,
            $fields,
            'products',
        );

        parent::afterSave($model, $fields);
    }

    public function getFormFields($object): array
    {
        $fields = parent::getFormFields($object);

        $fields = $this->getFormFieldsForRepeater(
            $object,
            $fields,
            'products',
            'Product',
            'products'
        );

        return $fields;
        // return $this->getFormFieldForRepeaterWithPivot(
        //     $object,
        //     $fields,
        //     'partners',
        //     ['role'],
        //     'Partner',
        //     'project_partner'
        // );
    }
}
