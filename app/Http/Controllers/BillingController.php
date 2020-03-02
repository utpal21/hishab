<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Agent;
use App\Customer;
use Illuminate\Http\Request;
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
         $request->validate([
            'code' => 'required|unique:agents',
            'quantity' => 'required',
            'do_date' => 'required',
            'shipment_date' => 'required',
            'agent_amount' => 'required',
            'customer_amount' => 'required',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        //
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
        //
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
