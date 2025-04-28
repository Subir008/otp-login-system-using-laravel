## Steps for Create Otp Login System

* First we have created 3 seperated pages - Signup, Login, Otp login, Otp verification pages.

* Next we added the routing path in the routes.

* Next, we add a mobile number column in the user table **if we want to send the otp to user number.** by running the migration command - **php artisan make:migration "add_mobile_no_in_users_table"**, if we specify the table name in the command it will create the function  within the up and down function.Then specify the column name and its required info.

* 

* Next, we create one model and migration file for storing otp codes for verifications. When creating model, after giving model name if we pass -m flag with it it will generate the migration file with it. **php artisan make:model "Model name" -m**. In model file add the fillable data & in migration file add the columns and migrate it.


* Next, after signup when we want to login with otp , after clicking on login with otp it will call one function generate(), these will first check the user email is register or not.

 After that, it will call one function generateOtp() and pass the valid email given by the user.

