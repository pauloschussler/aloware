## Aloware

This is a PHP application built with the Laravel framework and Vue with Tailwind CSS. Its purpose is to replicate a blog with comments and replies.
The database used is MySQL.

### Environment Setup

To set up the environment, follow the steps below:

#### - Have docker installed
#### - Clone the repository
Clone this GitHub repository to your local machine.
#### - Build the environment using Laravel
To do this, navigate to the folder where the project was cloned in your terminal and run the following command:

  ./vendor/bin/sail up --build
  
#### - Configure Laravel
##### .env File
It's important to have the .env file created. To do this, you can create a file in the project folder named .env and its contents should be exactly the same as the .env.example file, as shown in the image below.

**Important**

In my environment, I have a connection problem to the MySQL database when trying to run the migrations and seeds. Therefore, in the **.env** file, by changing the **DB_CONNECTION=mysql** property to **DB_CONNECTION=127.0.0.1**, but remember that you need to change it back to **DB_CONNECTION=mysql** for the system to work.

In the terminal, inside the project folder, run the following commands:

    php artisan key:generate
    php artisan migrate
    php artisan db:seed 
    npm run dev
    
After that, you should be able to access the system through the address: http://localhost/
