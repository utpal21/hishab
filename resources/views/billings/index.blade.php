@extends('layouts.admin')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Billings</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('billings.create') }}"> Create New Billing</a>
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
            <th>Volum</th>
            <th>D/O Date</th>
            <th>Shipment Date</th>
            <th>Agent Amount</th>
            <th>Customer Amount</th>
            <th>Agent Name</th>
            <th>Customer Name</th>
            <th>Finished</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($billings as $billing)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $billing->code }}</td>
            <td>{{ $billing->quantity }}</td>
            <td>{{ $billing->do_date }}</td>
            <td>{{ $billing->shipment_date }}</td>
            <td>{{ $billing->agent_amount }}</td>
            <td>{{ $billing->customer_amount }}</td>
            <td>{{ $billing->agent->name }}</td>
            <td>{{ $billing->customer->name }}</td>
            <td>{{ $billing->finished }}</td>
            <td>{{ $billing->active }}</td>
            <td>
                <form action="{{ route('billings.destroy',$billing->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('billings.show',$billing->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('billings.edit',$billing->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" disabled>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $billings->links() !!}
      
@endsection