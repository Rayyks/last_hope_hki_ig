@extends('layout.main')

@section('content')
@if(auth()->user()->role == 'admin')
<x-breadcrumb :values="[__('Pengajuan Masuk'), $letter->email, __('Status Pengajuan')]">
    <a href="{{ route('transaction.disposition.create', $letter) }}" class="btn btn-primary">Buat Status Pengajuan</a>
</x-breadcrumb>

<div class="alert alert-primary alert-dismissible" role="alert">
    {{ __('model.disposition.notice_me', ['reference_number' => $letter->email]) }} <a href="{{ route('transaction.incoming.show', $letter) }}" class="fw-bold">{{ __('menu.general.view') }}</a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@foreach($data as $disposition)
<x-disposition-card :letter="$letter" :disposition="$disposition" />
@endforeach

{!! $data->appends(['search' => $search])->links() !!}
@endif
@if(auth()->user()->role == 'staff')
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ __('model.disposition.notice_me', ['reference_number' => $letter->email]) }} <a href="{{ route('transaction.incoming.show', $letter) }}" class="fw-bold">{{ __('menu.general.view') }}</a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@foreach($data as $disposition)
<x-disposition-card :letter="$letter" :disposition="$disposition" />

@endforeach


{!! $data->appends(['search' => $search])->links() !!}
@endif
@endsection