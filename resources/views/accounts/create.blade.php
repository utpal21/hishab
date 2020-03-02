@extends('layouts.admin')
 
@section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Account</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('accounts.index') }}"> Back</a>
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
   
<form action="{{ route('accounts.store') }}" method="POST">
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
                <strong>name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">                
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