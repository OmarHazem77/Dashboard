<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorsRequest;
use App\Models\department;
use App\Models\doctor;


use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{
//    public static function middleware():array
//    {
//return [
//    new Middleware('IsLogin')
//];
//    }
    public function index(){

       $doctors = doctor::all();
        return view('admin.doctors.index',compact('doctors'));
    }
    public function show($id){
        $doctors = doctor::findorfail($id);
        $departments = department::get();
        return view('admin.doctors.show ', compact('doctors', 'departments'));
    }

    public function create(){
        $doctors = doctor::get();
        $departments = department::get();
        return view('admin.doctors.create',compact('doctors','departments'));

    }
//    public function store(DoctorsRequest $request){
//        $doctor = new doctor();
//        $doctor->id=$request->id;
//        $doctor->name = $request->name;
//        $doctor->email = $request->email;
//        $doctor->photo = $request->photo;
//        $doctor->dep_id = $request->department;
//        $photo = $request->file('photo');
////        $photoName = $photo->getClientOriginalName();
//        $photo->store('images');
//        $doctor->save();
//
////        doctor::create([
////            'id'=>$request->id,
////            'name'=>$request->name,
////            'email'=>$request->email,
////            'dep_id'=>$request->department
////
////        ]);
//        return redirect()->back()->with('msg', 'Adedd...');
//
//    }
    public function store(DoctorsRequest $request){
        $doctor = new Doctor();
        $doctor->id = $request->id;
        $doctor->name = $request->name;
        $doctor->email = $request->email;

        // Handling the image upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('images', 'public'); // Store image in 'public/images'
            $doctor->photo = $photoPath; // Save the path in the database
        }

        $doctor->dep_id = $request->department;
        $doctor->save();

        return redirect()->back()->with('msg', 'Added...');
    }

    public function edit($id){
        $doctors = doctor::findorfail($id);
        $departments = department::get();
        return view('admin.doctors.edit',compact('doctors','departments'));
    }
//    public function update(DoctorsRequest $request,$id){
//        $doctors = doctor::findorfail($id);
//        $doctors->update($request->all());([
//           'name'=>$request->name,
//            'email'=>$request->email,
//           'dep_id'=>$request->department
//        ]);
//        return redirect()->back()->with('msg', 'Updated...');
//
//    }
    public function update(DoctorsRequest $request, $id)
    {
        $doctor = doctor::findOrFail($id);  // Make sure the model name starts with uppercase
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('images');
            $data['photo'] = $photo;
            if (!empty($doctor->photo) && Storage::exists($doctor->photo)) {
                storage::delete($doctor->photo);
                if (empty(Storage::files('images'))){
                    Storage::deleteDirectory('images');
                }
            }
        }
        $doctor->update($data);


        return redirect()->back()->with('msg', 'Updated...');
    }


    public function destroy($id){
    $doctor = doctor::findorfail($id);
    if (!empty($doctor->photo) && Storage::exists($doctor->photo)) {
        Storage::delete($doctor->photo);
    }
    $doctor->delete();
    return redirect()->back()->with('msg', 'deleted...');
//    doctor::destroy($id);
//    return redirect()->back()->with('msg', 'deleted...');
}
public function archive()
{
    $doctors = doctor::onlyTrashed()->get();
    return view('admin.doctors.archive', compact('doctors'));
}
    public function destroyArchive ($id){
        $doctors = doctor::onlyTrashed()->where('id',$id) ;
        $doctors->forceDelete();
        return redirect()->back()->with('msg', 'force deleted...');
    }

    public function restore($id){
        $doctors = doctor::onlyTrashed()->where('id',$id) ;
        $doctors->restore();
        return redirect()->route('admin.doctors.index')->with('msg', 'restore...');
    }
}
