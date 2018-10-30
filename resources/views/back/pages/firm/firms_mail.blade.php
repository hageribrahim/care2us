<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

@if(isset($acceptoffer))
    <h5>The request for the offer has been confirmed </h5>
    @elseif(isset($rejectoffer))
    <h5>The request for the offer has been rejected </h5>
    @elseif(isset($acceptrequest))
    <h5>The request of medicine has been confirmed </h5>
    @elseif(isset($rejectrequest))
    <h5>The request of medicine has been rejected </h5>
    @endif
<p>Email: {{$email}}</p>
<p>Firm Name: {{$f_name}}</p>
<p>username: {{$username}}</p>
</body>
</html>
