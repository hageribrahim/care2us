<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

@if(isset($askdoctor))
    <h5> you have request from client about medical consultation </h5>
@elseif(isset($homeclinic))
    <h5>you have request from client about home clinic </h5>
@elseif(isset($accepthomeclinic))
    <h5>The doctor accepted your request </h5>
@elseif(isset($rejecthomeclinic))
    <h5>The doctor rejected your request</h5>
@elseif(isset($requestmedicine))
    <h5>The client need some medicine and this some information about him </h5>
@endif
<p>Email: {{$email}}</p>
<p>phone: {{$mobile}}</p>
<p>username: {{$username}}</p>
</body>
</html>