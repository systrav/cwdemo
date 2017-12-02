<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Contact;
use App\Attachment;

class ContactsController extends Controller
{
    /**
        show list
    */
    public function list(Request $req){
        $cons = Contact::paginate(10);
        
        return view('contact.list',['cons'=>$cons] );
    }

    /**
        show detail
    */
    public function detail(Request $req, $id){
        $con = Contact::find($id);
        $files = Attachment::where('contact_id',$id)->get();
        
        return view('contact.detail',['con'=>$con, 'files'=>$files]);
    }
    
    /**
        post contact form
    */
    public function create(Request $req) {
        // Validation
        $this->validate($req, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'firstname_kana' => ['required','regex:/^[ァ-ンー－]+$/u','max:255'],
            'lastname_kana' => ['required','regex:/^[ァ-ンー－]+$/u','max:255'],
            'gender' => 'required|numeric|between:1,2',
            'birth_date' => 'required|date|max:255',
            'telno_1' => ['required','regex:/^[0-9-]+$/','max:20'],
            'telno_2' => ['nullable','regex:/^[0-9-]+$/','max:20'],
            'telno_3' => ['nullable','regex:/^[0-9-]+$/','max:20'],
            'title' => 'required|max:255',
            'body' => 'required|max:5000',
            'attachment1'=> 'file|image|max:10000', //10MB
            'attachment2'=> 'file|image|max:10000', 
            'memo_1' => 'max:5000',
        ]);

        // Insert
    	try{
            DB::beginTransaction();
            
            // Contact
            $p = $req->except(['_token','attachment1','attachment2']);
            $con = Contact::create($p);
            
            // Attachment file
            foreach([$req->attachment1, $req->attachment2] as $file){
                Attachment::saveFile($con->id, $file);
            }

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect('/cwdemo/contacts/form')->withInput()->withErrors([0 => 'unknown error']);
        }
        
        return redirect('/cwdemo/contacts/sent');
    }

}
