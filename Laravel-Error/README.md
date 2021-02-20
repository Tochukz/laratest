# Error Monitorting using Sentry 
### Laravel Backend
Install the sentry laravel SDK  
```
> composer require sentry/sentry-laravel
```  
For Laravel 7.x.x update the `report` method of `App\Exception\Hander` class:
```
public function report(Throwable $exception)
{
    if (app()->bound('sentry') && $this->shouldReport($exception)) {
        app('sentry')->captureException($exception);
    }

    parent::report($exception);
}
``` 
For Laravel 8.x.x, update the `register` method of `App\Exception\Hander` class: 
```
public function register()
{
    $this->reportable(function (Throwable $e) {
        if ($this->shouldReport($e) && app()->bound('sentry')) {
            app('sentry')->captureException($e);
        }        
    });
}
```
Setup the Sentry DSN
```
> php artisan sentry:publish --dsn=https://your-sentry-dsn
```
This will add `SENTRY_LARAVEL_DSN` and `SENTRY_TRACES_SAMPLE_RATE` to your `.env` file and also generate a `config/sentry.php` file. 


### Vue.js Front End  
Install the `laravel/ui` composer package  
```
> composer require laravel/ui
```

Use the `ui` artisan command to scaffold a vVue frontend
```
> php artisan ui vue
```
For React application use `react` instead of `vue`