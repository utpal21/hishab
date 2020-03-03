<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Agent;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billings = Billing::latest()->paginate(5);
  
        return view('billings.index',compact('billings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $agents = DB::table('agents')->pluck("name","id");
        $customers = DB::table('customers')->pluck("name","id");

        return view('billings.create', compact('agents', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:billings',
            'quantity' => 'required|numeric',
            'do_date' => 'required',
            'shipment_date' => 'required',
            'agent_amount' => 'required|numeric',
            'customer_amount' => 'required|numeric',
            'agent_id' => 'required',
            'customer_id' => 'required',
        ]);
       
        $data = $request->all();
        if(empty($data['active'])){
            $data['active'] = 0;
        }     
        if(!empty($data['finished'])){
            $data['finished'] = 1;
        }
        
        if ($validator->fails()) {
            return redirect('billings/create')
                        ->withErrors($validator)
                        ->withInput();
        }
  
        Billing::create($data);   
        return redirect()->route('billings.index')
                        ->with('success','Billing created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        return view('billings.show',compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        $agents = DB::table('agents')->pluck("name","id");
        $customers = DB::table('customers')->pluck("name","id");
        return view('billings.edit',compact('billing', 'agents', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        $request->validate([            
            'quantity' => 'required|numeric',
            'do_date' => 'required',
            'shipment_date' => 'required',
            'agent_amount' => 'required|numeric',
            'customer_amount' => 'required|numeric',
            'agent_id' => 'required',
            'customer_id' => 'required',
        ]);
       
        $data = $request->all();
        if(empty($data['active'])){
            $data['active'] = 0;
        }       
        if(!empty($data['finished'])){            
            $data['finished'] = 1;           
        } else {
            $data['finished'] = 0; 
        } 

        $billing->update($data);   
        return redirect()->route('billings.index')
                        ->with('success','Billing Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
