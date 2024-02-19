<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        Category::class => 'App\Http\Sections\Categories',
        SubCategory::class => 'App\Http\Sections\SubCategories',
        Product::class => 'App\Http\Sections\Products',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
