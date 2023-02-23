<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <title>@lang('Contact Us')</title>
</head>
<body>
<h1>السلام عليكم ورحمة الله وبركاته</h1>
<div class="row">
    <p>{{ $contact->message }}</p>
</div>

<div class="row d-flex">
    {{ $contact->name }} الإسم :
    {{ $contact->phone }} الهاتف :
</div>
</body>
</html>