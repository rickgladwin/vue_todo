## Todo mini app Demo

### Rick Gladwin, December 2019

## Stack

This app was produced on: 
- Ubuntu 18.04
- Nginx 1.15.8
- PostgreSQL 11.6
- Laravel 6.2
- Vue.js 2.5.17
 
## Installation

### Foundation

Install the stack components or a comparable set of components. A virtual machine is recommended. A Laravel 6 Homestead box was used during development.

### App and components

- set up a .env file in the app root based on .env.example
- run `php artisan migrate` to build the tables
- run `php artisan db:seed` to run the seeders. This is a necessary step as one of the tables is used to persist app settings.
- access the app on the root URL on your server (e.g. http://localhost:8000 )

## Notes

The app has been compiled in production mode using Laravel Mix (webpack etc.)
Some things that would be upgraded if the app actually were running in a production environment:
- Users would have a login, used to access their own task data
- The api routes (run `php artisan route:list` to see routes) would be protected by auth middleware (Laravel provides a straightforward means of doing this when authentication is turned on)
- The UI would be cleaned up

Thanks for reviewing this code. If you have any questions or if you have any issues installing or running the code, please don't hesitate to get in touch by tet, phone, or email:

c: 647-232-7425

e: rick@iddesign.ca
