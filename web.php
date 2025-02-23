<?php
 
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\StudentController; 
 
use App\Models\Student; //// Ensure to import the model at the top


Route::get('/', function () {
    $name = '<script>alert("hello script")</script>';
    $add = 'pokhara';
    $phone = [1256734,25224,3244];
    $number = 21;
    return view('abc',['name' => $name,
                        'add' => $add,
                        'phone'=> $phone,
                        'number'=> $number
                    
                    ]);
}) ->name('home');
 
Route::get('/contact', function () {
    //return view('welcome');
    $a = 6;
    $b = 5;
    return $a+$b;
});
 
Route::get('/gallery', function(){
    //return view('xyz');
  //  echo app_path();
//   echo "<br>";
//   echo base_path('/storage/logs/laravel.log');
  //  echo "<br>";
//   echo base_path('/storage/logs/laravel.log');
//   echo resource_path();
  //  echo "<br>";
  //  echo public_path();
    // abort(402); // html error codes
     //exit();
     // $name = 'abc';
     //     dd($name);
    // var_dump($name); die();
 
    //  return redirect('/login');
    // return back();
 
});
Route::get('/news/nepal/gandaki/pokhara/naya-gaun', function(){
    return 'Hello world!';
}) ->name('pokhara');
 
Route::get('/about', function(){
    return view('about');
});
 
Route::get('/user/{id}/{abc}', function($id, $abc){
    return $id + $abc;
});
 
Route::get('/product/{id}', function($id){
    return $id;
})->where('id','[A-z]+'); // regex- regular expression
Route::get('/blog/{id}/comments/{comment_id}', function($id, $comment_id){
    return $id;
});


Route::get('/product/{id}',function($id){
    return $id;
})->where('id','[A-z]+');//regex - regular expression
 
Route::get('/blog/{id}/comment/{comment_id}',function($id,$comment_id){
    return $id;
});
 
Route::get('/home',function()
{
    
    

    // Fetch all students (collection)
    //$students = Student::all();

    // Fetch a student with ID 1
    //$students1 = Student::find(1);

    // Fetch all students (Fixing 'all' column error)
/* $students2 = Student::all(); //
    return view('students', [
        'students1' => $students1,
        'students2' => $students2
    ]);*/


    //return view('students', ['students1' => $students1, 'students2' => $students2]);
   
   

//$students =$student::first();//model

   //$students =$student::where('add',
   //'pokhara-1')->  orWhere('add' ,
   //'ktm')->get(); //collection
   
   //SELECT * FROM Students WHERE 
   //add=pokhara OR gender=2
  //$students=Student::where('add','pokhara1')->get();
  //$students=Student::where('add','pokhara1')->where('gender',2)->get();

  

  
    // Fetch all students (collection)
    //$students =Student::all();

    // Fetch a student with ID 1
   // $students1 = Student::find(1);

    





  
   ////$students1 =Student::find(2);// it fetches data from model

   // Fetch all students 
   //$students2=$student::all();
   //$students2 =Student::where('all',2)->get();//collection

   //return view('students',[
    //'students1' => $students1,
    //'students2' => $students2 ]);*/
     // return view('home');
    // $students = Student::all();
    // $students = Student::first();
    // $students = Student::where('add','Pokhara1')->get(''); // this line doesnot work because P is capital
    // $students = Student::where('gender', 2)->get();
    // $students = Student::where('add', 'pokhara1')->get();
    // $students = Student::where('add', 'pokhara1')->where('gender', 2)->get();
    // $students = Student::where('add', 'pokhara1')->orwhere('add', 'pokhara-14')->get();
    // $student = $student::all(); // collection
    // $student = $student::first(); // model
    // $student = $student::where('add','pokhara1'); // collection
    //$students1 = student::find(1); //it fetches data from model
    // $students2 = student::where('id', 2)->get(); //it fetches data from database
    //$students2= student::all();
    $students2= student::all(); // Fetch all students

    //return view('students', compact('students'));
    return view('students', ['students2' => $students2, 'students2' => $students2]);
});
   
   


    Route::get('/student-registration',function(){
        return view('register');
    });

    //Route::post('/registration',function(){ //echo "registrating";});
    Route::post('/registration',[StudentController::class,'registration'])
    ->name('registration');
    




    Route::get ('/delete/{id}',[StudentController::class,'delete'])->where('id','[0-9]+');

    Route::get ('/update/{id}',[StudentController::class,'updateForm']);

    Route::post('/update',[StudentController::class,'update']);
    //nameview or name of post url {controllername::class,'functionname inside the class']}
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';