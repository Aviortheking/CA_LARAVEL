# Pouet

## Install

### Dev

```
docker-compose build
docker-compose run artisan key:generate
docker-compose run composer install
docker-compose up
```


### Prod

```
docker-compose up -f docker-compose.yml -f docker-compose.prod.yml --build
```
