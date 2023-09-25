<?php

namespace App\Http\Controllers;

use App\Models\Boy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoyController extends Controller
{

    public function index()
    {
        return view('boy.index')->with('boys', Boy::all());
    }


    public function create()
    {
        return view('boy.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | min:3',
            'email' => 'required | email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('boys.create')
                ->withErrors($validator)
                ->withInput();
        }

        Boy::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('boys.index');
    }


    public function show(Boy $boy)
    {
        //
    }


    public function edit($id)
    {
        $boy = Boy::find($id);
        return view("boy.edit")->with('boy', $boy);
    }


    public function update(Request $request, $id)
    {
        $boy = Boy::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required | min:3',
            'email' => 'required | email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('boys.edit', $boy->id)
                ->withErrors($validator)
                ->withInput();
        }

        $boy->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('boys.index');
    }


    public function destroy($id)
    {
        $boy = Boy::find($id);
        $boy->delete();

        return redirect()->route('boys.index');
    }
}
