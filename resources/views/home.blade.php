@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <strong>Total Ordenes Finalizadas: </strong> {{ $completed_orders[0]->total_completed_orders }} <br>
                    <strong>Total Ordenes Pendientes: </strong> {{ $pending_orders[0]->total_pending_orders }} <br>
                    <strong>Total Ordenes Canceladas: </strong> {{ $cancelled_orders[0]->total_cancelled_orders }}

                    @foreach ($users as $user)
                    <li>Usuario: {{ $user->name }} Email: {{ $user->email }}</li>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
