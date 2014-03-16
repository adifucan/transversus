<!DOCTYPE html>
<html lang="ru">

    <head>
        <title>{title}</title>

        <meta name="description" content="{description}"/>	
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="/static/favicon.ico" rel="shortcut icon" />   
        <link rel="stylesheet" type="text/css" href="/static/css/style.css" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="/static/scripts/script.js"></script>   
	
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="/"><h2>TRANSVERSUS.NET</h2></a>
                </div>
                <div class="col-md-7" style="padding-top:15px">
                            <ul class="nav nav-pills pull-left">
                                <li class="{home_selected}"><a href="/">Главная</a></li>
                                <li class="{parser_selected}"><a href="/parser-php">Статьи по PHP</a></li>
                                <li class="{contact_selected}"><a href="/contact">Контакты</a></li>
                            </ul>
                            <form class="navbar-form navbar-left" role="search" action="search.php" method="POST">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Поиск</button>
                          </form>
                </div>


            </div>