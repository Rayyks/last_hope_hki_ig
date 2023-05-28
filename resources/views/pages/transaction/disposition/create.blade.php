@extends('layout.main')

@section('content')
<x-breadcrumb :values="[__('Pengajuan Masuk'), $letter->email, __('Status Pengajuan'), __('Buat Status Pengajuan')]">
</x-breadcrumb>

<div class="alert alert-primary alert-dismissible" role="alert">
    {{ __('model.disposition.notice_me', ['reference_number' => $letter->email]) }} <a href="{{ route('transaction.incoming.show', $letter) }}" class="fw-bold">{{ __('menu.general.view') }}</a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="card mb-4">
    <form action="{{ route('transaction.disposition.store', $letter) }}" method="POST">
        @csrf
        <div class="card-body row">
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="letter_status" class="form-label">{{ __('model.disposition.status') }}</label>
                    <select class="form-select" id="letter_status" name="letter_status">
                        @foreach($statuses as $status)
                        <option value="{{ $status->id }}" @selected(old('letter_status')==$status->id)>{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-8">
                <x-input-form name="note" :label="__('model.disposition.note')" />
            </div>
        </div>
        <div class="card-footer pt-0">
            <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
        </div>
    </form>
</div>
@endsection