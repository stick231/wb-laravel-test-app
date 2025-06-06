# WB Laravel Test App

## Description

This is a simple Laravel application. It helps to import data about incomes, orders, sales, and stocks.

## Requirements

- PHP >= 8.0  
- Composer  
- MySQL (or another supported database)  
- Git  

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/stick231/wb-laravel-test-app.git
   ```

2. **Go to the project folder**

   ```bash
   cd wb-laravel-test-app
   ```

3. **Install PHP packages with Composer**

   ```bash
   composer install
   ```

4. **Copy the example environment file**

   ```bash
   cp .env.example .env
   ```

5. **Set up the `.env` file**

   Open the `.env` file in a text editor and update the following lines with your database settings:

   ```
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

6. **Generate application key**

   ```bash
   php artisan key:generate
   ```

7. **Run database migrations**

   ```bash
   php artisan migrate
   ```


## Importing Data

To import data, run the following commands in the terminal (one at a time):

```bash
php artisan app:import-incomes
php artisan app:import-orders
php artisan app:import-sales
php artisan app:import-stocks
```

Each command will import the corresponding data into your database.

## License

This project is for test purposes only.


## Sources

This project is based on the following materials provided by the employer:

- GitHub repository with API reference:  
  [https://github.com/cy322666/wb-api](https://github.com/cy322666/wb-api/blob/master/README.md)
- Postman collection with API examples:  
  [https://www.postman.com/cy322666/workspace/app-api-test/overview]

## Final Note

Thank you for checking out this test project!  
