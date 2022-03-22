# E-Commerce Project

## Installation Guide

1. **`cd` to your projects folder.**

2. **Git Clone the Repository**

```bash
git clone git@gitlab.com:techno-intern1/ecommerce.git
```

OR

```bash
git clone https://gitlab.com/techno-intern1/ecommerce.git
```

(Make sure you don't have ecommerce folder where you are cloning.)

3. **`cd` into `ecommerce` folder. (you just cloned)**

4. **Install Composer Dependencies**

```bash
composer install
```

5. **Copy `.env.example` to `.env`**

```bash
cp .env.example .env
```

6. **Generate `APP_KEY`**

```bash
php artisan key:generate
```

7. **Change `.env` file, put your database information**

8. **Migrate the Database**

```bash
php artisan migrate:fresh --seed
```

That's all you need to do. You can now start working on it.
