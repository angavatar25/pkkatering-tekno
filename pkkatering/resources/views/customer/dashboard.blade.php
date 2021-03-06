@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Custommer Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('food')}}">Food</a>
                    <a href="{{route('transaction')}}">Transaction</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
