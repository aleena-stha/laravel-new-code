<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/CSS"
    href="/abc.css">
    <link rel="stylesheet" type="text/CSS"
    href="/CSS/abc.css">
    <script src="/abc.js"></script>
</head>
<body>
    <h1>Hello world!</h1>
    <img src="/images/abc.jpg">
<!--Blade templating engine-->
 <div style="color:green;">{{session('message')}}</div>
    {{ $name }} <!-- escape HTML -->
    <?php echo htmlspecialchars($name); ?>
 
    {!! $name !!}
    <?php echo $name; ?>
 
 
    {{ $add }}
 
    Blade directives
    @foreach($phone as $phone_number)
        <h1>{{ $phone_number }}</h1>
    @endforeach
 
   
    @if($number > 100)
        <p>The number is more than 100.</p>
    @elseif($number == 100)
        <p>The number equals to 100.</p>
    @else
        <p>The number is less than 100.</p>
    @endif
 
    @php
        $number = 123;
    @endphp
 
    @isset($number)
    @endisset
 
    <a href="/Gallery">Gallery</a>
</body>
</html>