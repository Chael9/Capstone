<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  style="height: 100%; margin: 0px; padding: 0px;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <title></title>

        {{-- Style --}}
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
        <style>
                .message {
                  list-style: none;
                  margin: 0;
                  padding: 0;
                }

                .message li {
                  margin-bottom: 10px;
                  padding-bottom: 5px;
                  border-bottom: 1px dotted #B3A9A9;
                }

                .message li .message-body p {
                  margin: 0;
                  color: #777777;
                }

                .panel-body {
                  overflow-y: scroll;
                  height: 350px;
                }

                ::-webkit-scrollbar-track {
                  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                  background-color: #F5F5F5;
                }

                ::-webkit-scrollbar {
                  width: 12px;
                  background-color: #F5F5F5;
                }

                ::-webkit-scrollbar-thumb {
                  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                  background-color: #555;
                }
              </style>


</head>
<body>
    <div id="app">
            @yield('content')
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
