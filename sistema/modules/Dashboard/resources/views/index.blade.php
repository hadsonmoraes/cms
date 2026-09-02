@extends('sistema::layouts.admin', ['title' => 'Dashboard'])

@section('content')
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Usuários cadastrados</div>
                    <div class="fs-2 fw-semibold">{{ \App\Models\User::count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Unidades ativas</div>
                    <div class="fs-2 fw-semibold">{{ \App\Models\Unidade::where('active', true)->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Consentimentos LGPD</div>
                    <div class="fs-2 fw-semibold">{{ \App\Models\LgpdConsent::where('granted', true)->count() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
