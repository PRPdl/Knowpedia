@extends('layout')

@section('content')
    <div class="card border-warning w-75 ml-auto mr-auto">
        <div class="card-header">Recent Notifications</div>
        @if(count($notification) > 0)
        @foreach($notification as $notification)
        <div class="card-body">
            <h5 class="card-title text-primary">Payment</h5>
            <p class="card-text text-success">{{ $notification->data[0] }}</p>
            <hr>
        </div>
        @endforeach
        @else
            <div class="card-body">
                <h5 class="card-title text-info">No New Notifications</h5>
                <hr>
            </div>
        @endif
    </div>
@endsection
