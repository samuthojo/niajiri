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
$ cp .env.local .env
```
- Refresh migration every time you pull changes
```sh
$ composer update
$ php artisan optimize
$ php artisan migrate:refresh --seed
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
$ php artisan db:seed --class=UsersTableSeeder
```
