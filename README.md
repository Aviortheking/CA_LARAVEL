# Pouet

## Maintainers

[Aviortheking: Florian BOUILLON](https://github.com/Aviortheking)
[Nicolas: Nicolas BROSSARD](https://github.com/Nicolas-Brossard)
[jenoh: Théo MEMIN](https://github.com/jenoh)
[s0dyy: Maxime SORIN](https://github.com/s0dyy)

# Requirements : 
    - GIT LFS

## Install

### Dev

```
docker-compose build
cp ./.env.example ./.env
docker-compose run php composer install
docker-compose run php php artisan key:generate
docker-compose up
```


### Prod

```
cp ./env.example ./env
docker-compose build
docker-compose run -f docker-compose.yml -f docker-compose.prod.yml php php artisan key:generate
docker-compose up -f docker-compose.yml -f docker-compose.prod.yml
```
