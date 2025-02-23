<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Student;
use App\Http\Requests\RegistrationRequest;


class StudentController extends Controller

{
  //outside the class variable or functons
  //inside the class properties and methods
    public function registration(RegistrationRequest $request)
       {
        // echo "Registering..";
         //$_POST['variable']
         //dd($request->all());
         //dd($request->add);
         //dd($request->name);
 
 
         $name =$request->name; // name from form
         $add =$request->add; 
         $gender =$request->gender; 
         $dob =$request->dob; 
         $email=$request->email; 
         $password =$request->password; 
        // $password =$request->input('password'); 
         
         $photo_name='';
           if ($request->hasfile('photo')){
         $photo=$request->file('photo'); 
         
         //$photo_name= $photo -> getClientOriginalName(); //give file name,name 
         // with date and time,use Timestand in small bracket()
 
         $photo_name =$photo->hashName();//random name
         $photo->move('uploads/',$photo_name);
         }



 
         //validation
         /*
 
         $student = new Student;
         $student->name =$name; // name from model column/database
         $student->add =$add;
         $student->gender =$gender;
         $student->dob =$dob;
         $student->email =$email;
         $student->password =$password;
         $student->photo =$photo_name;
         $student->save(); */

         Student::create([
          'name'=>$name,
          'add'=>$add,
             'gender'=>$gender,
             'dob' =>$dob,
             'email'=>$email,
             'password'=>$password,
             'photo'=>$photo_name,

         ]);

         //echo"Registration Successful";
         return redirect('/')->with ('message','Registration successful.');
        }
     public function delete( Request $request) //object typing class
     {
      //echo"deleting...";
      $student_id= $request->id;
     

         $student=Student::find($student_id);
         //student =Student :

         if(!empty($student->photo)){
         //delete the photo
         $image_path =public_path('uploads/'.
         $student->photo);

         if(file_exists($image_path)){
         unlink($image_path);

         
         }
        }
 
    
      $student->delete();
      
       //Student::destroy($student_id); //  delete only for primary key and only for one student
      //Student::destroy([1,2,3,]); // for multiple data in array only for primary key
      //Student::where('id',$student_id)->delete() ;         //for other field except primary key

      //After deleting we go back to some other page

      //return redirect('/'); // to retuen different uel
      return back()-> with('success','Student  record deleted 
         successfully!'); //to return back to same page
         }


      public function  updateForm(Request $request)
        {
          $student_id =$request->id;

          $student =Student::find($student_id);
          if (empty($student)){
            return redirect('/home')->with('success', 'The student does not exist.');
          }
          return view('update',['student'=> $student]);
        }
       
        public function update(Request $request)
        {
          //echo "updating...";
          $name =$request->name;
          //$name =$request->input('name');

          $name =$request->add;
          $name =$request->gender;
          $name =$request->dob;
          $name =$request->email;
          $name =$request->password;
        
        
          $photo_name='';


          if ($request->hasfile('photo')){
        $photo=$request->file('photo'); 
        
        //$photo_name= $photo -> getClientOriginalName(); //give file name,name 
        // with date and time,use Timestand in small bracket()

        $photo_name =$photo->hashName();//random name
        $photo->move('uploads/',$photo_name);
        }

//validate
               //logic to remove old photo

               if(!empty($student->photo)){
                //delete the photo
                $image_path =public_path('uploads/'.$student->photo);
       
                if(file_exists($image_path)){
                unlink($image_path);
        }
        Student::where()->update([]);
        return redirect('/home')-> with('success','Student  record deleted 
        successfully!');;
      }
      }
          
      
 
 
 
 /*return[
 Rules::Registarion Request
 public  function rules()
 'name' => 'required',
 'add' => 'required',
 'gender' => 'required',
 'dob' => 'required|date',
 'email' => 'required|email',
 'password' => 'required|min:6|max:20',
 'photo' => 'nullable|image|max:2048',
 'cv' => 'required|mimes:docx,rtf,adt'
 ];
 
 /*public function authorize():boolval{ // for authorize person
  if($user== 'ram'){
   return true;
  }
  else{
   return false;
  }
 */
}
