@extends('layouts.admin')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agents</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('agents.create') }}"> Create New Agent</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($agents as $agent)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $agent->code }}</td>
            <td>{{ $agent->name }}</td>
            <td>{{ $agent->active }}</td>
            <td>
                <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('agents.show',$agent->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('agents.edit',$agent->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $agents->links() !!}
      
@endsection