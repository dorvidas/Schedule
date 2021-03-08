## Running locally

To run project locally, you can use Laravel Homestead https://laravel.com/docs/8.x/homestead#per-project-installation.
Do the following:
* Install VirtualBox and Vagrant
* `git clone git@github.com:AudriusL1/Schedule.git`
* `composer install`
* Copy `.env` and adjust settings
* `php artisan key:generate`
* `php vendor/bin/homestead make`
* Adjust `Homestead.yaml`  
* `vagrant up`
* `php artisan migrate`
* `npm install` - installs NPM dependencies
* `npm run dev` - runs the build
