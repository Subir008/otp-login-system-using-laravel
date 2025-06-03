# Steps for Create Otp Login System

* First we have created the required pages like - Signup, Login, Otp login, Otp verification , Home pages.

* Next we added the basic routing path in the routes.

* Next, we add a mobile number column in the user table **if we want to send the otp to user number.** by running the migration command - **php artisan make:migration "add_mobile_no_in_users_table"**, if we specify the table name in the command it will create the function  within the up and down function.Then specify the column name and its required info.

* Next, we create one model and migration file for storing otp codes for verifications. When creating model, after giving model name if we pass -m flag with it it will generate the migration file with it. **php artisan make:model "Model name" -m**. In model file add the fillable data & in migration file add the columns and migrate it.


* Next, after signup when we want to login with otp , after clicking on login with otp it will call one function **generate()**, these will first check the user email is register or not.

 * After that, it will call one function **generateOtp()** and pass the valid email given by the user.

 In **generateOtp()** function it will first check the email, then it will check for the latest verificationCode if the user already requested for code, if not then create one new verificationCode that will create one code for that user_id within the particular limited time and then return the code to the **generate()** function again otherwise return the old code again.  

 * Next, when we recieve the otp and we enter it and click on submit, it will call the **loginWithOtp()** function to verify the otp.

 In **loginWithOtp()** function, it will first take the otp and check in the db if the otp is existed for that particular user. If the otp is not match it will send the otp is incorrect and it will redirect to the previous page, if the otp is correct but it time was expired it will redirect to the previous page with error like OTP is expired. 

 * After entering the correct otp, it will redirect you to the home page.

___

## Steps for sending otp through mail

* First, for mail sending is to set the mail configuration in the *.env** file. <br>
i.e., MAIL_MAILER , MAIL_HOST , MAIL_PORT , MAIL_USERNAME , MAIL_PASSWORD , MAIL_ENCRYPTION ,
MAIL_FROM_ADDRESS , MAIL_FROM_NAME
<br>
If you are using **Gmail** for sending mail then the value of the field will be --
    <ul type="square">
        <li>MAIL_MAILER = smtp</li>
        <li>MAIL_HOST= smtp.gmail.com</li>
        <li>MAIL_PORT= 587</li>
        <li>MAIL_USERNAME= Your mail address</li>
        <li>MAIL_PASSWORD= Your mail app password</li>
        <li>MAIL_ENCRYPTION= tls</li>
        <li>MAIL_FROM_ADDRESS= Your mail address</li>
        <li>MAIL_FROM_NAME="${APP_NAME}" -> It will be as it is if you want to show the project name
            otherwise give the required name</li>
    </ul>

*  **Second**, is to create one **Controller** file, one **Mailable** class and one **View**.
<br>
For creating mailable class - **php artisan make:mail Mail_File_Name**
<br>
Once after generating the mailable class the directory will get be visible if it is your first time mail configuration.
<br>

*   **Third**, in the controller file where data from the form will be taken and have to add 2 file - one Mail class and next Mailable class.
<br>
After getting all the data store the data in variables and pass the variables to the mailable class with the help of **send()** of **Mail class**.
<br>
**Mail::to($to)->send(new FirstMail($subject , $comment))**
    <ul>
        <li>
            Within **to()** have to pass the **reciever mail address**.
        </li>
        <li>
            Within **send()** we have to pass the **instance or object of the Mailable class** &
            within that we have to pass the **information given by the user**.
        </li>
    </ul>
<br>

* **Fourth**, in the mailer class there are 4 function present.First create the variables that will be required to store the data that was passed from the controller.
    <ul type="square">
    <li>
        **__construct()** method is to initialize its value of the variables.
    </li>
    <li>
        **envelope()** here the subject of the method have to give , you can give the subject as
        required or from the user form data you can use here as well.
    </li>
    <li>
        **content()** - These function will return the view that you have created where the data will
        be shown in the mail.
    </li>
    </ul>


 For showing any error message for the input field we can use **@error('name of the field') Error message @enderror**
