<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <title>@yield('title')</title>
        <style type="text/css">
        <!--
        .h1 {
            padding: 0.3em;/*文字周りの余白*/
            color: #494949;/*文字色*/
            background: #fffaf4;/*背景色*/
            border-left: solid 5px #ffaf58;/*左線（実線 太さ 色）*/
        }
        .h2 {
            padding: 0.5em;/*文字周りの余白*/
            font-size: 16pt;/*文字サイズ*/
            color: #494949;/*文字色*/
            background: #fffaf4;/*背景色*/
            border-left: solid 5px #ffaf58;/*左線（実線 太さ 色）*/
            margin: 10px 0px 0px 30px;
        }
        .link {
            width:90%;
            padding: 0.3em;/*文字周りの余白*/
            font-size: 16pt;/*文字サイズ*/
            color: #494949;/*文字色*/
            background: #fffaf4;/*背景色*/
            margin: 10px 0px 0px 30px;
            background: #fffaf4;/*背景色*/
            text-decoration: none;
            display: block;
        }
        th {
            background-color:#999; color:fff; padding:5px 10px;
        }
        td {
            border:solid 1px #aaa; color:#999; padding:5px 10px;
        }
        .home {
            font-size:20pt;
        }
        a {
        }
        -->
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <a href="/" class="home">@yield('homelink')</a>
        <h1 class="h1">@yield('title')</h1>
        @yield('content')
    </body>
</html>