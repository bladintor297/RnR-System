<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if ((Auth()->user()->role == 0))
        return view ('complain-form');

        else {
            if ((Auth()->user()->role == 1))
            $complains = Complain::where('service','hr')->orderBy('created_at')->get();
            
            else if ((Auth()->user()->role == 2))
            $complains = Complain::where('service','it')->orderBy('created_at')->get();

            else
            $complains = Complain::where('service','fs')->orderBy('created_at')->get();

            
            return view ('admin-complain')->with(['complains'=>$complains]);
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth()->user()->role == 0){
            $complains = Complain::where('userID',Auth()->user()->id)->get();
            return view ('complain-list')->with(['complains'=>$complains]);
        }

        return redirect()->route('complain.index');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        // return $data;
        Complain::create([
            'name' => auth()->user()->name,
            'userID' => auth()->user()->id,
            'phone' => $data['phone'],
            'employeeID' => $data['employeeID'],
            'service' => $data['service'],
            'subject' => $data['subject'],
            'report_detail' => $data['report_detail'],
            'request_detail' => $data['request_detail'],
            'appointment_date' => $data['appointment_date'],
        ]);

        $message = "Complain Sent";
        return redirect()->route('complain.create')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain)
    {
        $var = 1;

        return view('complain-view')->with(['var'=>$var, 'complain'=>$complain]);


        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complain $complain)
    {
        
        $complain = Complain::find($complain->id);
        $complain->status = 2;
        $complain->save();
        $message = "Complain Resolved";
        return redirect()->route('complain.create')->with('success', $message);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complain $complain)
    {
        
        if ($request->has('image_proof')){
            $uploadedFile = $request->file('image_proof');
            $filename = $complain->id . '_' . $uploadedFile->getClientOriginalName(); // Custom filename
        
            // Generate the full path to the public folder
            $publicPath = public_path('assets/img/avatar');
        
            // Store the uploaded file with the custom name in the public folder
            $uploadedFile->move($publicPath, $filename);
        
            // Update the 'proofOfResolution' field with the filename
            $complain->proofOfResolution = $filename;
            
        }

        if ($request->has('feedback')){
            $complain->status = 1; 
            $complain->feedback = $request->input('feedback');
        }
        
        $complain->save();
        return redirect()->route('complain.index');


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain)
    {
        //
    }
}
