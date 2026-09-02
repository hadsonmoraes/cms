@extends('sistema::layouts.admin', ['title' => 'Analytics'])

@section('content')
    <div class="card"><div class="card-body"><h5 class="card-title">Visão geral</h5><div class="row mt-3 g-3"><div class="col-sm-4"><strong>{{ $users }}</strong><br><span class="text-muted">usuários</span></div><div class="col-sm-4"><strong>{{ $units }}</strong><br><span class="text-muted">unidades</span></div><div class="col-sm-4"><strong>{{ $activeUnits }}</strong><br><span class="text-muted">unidades ativas</span></div></div></div></div>
@endsection