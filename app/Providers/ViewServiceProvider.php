<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['users.create', 'users.edit'], function ($view) {
            return $view->with(
                'roles',
                Role::select('id', 'name')->get()
            );
        });


        View::composer(['user-topups.create', 'user-topups.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'first_name')->get()
            );
        });

        View::composer(['saving-accounts.create', 'saving-accounts.edit'], function ($view) {
            return $view->with(
                'savingAccountTypes',
                \App\Models\SavingAccountType::select('id', 'code')->get()
            );
        });

        View::composer(['cashflows.create', 'cashflows.edit'], function ($view) {
            return $view->with(
                'savingAccounts',
                \App\Models\SavingAccount::select('id', 'code', 'name')->get()
            );
        });

        View::composer(['user-savings.create', 'user-savings.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'first_name')->get()
            );
        });

        View::composer(['user-savings.create', 'user-savings.edit'], function ($view) {
            return $view->with(
                'kopProducts',
                \App\Models\KopProduct::select('id')->get()
            );
        });

        View::composer(['user-savings.create', 'user-savings.edit'], function ($view) {
            return $view->with(
                'periods',
                \App\Models\Period::select('id', 'name')->get()
            );
        });

        View::composer(['kop-products.create', 'kop-products.edit'], function ($view) {
            return $view->with(
                'kopProductTypes',
                \App\Models\KopProductType::select('id', 'name')->get()
            );
        });

        View::composer(['user-saving-transactions.create', 'user-saving-transactions.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'first_name')->get()
            );
        });

        View::composer(['user-saving-transactions.create', 'user-saving-transactions.edit'], function ($view) {
            return $view->with(
                'kopProducts',
                \App\Models\KopProduct::select('id', 'name')->get()
            );
        });
    }
}
