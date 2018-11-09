
After clonning the project do the following:

Ensure that you have composer installed in your machine.

Inside the project directory open cmd and type composer run update.

Run npm install, in order for the dependencies to be installed.

For migration of tables and seeding users and currencies run the php artisan migrate --seed.

User tables and currencies tables will have records.

Two users will be created.

Admin
username: john.doe@gmail.com
password: secret

User
username: jane.doe@gmail.com
password: secret

To start the server on your local machine type php artisan serve

For email testing, choose either mailtrap or mailchimp and configure it on .env file.

Login and enjoy :)
