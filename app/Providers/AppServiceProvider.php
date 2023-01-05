<?php

namespace App\Providers;
use Illuminate\Support\Facades\Vite;
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
        // Vite::useScriptTagAttributes([
        //     'defer' => true, // Specify an attribute without a value...
        // ]);
        $sources = ['resources/js/Helpers/sessionHelper.js','resources/js/instagram.js','resources/js/fitbit.js','resources/js/index.js','resources/js/lighterPack.js','resources/js/pct_map.js','resources/js/blog.js','resources/js/admin.js'];
        Vite::useScriptTagAttributes(fn (string $src, string $url, array|null $chunk, array|null $manifest) => [
            'defer' => in_array($src, $sources) ? true : false,
            'type' => in_array($src, $sources) ? '' : 'module',
        ]);
    }
}
