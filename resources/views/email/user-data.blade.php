<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'Votre compte ' . env('APP_NAME') . 'est créer avec success' }}</title>
</head>

<body>
    <h1>Hello {{ $data['fname'] }},</h1>
    <h1>Your account data is:</h1>
    <h2>prénom :<strong>{{ $data['fname'] }}</strong></h2>
    <h2>nom :<strong>{{ $data['lname'] }}</strong></h2>
    <h2>email :<strong>{{ $data['email'] }}</strong></h2>
    <h2>password :<strong>{{ $data['password'] }}</strong></h2>

    <div>
        If you did not create an account, no further action is required.
    </div>
    <div>
        Regards,
    </div>
    <div>
        <a href="https://footixfoxes.com">Footysphere</a>
    </div>
</body>

</html>