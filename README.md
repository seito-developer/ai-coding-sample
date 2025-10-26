# Laravel Livewire Starter Kit

このリポジトリは Laravel 12 と Livewire (Volt/Flux) をベースにした SPA ライクなスタarter キットです。認証やリアクティブな UI コンポーネント、Vite を利用したフロントエンド開発環境が初期状態で揃っており、ダッシュボード系アプリケーションや業務システムの立ち上げを素早く行えます。

## 動作環境

- PHP 8.2 以上
- Composer 2.x
- Node.js 18 以上 (推奨: 最新 LTS)
- npm (Node.js に同梱)
- SQLite (同梱の `database/database.sqlite` を利用可能) もしくは任意の RDBMS

Docker を利用する場合は Laravel Sail (`composer require laravel/sail --dev && php artisan sail:install`) の利用も可能です。

## ローカルセットアップ

```bash
# 1. リポジトリを取得
git clone <your-repo-url>
cd myapp

# 2. PHP 依存関係をインストール
composer install

# 3. 環境ファイルを作成し、必要に応じて編集
cp .env.example .env
php artisan key:generate

# SQLite を使う場合 (任意)
touch database/database.sqlite

# 4. データベースマイグレーション
php artisan migrate

# 5. フロントエンド依存関係をセットアップ
npm install
```

Laravel 開発サーバーとビルドツールを同時に起動するには以下のコマンドが利用できます。

```bash
# Laravel サーバー + キュー + ログ + Vite の並行実行
composer run dev
```

シンプルに開発サーバーのみを立ち上げたい場合は `php artisan serve`、フロントエンドの HMR を使う場合は `npm run dev` を個別に実行してください。
