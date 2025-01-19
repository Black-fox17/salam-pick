# CSC293 Project - Online Store Website

## Project Overview
This project is an online store website built using the following technologies:
- PHP (Laravel)
- PostgreSQL
- JavaScript
- HTML
- CSS

## Author
Ayeleru Abdulsalam Oluwaseun
Matric No: 236326

## Setup Instructions

### Prerequisites
Before you begin, ensure you have the following installed on your machine:
- PHP (version 7.3 or higher)
- Composer
- PostgreSQL
- Javascript, Html, Css
### Installation Steps


1. **Install PHP dependencies:**
    Since the `vendor` folder is deleted, you need to install the dependencies using Composer.
    ```bash
    composer install
    ```


2. **Set up the environment file:**
    Copy the `.env.example` file to `.env` and update the necessary environment variables, especially the database configuration.
    ```bash
    cp .env.example .env
    ```

3. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

4. **Run database migrations:**
    ```bash
    php artisan migrate
    ```

5. **Conigure database**

Set up the database ```

6. **Start the development server:**
    ```bash
    php artisan serve
    ```

7. **Access the application:**
     Open your web browser and navigate to `http://localhost:8000`.

## Additional Notes
- Ensure your PostgreSQL server is running and the database specified in the `.env` file is created.
Enjoy your online store website!