<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\branches\branches;
use App\Models\roomspa\roomspa;
use App\Models\booking\booking;
use Illuminate\Support\Facades\Hash;
use Redirect;
use File;

class adminsController extends Controller
{
    public function viewlogin(){

        return view('admins.login');
    }

    public function seelogin(Request $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);   
    }

    public function index(){   //index sa admin ito

        $adminsCount = Admin::select()->count();
        $branchesCount = branches::select()->count();
        $servicesCount = roomspa::select()->count();
        $bookingsCount = booking::select()->count();


        return view('admins.index', compact ('adminsCount', 'branchesCount', 'servicesCount','bookingsCount'));
    }

    public function alladmins(){

        $admins = Admin::select()->orderBy('id', 'desc')->get();
        return view('admins.alladmins', compact ('admins'));
    }

    public function  createadmins(){

        return view('admins.createadmins');
    }

    public function   storeadmins(Request $request){

        $storeadmins = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make ($request->password),
        ]);
        if($storeadmins){
            return Redirect::route('admins.all')->with(['success' => 'Admin created successfully']);
        }
    }
//
    public function editadmins($id)
    {
        $admin = Admin::find($id);
        return view('admins.editadmins', compact('admin'));
    }

    public function updateadmins(Request $request, $id)
    {
        $admin = Admin::find($id);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    //check if may pass given
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    //update and nakahash pa rin
        $admin->update($data);
    
        if ($admin) {
            return Redirect::route('admins.all')->with(['success' => 'Admin updated successfully']);
        }
    }
   
    public function deleteadmins($id)
    {
        $admin = Admin::find($id);

        if ($admin) {
            $admin->delete();
            return Redirect::route('admins.all')->with(['deleted' => 'Admin deleted successfully']);
        }

        return Redirect::route('admins.all')->with(['error' => 'Admin not found']);
    }
    public function allbranches(){

        $branches = branches::select()->orderBy('id', 'asc')->get();
        return view('admins.allbranches', compact ('branches'));
    }

    public function createbranches(){

        return view('admins.createbranches');
    }

    public function   storebranches(Request $request){

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage); //to upload an image for new branch by grabbing this

        $storebranches = branches::create([

            "name" => $request->name,
            "image" => $myimage,
            "description" => $request->description,
            "location" => $request->location,
        ]);
        if($storebranches){
            return Redirect::route('branches.all')->with(['success' => 'New Branch created successfully']);
        }
    }

    public function editbranches($id) {

        $branch = branches::find($id);
        return view('admins.editbranches', compact('branch'));
    }

    public function updatebranches(Request $request, $id) {

        $branch = branches::find($id);
        $branch -> update($request->all());
        if($branch){
            return Redirect::route('branches.all')->with(['success' => 'Updated successfully']);
    }
    }

    public function deletebranches($id) {

        $branch = branches::find($id);

        if(File::exists(public_path('assets/images/' . $branch->image))){
            File::delete(public_path('assets/images/' . $branch->image));
        }else{
            //dd('File does not exists.');
        }

        $branch->delete();
        if($branch){
            return Redirect::route('branches.all')->with(['deleted' => 'Branch deleted successfully']);
    }
    }

public function allroomspa(){

    $roomspa = roomspa::with('branch')->orderBy('id', 'asc')->get();
    return view('admins.allroomspa', compact('roomspa'));

}
    
    public function createroomspa(){

        $branches = branches::all();
        return view('admins.createroomspa' , compact('branches'));
    }

   public function storeroomspa(Request $request)
{
    $request->validate([
        'branch_id' => 'required|integer|exists:branches,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
    ]);

    // Process the uploaded image
    $destinationPath = 'assets/images/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage); //to upload an image

    // Create the new Roomspa service
    $storeroomspa = roomspa::create([
        "name" => $request->name,
        "image" => $myimage,
        "spaservice" => $request->spaservice,
        "currency_code" => $request->currency_code,
        "price" => $request->price,
        "maxpeeps" => $request->maxpeeps,
        "bed" => $request->bed,
        "view" => $request->view,
        "branchname" => $request->branchname,
        "branch_id" => $request->branch_id,
    ]);

    // Check if the Roomspa service was successfully created
    if ($storeroomspa) {
        // Redirect with success message
        return redirect()->route('roomspa.all')->with('success', 'New Roomspa Service created successfully');
    }
}

    public function editroomspa($id) {

        $service = roomspa::find($id);
        $branches = branches::all(); // Fetch all branches for the dropdown
        return view('admins.editservices', compact('service', 'branches'));
    }

    public function updateroomspa(Request $request, $id) {

        $service = roomspa::find($id);
        $service->update($request->all());
        if($service){
            return Redirect::route('roomspa.all')->with(['success' => 'Service updated successfully']);
    }
    }


public function deleteroomspa($id) {

    $roomspa = roomspa::find($id);

    // Check if image exists and delete it
    if (File::exists(public_path('assets/images/' . $roomspa->image))) {
        File::delete(public_path('assets/images/' . $roomspa->image));
    }

    // The 'deleting' method in the Roomspa model will handle deleting associated bookings
    $roomspa->delete();

    return Redirect::route('roomspa.all')->with(['deleted' => 'Roomspa and Services deleted successfully']);
}

    
    public function allbookings(){

        $bookings = booking::select()->orderBy('id', 'asc')->get();

        return view('admins.allbookings', compact ('bookings'));
    }
    
    public function updatestatus($id) {

        $booking = booking::find($id);
        return view('admins.updatestatus', compact('booking'));
    }
    
    public function updatedstatus(Request $request, $id) {
        //dd($request->all()); para makita ko lang ano ipapasa...
        $updatedStatus = Booking::find($id);

        $updatedStatus->update($request->all());

        if($updatedStatus){
            return Redirect::route('bookings.all')->with(['update'=> 'Status updated successfully']);
        }

    
        // if (!$updatedStatus) {
        //     return redirect()->route('bookings.all')->with(['error' => 'Booking not found']);
        // }
    
        // // Only update the 'status' field
        // $updatedStatus->update(['status' => $request->status]);
    
        // return redirect()->route('bookings.all')->with(['updated' => 'Booking status updated successfully']);
    }
    

    public function deletebookings($id) {

        $bookingsdel = booking::find($id);

        if(File::exists(public_path('assets/images/' . $bookingsdel->image))){
            File::delete(public_path('assets/images/' . $bookingsdel->image));
        }else{
            //dd('File does not exists.');
        }

        $bookingsdel->delete();
        if($bookingsdel){
            return Redirect::route('bookings.all')->with(['deletebook' => 'booking deleted successfully']);
    }
    }
   

}


