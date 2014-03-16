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
            <table class="table">
                <tr style="text-align:center">
                {top_menu}
                <td><a href="{href}" style="{selected}">{r_title}</a></td>
                {/top_menu}
                <td>{logoff}</td>
                </tr>
            </table>
            