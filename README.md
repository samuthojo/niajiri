niajiri
=======

niajiri is a Human Resource web platform, used to primarily reduce the hustle of screening process mostly Human Resource companies go through when they hire employees for other companies.

There will be three users namely Candidate (Job seeker), HR company (They are the Admins here) and A company in need of a employee.


## Setup
- Create a database

 ```sh
 $ username: niajiri
 $ database: niajiri
 $ password: niajiri
 ```

- Copy configuration
```sh
$ cp .env.example .env
```
- Refresh migration every time you pull changes
```sh
$ composer update
$ php artisan optimize
$ php artisan migrate:refresh --seed
```

- If migrations fails to refresh, run
```sh
$ php artisan migrate:fresh --seed
```

- Ensure file storage is enables
```sh
$ php artisan storage:link
```

- Compile assets
```sh
$ npm install
$ npm run watch
```

## Seed Specific File
```sh
$ composer dump-autoload
$ php artisan db:seed --class=UsersTableSeeder
```

## Heroku MySQL Console
```sh
$ mysql -u b0ec9ea8c94a4f -h us-cdbr-iron-east-05.cleardb.net -p heroku_9f5d769e926b625
```
pwd: bc049b54

##  Digital Ocean
```sh
username:info@ipfsoftwares.com
password: digital1234567
104.236.31.200
niajiri@123
http://cocacola.niajiri.co.tz/open/git2018/positions permanent;
```

## Laravel Worker Supervisor
```sh
$ sudo supervisorctl reread
$ sudo supervisorctl update
$ sudo supervisorctl start niajiri-worker:*
```
- [See](http://supervisord.org/installing.html#creating-a-configuration-file)
- [Simple Tutorial](https://pkrai.wordpress.com/2016/06/19/laravel-queues-with-supervisor/)


## Reviews
- [https://app.enhancv.com/resume/new](https://app.enhancv.com/resume/new)
- [https://www.shortlist.net/job-seeker/](https://www.shortlist.net/job-seeker/)
- [https://www.practiceaptitudetests.com/numerical-reasoning-tests/](https://www.practiceaptitudetests.com/numerical-reasoning-tests/)
