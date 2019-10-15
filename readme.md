## **Draft laravel challenge**
**Clone the repository**
To run this project you need to open your terminal at your htdocs  folder on xampp, clone form the repository and go to the just created folder:

    git clone https://github.com/War777/draft-backend.git
    cd draft-backend

**Install composer dependencies:**

    composer install

**Install npm dependencies:**

    npm install

**Create a copy of the .env file:**

    cp .env.example .env
**Generate your app encryption key:**

    php artisan key:generate

**Create an empty database for our application** 
In this case I just created an empty DB called 'draft' on mariaDB so In the .env file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.
	
**Migrate the database**

    php artisan migrate
Now you can access through your xampp server on http://localhost:8080/draft/public