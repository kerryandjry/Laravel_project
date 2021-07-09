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
<form action="<?php echo e(url('user/store')); ?>" method="post">
<table>
    <tr>
        <?php echo e(csrf_field()); ?>

        <td>用戶名</td>
        <td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="提交"></td>
    </tr>
</table>
</form>
</body>
</html>
<?php /**PATH C:\Users\kerry\Phpprojects\test\resources\views/user/add.blade.php ENDPATH**/ ?>