<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

@if(isset($offer))
    <h5>one of the pharamcy asked about your offer and this pharmacy information </h5>
@elseif(isset($request))
    <h5>one of the pharamcy asked about your Medicines and this pharmacy information </h5>
@elseif(isset($accept))
    <h5>one of the pharamcy asked accept your request </h5>
@elseif(isset($reject))
    <h5>one of the pharamcy asked reject your request </h5>
@elseif(isset($client)&& $client == 1)
    <h5>The request of medicine has been confirmed </h5>
@elseif(isset($client)&& $client == 2)
    <h5>The request of medicine has been rejected </h5>
@endif
<p>Email: {{$email}}</p>
<p>Phramacy Name: {{$pharmacyName}}</p>
<p>username: {{$username}}</p>
</body>
</html>

