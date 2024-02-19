<?php

namespace App\Http\Controllers\Twill;

use App\Models\Product;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\Services\Forms\Fields\Repeater;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;

class SubCategoryController extends BaseModuleController
{
    protected $moduleName = 'subCategories';
    protected $showOnlyParentItemsInBrowsers = true;
    protected $nestedItemsDepth = 1;

    protected $viewPrefix = 'sub_products';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableReorder();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);
        $form->add(
            // Regular repeater for creating items without a managed model.
            InlineRepeater::make()
                ->name('products')
                ->fields([
                    Input::make()
                        ->name('image'),
                    Input::make()
                        ->name('price')
                ]),
        );
        $form->add(
            Input::make()->name('title')->label('Заголовок')
        );

        $form->add(
            BladePartial::make()->view('twill.fields.image')
        );
        $form->add(
            Medias::make()
            ->name('image')
            ->label('Изображение')
            ->max(5)
        );
        $form->add(
            Browser::make()->modules([Product::class])->name('Товар')
        );

        // $form->add(
        //     InlineRepeater::make()
        //         ->label('Товар')
        //         ->name('products')
        //         ->triggerText('Add partner') // Can be omitted as it generates this.
        //         ->selectTriggerText('Select partner') // Can be omitted as it generates this.
        //         ->allowBrowser()
        //         ->relation(Product::class)

        //         ->fields([
        //             Input::make()
        //                 ->name('title')
        //         ]),
        // );



        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }
}
