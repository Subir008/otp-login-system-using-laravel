## Steps for Create Otp Login System

* First we have created 3 seperated pages - Signup, Login, Otp login, Otp verification pages.

* Next we added the routing path in the routes.

* Next, we add a mobile number column in the user table **if we want to send the otp to user number.** by running the migration command - **php artisan make:migration "add_mobile_no_in_users_table"**, if we specify the table name in the command it will create the function  within the up and down function.Then specify the column name and its required info.

* 

* Next, we create one model and migration file for storing otp codes for verifications. When creating model, after giving model name if we pass -m flag with it it will generate the migration file with it. **php artisan make:model "Model name" -m**. In model file add the fillable data & in migration file add the columns and migrate it.


* Next, after signup when we want to login with otp , after clicking on login with otp it will call one function generate(), these will first check the user email is register or not.

 After that, it will call one function generateOtp() and pass the valid email given by the user.

 In generateOtp() function it will first check the email, then it will( check for the latest verificationCode if the user already requested for code if not then create one new verificationCode that will create one code for that user_id within the particular limited time and then return the code to the generate() function again otherwise return the old code again.  

 * Next, when we recieve the otp and we enter it and click on submit, it will call the loginWithOtp() function to verify the otp.

 In loginWithOtp() function, it will first take the otp and check in the db if the otp is existed for that particular user. If the otp is not match it will send the otp is incorrect and it will redirect to the previous page, if the otp is correct but it time was expired it will redirect to the previous page with error like OTP is expired. 

