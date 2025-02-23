<!DOCTYPE html>
<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Registration</title>

        <!-- Fonts -->
        
        
    </head>
    <body>

    @if($errors->any())
       @foreach($errors->all() as $error)
       <div style ="color:red;">{{ $error }}</div>
       @endforeach
      @endif
        <h1> Student Registration</h1>
        <!--<form action="/registration" method="post">-->
        <form action="{{route('registration')}}" 
        method ="post" enctype="multipart/form-data"> 
            
            @csrf
            <div>
               <label>Name:</label>
                <input type="text" name="name" value="{{old('name')}}">

                @error('name')
                <div style="color:red;">{{$message }}</div>

           @enderror
             </div>
             <div>
                <label>Address:</label>
                <input type="text" name="add" value="{{old('add')}}">
                 

             </div>

             <div>
                 <label>Gender</label>
                
                 <select name="gender">
                    <option value="2">Male</option>
                    <option value="1">Female</option>
                    <option value="3">N/A</option>
                     </select>
            </div>
             <div>
                <label>DOB:</label>
                <input type="date" name="dob">
            
              </div>
             <div>
                <label>Email:</label>
                <input type="email" name="email">
             </div>
            
             <div>
                <label>Password:</label>
                <input type="password" name="password">
             </div>

             <div>
                <label>Photo:</label>
                <input type="file" name="photo">
             </div>

             <div>
                
             <input type="register" name="register" value="Register">
             </div>
    </form>
    </body>
</html>