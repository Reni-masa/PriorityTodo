<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div id="app">
            <example-component></example-component>


        </div>

        <form action="api/todo" method="post">
            <p>追加</p>
            content：<input type="text" name="content">
            priority_id：<input type="number" name="priority_id">
            deadline_date：<input type="tectxt" name="deadline_date">
            <input type="submit">
        </form>
        <form action="api/todo/3" method="post">
            @method("PUT")
            <p>更新3</p>
            content：<input type="text" name="content">
            priority_id：<input type="number" name="priority_id">
            deadline_date：<input type="tectxt" name="deadline_date">
            <input type="submit">
        </form>
        <form action="api/todo/3" method="post">
            @method("DELETE")
            <p>削除3</p>
            <input type="submit">
        </form>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
