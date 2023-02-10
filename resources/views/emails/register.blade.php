@component('mail::message')
# Account Created!

<h3>Dear user,</h3><br>
<p>
    Your account has been created on SVNHS - SHS School Board!<br>
    This is a password for you to login your account.<br><br>
    <h1>{{$pass}}</h1><br><br>
    <br><br>
</p>

    You can access your account in this link.
@component('mail::button', ['url' => 'https://puptcapstone.net/shsboard/logins'])
Click here
@endcomponent

Have a splendid day,<br>
SVNHS SHS - BOARD 
@endcomponent
