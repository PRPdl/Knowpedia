<?php

namespace App\Providers;


use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Example;
use App\Orders\OrderDetails;
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
        $this->app->bind('example', function (){
            return new Example(config('app.name'));
        });

        $this->app->singleton(PaymentGatewayContract::class, function (){
            if(request()->has('credit')) {
                return new CreditPaymentGateway(config('payment.currency'));
            } elseif(request()->has('bank')) {
                return new BankPaymentGateway(config('payment.currency'));
            }
        });

        $this->app->bind(OrderDetails::class, function(){
            config(['payment.discount' => 1000]);
            $paymentGateway = resolve(PaymentGatewayContract::class);
            return new OrderDetails($paymentGateway, config('payment.discount'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
