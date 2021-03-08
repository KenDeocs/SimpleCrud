1. Download the repository here or by running "git clone https://github.com/KenDeocs/SimpleCrud.git"
2. Run composer install to install all the dependencies for the backend (Laravel)
3. Run npm install to install all the dependencies for the frontend (Vuejs)
4. Create a .env file with the root folder of the project, then copy the content .env.example and paste it in the newly created file.
5. Next, locate the following variables within the .env file and replace the placeholders with the appropriate credentials:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=YOUR_DB_NAME

DB_USERNAME=YOUR_DB_USERNAME

DB_PASSWORD=YOUR_DB_PASSWORD


6. php artisan key:generate
7. php artisan migrate
8. Open the project in two separate terminal. From one of the terminals, run php artisan serve to start the backend and npm run watch from the other to start the frontend application in watch mode.
