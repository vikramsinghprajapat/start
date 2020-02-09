<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\VehicleMake;

use App\ServiceRequest;
class ServiceRequestController extends Controller
{
    
    public function getVehicleModel(Request $request)
    {
        if($request->id)
        {
        	$id = $request->id;
        	$response = array();
        	$modelslist = array();
        	$models = VehicleMake::find($id)->models;
        	$htm = '';
            $htm.= '<option value="">Select Make </option>';
               foreach($models as $mak){
                    $htm .='<option value='.$mak->id.'>'.$mak->name.' </option>';
               }
            echo $htm;
    	}
    }	

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'make_id' => 'required',
	        'model_id' => 'required',
	        'name' => 'required',
	        'email' => 'required|unique:service_requests|max:255',
	        'phone' => 'required',
	        'description' => 'required',
	    ]);
		$serviceRequest = new ServiceRequest;
		$serviceRequest->vehicle_make_id = $request->make_id;
		$serviceRequest->vehicle_model_id = $request->model_id;
		$serviceRequest->name = $request->name;
		$serviceRequest->email = $request->email;
		$serviceRequest->phone = $request->phone;
		$serviceRequest->service_description = $request->description;
		$serviceRequest->save();
		return redirect('service-list');
    }

    public function getServiceList(){
        $services = ServiceRequest::all();
        return view('servicerequestlist', compact('services'));
    }
    public function edit($id){
    	$makes = VehicleMake::all();
    	$services = ServiceRequest::find($id);
    	return view('servicerequestedit', compact('makes','services'));
    }
    public function updateRequest(Request $request){
    	$validatedData = $request->validate([
	        'id' => 'required',
	        'make_id' => 'required',
	        'model_id' => 'required',
	        'name' => 'required',
	        'email' => 'require|max:255',
	        'phone' => 'required',
	        'description' => 'required',
	    ]);
	   	$id =  $request->id;
		$serviceRequest = ServiceRequest::find($id);
		$serviceRequest->vehicle_make_id = $request->make_id;
		$serviceRequest->vehicle_model_id = $request->model_id;
		$serviceRequest->name = $request->name;
		$serviceRequest->email = $request->email;
		$serviceRequest->phone = $request->phone;
		$serviceRequest->service_description = $request->description;
		$serviceRequest->save();
		return redirect('service-list');
    }

    public function deleteRequest($id){
    	$data = ServiceRequest::find($id)->delete();
    	return redirect('service-list');
    }
}
