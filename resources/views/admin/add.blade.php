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
<form action="{{ url('/user/store') }}" method="post">
<table>
    <tr>
        {{ csrf_field() }}
        <td>增新書名</td>
        <td><input type="text" name="book_name"></td>
    </tr>
    <tr>
        <td>增新價格</td>
        <td><input type="text" name="price"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="確認"></td>
    </tr>
</table>
</form>
</body>
</html>
