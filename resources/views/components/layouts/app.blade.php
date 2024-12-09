<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
            margin: 0;
            display: flex;
            min-width: 320px;
            min-height: 100vh;
            }


            #app {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
            }

            .tic-tac-toe {
            text-align: center;
            }

            .board {
            display: inline-block;
            margin-top: 20px;
            }

            .row {
            clear: both;
            }

            .cell {
            width: 50px;
            height: 50px;
            float: left;
            margin-right: -1px;
            margin-bottom: -1px;
            line-height: 50px;
            text-align: center;
            border: 1px solid #bbb;
            cursor: pointer;
            font-size: 40px;
            }

            .cell-x {
            color: #f00;
            }

            .cell-o {
            color: #00f;
            }

            button {
            margin-top: 20px;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            background-color: #ccc;
            border: none;
            cursor: pointer;
            }
        </style>


        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
