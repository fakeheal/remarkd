# remarkd

Self-hosted app for orginising links, articles, quotes, texts, images, videos.

## Features

- **Repositories**: have multiple repositories in a single place
- **Visibility**: make parts of your repository visible or invisible to the www
- **Tagging**: add unlimited number of tags to each resource
- **Mirroring**: creates mirrors of the given resources (applicable for `link`, `video` and `image`)
- **Self-destroy**: schedule links for self destruction after specified time if not set otherwise
- **Notes**: add follow-up notes on each resource

## Examples

### Screenshots

### Online demo

## Setup

### The Stack

- php8
- mysql
- redis

## Mobile Apps

### Download

### Linking your repository

## Documentation

### API

#### Installing

1. Clone the repository:

```
git clone https://github.com/fakeheal/remarkd.git
```

2. Install dependencies:

```
composer install
```

3. Set environment variables:

```
cp .env.example .env
```

4. Start using [Laravel Sail](https://laravel.com/docs/8.x/sail):

> On Windows, you need [Docker + WSL2](https://docs.docker.com/docker-for-windows/wsl/). Run the command above directly from the `wsl` console.

```
./vendor/bin/sail up
```

5. Install dependencies for the front-end:

```
./vendor/bin/sail npm install
```

6. Compile assets

```
./vendor/bin/sail npm run dev 
```

> More at Laravel's official documentation: https://laravel.com/docs/8.x/mix#running-mix

7. Compile during development (with watcher):

```
./vendor/bin/sail npm run watch
```
#### Creating first user

```
./vendor/bin/sail php artisan remarkd:create-user
```

#### Testing

```
./vendor/bin/sail test
```

