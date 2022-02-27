# MoviesDbApi 

## Laravel SPA /  Vue.js 

An API driven application, built with Laravel resource collections, that enables users to create, read, update and delete Movies. 

Test Driven Development Laravel PHP Unit 

* SPA (Single Page Application) 
* Resource Controllers (RESTFUL Controllers)
* Using Laravel Resource Collections

## Built With
* Laravel 7
* Vue JS 
* Laravel Scout (App Search Capability)
* Tailwind CSS (Front End UI Framework)

## Usage
* RUN: `composer install`
* RUN: `npm i`
* Create a SQLite or Mysql DB 
* RUN: `php artisan migrate`
* RUN: `php artisan scout:import \\App\\Movie`

## Notes 
* Users cannot view Movies they have not created 
[@TODO -> Allow all user types view/show access all movies listings]
* The search model/ search bar -> ONLY searches for models created by the specific user -> 'No Results Found' acts as a catch all for all variables.
[@TODO -> Open up Search for all Movie listings]


## Run The App 
1. `php artisan serve`
2. `npm run development --watch` (compile and watch files)

## Activate Laravel Scout 
1. `php artisan scout:import \\App\\Movie`

## Run App Tests

Set Up Steps [TDD]

`file source: /tests/Feature/MovieTest.php`

Create Alias For Re-Running Your Tests:

In Terminal Run: 

`alias pu='clear && vendor/bin/phpunit'`

`alias pf='clear && vendor/bin/phpunit --filter'`

CMD: pu  runs all tests
CMD: pf <testname> -> runs a specific test
