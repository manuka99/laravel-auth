<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    @if (auth()->user()->two_factor_secret)
        <p>Two factor authentication has been enabled.</p>

        <form action="{{ url('/user/two-factor-authentication') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Disable two factor authentication</button>
        </form>


        <form action="{{ url('/user/two-factor-recovery-codes') }}" method="POST">
            @csrf
            <button type="submit">Re-generate recovery codes</button>
        </form>

    @else
        <p>Two factor authentication has been disabled.</p>
        <form action="{{ url('/user/two-factor-authentication') }}" method="POST">
            @csrf
            <button type="submit">Enable two factor authentication</button>
        </form>

    @endif


    @if (session('status') == 'two-factor-authentication-enabled')
        <p>Two factor authentication has been successfully enabled.</p>

        <h4>QR code</h4>
        {!! Auth::user()->twoFactorQrCodeSvg() !!}

        <h4>Recovery codes</h4>

        @foreach (json_decode(decrypt(Auth::user()->two_factor_recovery_codes, true)) as $code)
        <p>{{ $code }}</p>
    @endforeach

    @endif


</body>

</html>
