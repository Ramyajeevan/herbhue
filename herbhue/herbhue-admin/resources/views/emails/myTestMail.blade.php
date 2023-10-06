<!DOCTYPE html>
<html>
<head>
    <title><?php echo env('APP_NAME'); ?></title>
</head>
<body>
    <h1>{{ $title }}</h1>
    {!!html_entity_decode($body)!!}

    <br>
    <p>Regards,</p>
    <p>Bharat Vikas Parishad</p>
</body>
</html>
