# ai-coding-sample

This project is a Laravel 12 sample application. The instructions below explain how to bring up the application locally and display `Hello World` in the browser.

## Prerequisites

Prepare one of the following environments:

- **Docker**: Docker Desktop 4.24+ (or compatible) with Compose V2. This lets you run the app via Laravel Sail.
- **Native PHP**: PHP 8.2+, Composer 2.6+, Node.js 20+, and npm 10+ installed on your host machine.

Clone this repository and move into the application directory:

```bash
git clone <REPOSITORY_URL>
cd ai-coding-sample/myapp
```

Copy the example environment file, then install dependencies and generate the application key.

```bash
cp .env.example .env
composer install
php artisan key:generate
npm install
npm run build
```

> If you prefer Docker, replace the `composer`, `php`, and `npm` commands above with `./vendor/bin/sail composer`, `./vendor/bin/sail artisan`, and `./vendor/bin/sail npm` respectively after starting Sail (described below).

## Run the application

### Option A: Laravel Sail (Docker)

```bash
./vendor/bin/sail up -d
```

This starts the web server on `http://localhost` and the Vite dev server on port `5173`. Stop the containers with `./vendor/bin/sail down` when you are done.

### Option B: Native PHP development server

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

The site becomes available at `http://127.0.0.1:8000`.

## Display “Hello World”

1. Open `routes/web.php` in your editor.
2. Add the following route definition near the top of the file (after the existing `use` statements is fine):

   ```php
   Route::get('/hello', fn () => 'Hello World');
   ```

3. With the development server running (via Sail or `php artisan serve`), visit `http://localhost/hello` (or `http://127.0.0.1:8000/hello` if you used the native server).
4. The browser should render a plain `Hello World` response.

## Shutting down

- Docker/Sail: `./vendor/bin/sail down`
- Native server: terminate the `php artisan serve` process (Ctrl+C)

## Appendix

- Run frontend assets in watch mode while developing: `npm run dev` (or `./vendor/bin/sail npm run dev`)
- Clear cached configuration if needed: `php artisan config:clear`
- Run the automated test suite: `php artisan test`

