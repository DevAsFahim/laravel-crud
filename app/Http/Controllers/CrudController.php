<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Session;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function showData() {
        // $showData = Crud::all();
        $showData = Crud::paginate(5);
        // $showData = Crud::simplePaginate(5);

        return view('show_data', compact('showData'));
    }

    public function addData() {
        return view('add_data');
    }
    public function storeData(Request $request) {
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email'
        ];

        $customMessage = [
            'name.required' => 'Name is required',
            'name.max' => 'Name cannot be more then 10 characters',
            'email.required' => 'Enter your email',
            'email.email' => 'Enter a valid email'
        ];
        
        $this->validate($request, $rules, $customMessage);

        $data = new Crud();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        Session::flash('msg', 'Data successfully added');

        return redirect('/');
    }
    
    public function editData($id = null) {
        $editData = Crud::find($id);

        return view('edit_data', compact('editData'));
    }

    public function updateData(Request $request, $id) {
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email'
        ];

        $customMessage = [
            'name.required' => 'Name is required',
            'name.max' => 'Name cannot be more then 10 characters',
            'email.required' => 'Enter your email',
            'email.email' => 'Enter a valid email'
        ];

        $this->validate($request, $rules, $customMessage);
        
        $data = Crud::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        Session::flash('msg', 'Data successfully updated');

        return redirect('/');
    }

    public function deleteData($id) {
        $deleteData = Crud::find($id);

        $deleteData->delete();
        Session::flash('msg', 'Data successfully Deleted');
        return redirect('/');
    }
}
