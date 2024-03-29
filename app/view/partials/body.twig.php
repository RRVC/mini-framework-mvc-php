<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{BASE}}vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{BASE}}css/style.css">
    <title>
        {% block title %} {% endblock %}
    </title>
</head>

<body>

    {% include 'partials/header.twig.php' %}

    {% block body %} {% endblock %}

</body>

</html>