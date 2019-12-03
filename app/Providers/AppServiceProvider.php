<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 因为Laravel 5.4及以上对默认数据库字符集进行了更改  所以运行MariaDB或旧版MySQL 需要加上下句:
        Schema::defaultStringLength(191);
    }
}
