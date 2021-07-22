<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ url('./user/bus_id') }}" method="post">
    <table>
        <thead>
        <tr>
            <th>公車UID</th>
            <th>城市</th>
            <th>時間</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bus as $bus_)
                <tr>
                    <td>{{ $bus_->stopuid }}</td>
                    <td>{{ $bus_->city }}</td>
                    <td>{{ $bus_->time }}</td>
                </tr>
            @endforeach
        <tr>
            {{ csrf_field() }}
            <td>查詢公車 (ex:Miaoli, Hsinchu)</td>
            <td><input type="text" name="$city_name"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="查詢"></td>
        </tr>
    </table>
</form>
</body>
</html>
