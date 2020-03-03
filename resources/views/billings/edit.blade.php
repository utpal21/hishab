@extends('layouts.admind')
 
@section('content')
   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Billing</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('billings.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('billings.update',$billing->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" name="code" class="form-control" value="{{ $billing->code }}" placeholder="Code" disabled>   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Volum:</strong>
                    <input type="text" name="quantity" class="form-control" value="{{ $billing->quantity }}" placeholder="Quantity">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>D/O Date:</strong>
                <input type="text" name="do_date" class="form-control datepicker" value="{{ $billing->do_date }}" placeholder="yyyy-mm-dd" >                
            </div>
        </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Shipping Date:</strong>
                <input type="text" name="shipment_date" class="form-control datepicker" value="{{ $billing->shipment_date }}" placeholder="yyyy-mm-dd" >                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agent amount:</strong>
                <input type="text" name="agent_amount" class="form-control" placeholder="Agent Amount" value="{{ $billing->agent_amount }}">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer amount:</strong>
                <input type="text" name="customer_amount" class="form-control" placeholder="Customer Amount" value="{{ $billing->customer_amount }}">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agent:</strong>
               <select class="form-control" name="agent_id" id="">
               <option value="">Select Agent</option>
                @foreach ($agents as $key => $value)
                  <option value="{{ $key }}" <?php if($billing->agent_id == $key){ echo "selected"; }?>>{{ $value }}</option>
                @endforeach
               </select>           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer:</strong>
                <select class="form-control" name="customer_id" id="">
               <option value="">Select Customer</option>
                @foreach ($customers as $key => $value)
                  <option value="{{ $key }}" <?php if($billing->customer_id == $key){ echo "selected"; }?>>{{ $value }}</option>
                @endforeach
               </select>                 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">          
             <div class="form-check">
                <input type="checkbox" value="finished" name="finished" class="form-check-input" id="exampleCheck1" {{ ($billing->finished == 1 ? 'checked' : '') }}>
                <label class="form-check-label" for="exampleCheck1">Finished</label>
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">          
                <div class="form-check">
                    <input type="checkbox" value="1" name="active" class="form-check-input" id="exampleCheck1" {{ ($billing->active == 1 ? 'checked' : '') }}>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
      
@endsection