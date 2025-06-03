<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Mail</title>
</head>

<body class="mail-body">
    <div class="outer-container">
        <div class="inner-container bg-light ">
            Hello!
            <br>
            <p>
                To help us make sure it's really you, here's the verification code you'll need to finish onboarding:
                <br>
                <b>{{ $otp }}</b>
            </p>
            <p>
                This code will <b>expire in 10 mins</b>. Once the code expires, you will need to request a new
                verification code
                by going through the steps onboarding again.
            </p>
            <p>
                Thank you,
                <br>
                SK
            </p>
        </div>
    </div>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- Js code -->
    <script src="../assets/js/index.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>