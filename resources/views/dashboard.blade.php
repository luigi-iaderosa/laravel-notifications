<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('7ecac18fc799e1d8bad5', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('user-created', function(data) {
            alert('A new user has been created! Hooray!');
            location.reload(); // devi ricaricare la pagina per farmi vedere il messaggio nuovo
        });
    </script>
</head>
<body>
<div class="flex-center position-ref">
    <table>
        <caption style="font-weight: bold"> User props </caption>
        <thead style="font-weight: bold">
            <td>Name</td>
            <td>Email</td>
        </thead>
        <tbody>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tbody>
    </table>
</div>
<br>
<div class="flex-center position-ref">
    <table>
        <caption style="font-weight: bold">Unread Notifications</caption>
        <thead style="font-weight: bold; background-color: #0C9A9A">
            <td>Id</td>
            <td>Data</td>
            <td>Delete Action</td>
        </thead>
        <tbody>
        @foreach($unread as $notification)
            <tr>
                <td>{{$notification->id}}</td>
                <td>{{json_encode($notification->data)}}</td>
                <td><button>Delete</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br>
<div class="flex-center position-ref">
    <table>
        <caption style="font-weight: bold">Read Notifications</caption>
        <thead style="font-weight: bold; background-color: #0C9A9A">
        <td>Id</td>
        <td>Data</td>
        </thead>
        <tbody>
        @foreach($read as $notification)
            <tr>
            <td>{{$notification->id}}</td>
            <td>{{json_encode($notification->data)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br>

{{--
<div class="flex-center position-ref">
    <form action="createUser" method="post">
        <input type="submit" value="Create a random user!">
        {{csrf_field()}}
    </form>
</div>
--}}

</body>
</html>
