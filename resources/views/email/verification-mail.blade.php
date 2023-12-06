<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email Address</title>
</head>

<body>
    <h1>Hello {{ $user->username }},</h1>
    <p>Verification code is :</p>
    <h2>{{ $code }}</h2>

    <div>
        If you did not create an account, no further action is required.
    </div>
    <div>
        Regards,
    </div>
    <div>
        Footysphere
    </div>
</body>

</html>
