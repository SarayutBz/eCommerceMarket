<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Project Name 

 This project is a small-scale online store simulation built using the Laravel framework. It includes basic functionalities of an online shop, such as user registration, login, product browsing, and user profile management.

### Features

- **User Registration**: New users can register an account.
- **User Login**: Registered users can log in to access their account.
- **Product Listing**: Users can browse products available in the store.
- **User Profile**: Users can view and edit their profile information.


## Installation

To install and set up the project, follow these steps:

1. **Install dependencies**:
    ```bash
    composer install
    ```
2. **Create file .env**
    ```
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:YourBase64EncodedAppKey
    APP_DEBUG=true
    APP_URL=http://localhost
    
    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    
    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    
    MEMCACHED_HOST=127.0.0.1
    
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=hello@example.com
    MAIL_FROM_NAME="${APP_NAME}"
    
    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1
    
    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    ```

3. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

4. **Configure your database**:
    Open the `.env` file and update your database configuration:
    ```dotenv
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```


    

5. **Run database migrations**:
    ```bash
    php artisan migrate
    ```
    ![image](https://github.com/user-attachments/assets/593dee8b-82bf-48f5-bb28-88713f898118)


> [!NOTE]  
> Would you like to create it ? =>  Yes 

6. **Seed the database**:
    ```bash
    php artisan db:seed
    ```

7. **Start the development server**:
    ```bash
    php artisan serve
    ```

Now you should be able to access the application in your web browser at `http://localhost:8000`.

### Project Creators

- **:avocado: [Sarayut Aiamaurai](https://github.com/SarayutBz)** - Project Lead and Developer
- **:frog: [Wongsaphat Nagmaung ](https://github.com/Bee34949)** - Backend Developer
- **:takeout_box: [Wattanapongphan Promnoi ](https://github.com/Wattanapongphan)** - Backend Developer
- **:beers: [Atithap Paksangkane ](https://github.com/Eshull2p1)** - UI/UX Designer and Frontend


