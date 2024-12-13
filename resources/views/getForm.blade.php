<x-layout>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <form action="/getInfo" method="POST">
            @csrf
            <input type="text" name="username">
            <input type="text" name="domain_name">
            <input type="text" name="os">
            <input type="text" name="processor_count">
            <input type="submit" value="Submit">
        </form>

    </body>

    </html>

</x-layout>
