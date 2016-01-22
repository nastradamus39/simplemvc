<!doctype html>
<html>
<head>
    <title>Главная</title>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="HTTP Logger">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple MVC Framework</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <!-- polymer -->
    <script src="/bower_components/webcomponentsjs/webcomponents.js"></script>
    <!-- polymer -->

    <!-- polymer elements -->
    <link rel="import" href="/elements/newslist.html">
    <!-- polymer elements -->

</head>

<body>

<div class="container-fluid">

    <div class="page-header">
        <h1>Simple MVC Framework<small> demo.</small></h1>
    </div>

    <ul class="nav nav-pills">
        <li role="presentation" <? if('/' == $data['page']){ ?> class="active" <? } ?>><a href="/">Главная</a></li>
        <li role="presentation" <? if('news' == $data['page']){ ?> class="active" <? } ?>><a href="/news/">Новости</a></li>
    </ul>

    <br/><br/>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <? // Content goes next.... ?>
