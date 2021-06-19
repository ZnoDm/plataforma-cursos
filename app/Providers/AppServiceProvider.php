<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Models\Section;
use App\Observers\LessonObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use App\Observers\SectionObserver;

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
        Section::observe(SectionObserver::class);
        Lesson::observe(LessonObserver::class);
        
        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });
    }
}
