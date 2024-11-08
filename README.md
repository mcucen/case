# Case

### Installation Steps
```sh
git clone git@github.com:mcucen/case.git
cd case
composer install
vendor/bin/sail up -d
vendor/bin/sail artisan migrate --seed
vendor/bin/sail artisan app:retrieve-tasks
vendor/bin/sail artisan app:assign-task
```

Visit http://localhost to see details.
