@extends('layouts.admin') 
@section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Billing</h2>
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
   
<form action="{{ route('billings.store') }}" method="POST">
    @csrf
  
     <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6" style="padding:0">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Volum:</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Number of container">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>D/O Date:</strong>
                <input type="text" name="do_date" class="form-control" placeholder="yyyy-mm-dd">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Shipping Date:</strong>
                <input type="text" name="shipment_date" class="form-control" placeholder="yyyy-mm-dd">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agent amount:</strong>
                <input type="text" name="agent_amount" class="form-control" placeholder="Agent Amount">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer amount:</strong>
                <input type="text" name="customer_amount" class="form-control" placeholder="Customer Amount">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agent:</strong>
               <select class="form-control" name="" id="">
               <option value="">Select Agent</option>
                @foreach ($agents as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
               </select>           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer:</strong>
                <select class="form-control" name="" id="">
               <option value="">Select Customer</option>
                @foreach ($customers as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
               </select>                 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">          
             <div class="form-check">
                <input type="checkbox" value="0" name="finished" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Finished</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">          
             <div class="form-check">
                <input type="checkbox" value="1" name="active" checked class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Active</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </div>
   
</form>
      
@endsection