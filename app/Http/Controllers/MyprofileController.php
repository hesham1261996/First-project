<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class MyprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = auth()->user();
        $tracks = $user->tracks ;
        return view('myprofile' , compact('user' , 'tracks'));
    }
    public function update(Request $request){
        $user = auth()->user();


        if($image = $request->file('image')){
                $fileName = $image->getClientOriginalName();
                $fileextention = $image->getClientOriginalExtension() ; 
                $file_to_stor = time() .'_'. explode('.', $fileName)[0] .'_.'. $fileextention ; 

                
                
                $image->move('images' , $file_to_stor);   // (move) => to copy the file to folder image
                if($user->photo()->delete()){
                    Photo::create([

                        'filename' => $file_to_stor , 
                        'photoable_id'=> $user->id , 
                        'photoable_type'=> 'App\Models\User',
                    ]);
                    return response()->json([
                        'message' => 'your profile image successfully uploaded' , 
                        'uploaded_image' => '<img src="/images/'.$file_to_stor.'" class="img-thumbnail imag-fluid" >' , 
                        
                    ]);
                }
        }else {
            $rule = [
                'name' => ['required', 'min:5' ],
                'email' => ['required', 'email'],
            ];
            $this->validate($request , $rule);
            if($request->password == null){
                $user->update(['name'=> $request->name  , "email" => $request->email ]);
                
                return response()->json([
                    'message' => 'successfuly update' ,
                    
                ]);
            }else{
                $password = password_hash($request->password , PASSWORD_DEFAULT);
                $user->update(['name'=> $request->name  , "email" => $request->email  , "password" => $password]);
                return redirect('/myprofile')->withStatus('successfuly update');
            }    
        }
        

    }
}

