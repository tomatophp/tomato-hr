<?php

namespace Tomatophp\TomatoHr;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;


class TomatoHrServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoHr\Console\TomatoHrInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-hr.php', 'tomato-hr');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-hr.php' => config_path('tomato-hr.php'),
        ], 'tomato-hr-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-hr-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-hr');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-hr'),
        ], 'tomato-hr-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-hr');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/tomato-hr'),
        ], 'tomato-hr-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        TomatoMenu::register([
            Menu::make()
                ->group(__('HR'))
                ->label(__('Departments'))
                ->icon('bx bxs-building')
                ->route('admin.departments.index'),
            Menu::make()
                ->group(__('HR'))
                ->label(__('Employees'))
                ->icon('bx bxs-user-pin')
                ->route('admin.employees.index'),
            Menu::make()
                ->group(__('HR'))
                ->label(__('Attendance'))
                ->icon('bx bx-time')
                ->route('admin.employee-attendances.index'),
            Menu::make()
                ->group(__('HR'))
                ->label(__('Requests'))
                ->icon('bx bx-task')
                ->route('admin.employee-requests.index'),
            Menu::make()
                ->group(__('HR'))
                ->label(__('Payments'))
                ->icon('bx bx-credit-card')
                ->route('admin.employee-payments.index'),
            Menu::make()
                ->group(__('HR'))
                ->label(__('Payroll'))
                ->icon('bx bx-money')
                ->route('admin.employee-payrolls.index'),
            Menu::make()
                ->group(__('HR'))
                ->label(__('Applicants'))
                ->icon('bx bxs-user-check')
                ->route('admin.employee-applies.index')
        ]);
    }
}
