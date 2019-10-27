# Cashu Task



## How to build the project:

At first you have to run:

```bash
composer install
```

Then to make the project up and running:

```bash
php artisan serve
```

Also to run tests:

```bash
./vendor/bin/phpunit tests/Feature/Search/SearchHotels.php
```

## Usage

after running the app on laravel default port (8000)
call this route:

```text
http://localhost:8000/api/hotels/search?from=2019-10-26&to=2019-10-28&city=USA&adult_number=4
```

for hotel searching it returns two fixed dummy data
ordered by hotel rate provided by (BestHotels & TopHotels)

Hint: only rate value changes every request, also
you have to send:

```text
from: date
to: date
adult_number: integer
city: string
```

if any of this query parameters send in a wrong format 
validation error appears

# Task in details:

As you mentioned in task that i have to consider scalability
in my solution for making this app scalable for accepting
more providers without effecting current integration and by
applying minimum changes also so i applied (adapter pattern)
to integrate with this two different providers:

```text
(HotelProviders & HotelAdapters) Folder containing all
the adapter pattern logic
```

Also i make Hotel class for merging all providers data and
manipulate all of this data like ordering them.

 ## Response Interface:
 Inside Http folder i created a Responses folder that
 contains: (ResponsesInterface.php) & (ApiResponder.php)
 for using the ApiResponder class as the concrete 
 implementation for the ResponsesInterface
 
 ```text
 Inside AppServiceProvider I am binding ResponsesInterface 
 to it's implementation (ApiResponder) for handling all 
 response inside the app to fit APIS (JSON Response)
 instead of laravel default response. 
 ```
 
 ```php
 // Use the ApiResponder as the concrete implementation for the ResponsesInterface
 $this->app->bind(ResponsesInterface::class, ApiResponder::class);
 ``` 
 
 ## ExceptionInterface
 
 For making exceptions response fit APIs:
 
 ```text
 Inside AppServiceProvider I am binding Laravel's ExceptionHandler 
 Interface to it's new implementation (ApiHandler) for changing 
 laravel default response to (API JSON RESPONSE). 
 ```
 
 ```php
// Use the ApiHandler as the main exception handler
$this->app->singleton(ExceptionHandler::class, ApiHandler::class);
 ``` 
 
 ## Transformers
 
 Inside this section i am making an interface (contract)
 has one method called transform that every concrete class
 must implement to change current array keys for making 
 api response fixed and if any provider change anything
 in his response my api still the same. 
 

