## Laravel Queues
### Drivers 

__Database__  
To use Relational database as your queue drive you will need to create the database table.  
Create you database, enter the username and password into you `.env` run the migration commands:  
```
> php artisan queue:table  
> php artisan migrate
```
__Redis__  
To use Redis as you queue driver, you must configure a Redis databse connection in your `config/database.php`.  
You also need to install the dependency `predis/predis` `~1.0` or `phpredis` PHP extension.   

### Job CLass
To Generate a job class  
```
> php artisan make:job ProcessPodcast
```  
The job will be generated in the `app/Jobs` directory.  
