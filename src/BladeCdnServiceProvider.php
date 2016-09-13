<?php

namespace Bryanjhv\BladeCdn;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeCdnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/blade-cdn.php' => config_path('blade-cdn.php'),
        ], 'config');


        $config  = $this->app['config']['blade-cdn'];
        $prefix  = str_finish($config['prefix'], '/');
        $aliases = $config['aliases'];

        Blade::directive('cdn', function ($expression) use ($prefix, $aliases) {
            $asset      = substr($expression, 2, -2);
            $production = $this->app->environment('production');

            $url = $asset;

            if (array_key_exists($asset, $aliases)) {
                $urls  = $aliases[$asset];
                $index = intval($production);

                $url = $urls[$index];

                if (empty($url) || is_null($url)) {
                    $url = $urls[1 - $index];
                }
            }

            if ($production && strpos($url, '//') === false) {
                $url = $prefix.$url;
            } else {
                $url = '<?php echo asset(\''.$url.'\'); ?>';
            }

            return $url;
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-cdn.php', 'blade-cdn');
    }
}
