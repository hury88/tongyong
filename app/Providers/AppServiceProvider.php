<?php

namespace app\Providers;

// use App\Category;
// use App\Company;
use App\Config;
use App\News;
use Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $config = Config::find(1)->toArray();
        path2ptt($request->path());
        list($boot_bread, $boot_title) = bread();
        array_push($boot_title, $config['sitename']);
        view()->share('boot_config', $config);
        view()->share('boot_bread', $boot_bread);
        view()->share('boot_title', $boot_title);

        //自定义验证码规则
        /*Validator::extend('phone', function($attribute, $value, $parameters){
            return preg_match('/^1[34578][0-9]{9}$/', $value);
        });*/
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'App\Services\Registrar'
        );
    }
}
