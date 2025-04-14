## Steps for Create Otp Login System

* First we have created 3 seperated pages - Signup, Login, Otp login pages.

* Next we added the routing path in the routes.

* Next, we add a mobile number column in the user table **if we want to send the otp to user number.** by running the migration command - **php artisan make:migration "add_mobile_no_in_users_table"**, if we specify the table name in the command it will create the function  within the up and down function.Then specify the column name and its required info.




