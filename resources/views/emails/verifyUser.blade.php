<!DOCTYPE html>
<html>
<head>
    <title>تایید ایمیل</title>
</head>

<body>
<h2>به سامانه مزایده خوش آمدید {{$user['name']}}</h2>
<br/>
ایمیل ثبت نامی شما {{$user['email']}}  می باشد. لطفا برای تایید بر روی لینک زیر کلیک کنید.
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">تایید ایمیل</a>
</body>

</html>