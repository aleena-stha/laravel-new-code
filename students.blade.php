<!DOCTYPE html>
<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <!-- Fonts -->
        
        
    </head>
    <body>
        {{session('success') }}
        <h1> Students Records :</h1>
        @foreach($students as $student)
        <div>
        {{ $student->name }},
        {{ $student->add}}
         <a href ="/delete/{{$student->id}}">
            Delete</a>
           </div>
        
        @endforeach

    </body>
</html>
