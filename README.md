# Pouet

## Maintainers

- [Aviortheking: Florian BOUILLON](https://github.com/Aviortheking)
- [Nicolas-Brossard: Nicolas BROSSARD](https://github.com/Nicolas-Brossard)
- [jenoh: Théo MEMIN](https://github.com/jenoh)
- [s0dyy: Maxime SORIN](https://github.com/s0dyy)

# Requirements :

- GIT LFS (Optionnal)
- a terminal

## Install

### Dev

```bash
cp ./.env.example ./.env #then edit the file to match your config
docker-compose build
docker-compose run php composer install
docker-compose run php php artisan key:generate
docker-compose up
```

after that run [migrations](#migrations)  
Finnally run the seeders [seeders](#seeders)


### Prod

```bash
cp ./env.example ./env #then edit the file to match your config
docker-compose build
docker-compose run -f docker-compose.yml -f docker-compose.prod.yml php php artisan key:generate
docker-compose up -f docker-compose.yml -f docker-compose.prod.yml
```

after that run [migrations](#migrations)  

## Migrations

to run migration do

on linux/mac
```bash
./artprox migrate
```

on windows
```bash
docker-compose exec php php artisan migrate
```

## Seeders

to run seeders do 

on linux/mac
```
./artprox db:seed --class=CreateUsersSeeder
```
on windows
```
docker-compose exec php php artisan db:seed --class=CreateUsersSeeder
```
