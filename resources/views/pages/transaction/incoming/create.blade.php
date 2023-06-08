@extends('layout.main')

@section('content')
<x-breadcrumb :values="[__('Pengajuan Masuk'), __('Buat Pengajuan')]">
</x-breadcrumb>

<div class="card mb-4">
    <form action="{{ route('transaction.incoming.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body row">
            <input type="hidden" name="type" value="incoming">
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="email" :label="__('Email')" :value="auth()->user()->email" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="from" :label="__('model.letter.from')" :value="auth()->user()->name" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="nomor_wa" :label="__('nomor_wa')" :value="auth()->user()->phone" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="nik" :label="__('NIK/NIM')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="kkt" :label="__('KKT')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="nama_ketua" :label="__('Nama Ketua Pengusul')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                <x-input-form name="letter_date" :label="__('Tanggal Pengajuan')" type="date" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                <x-input-form name="received_date" :label="__('tanggal karya dibuat')" type="date" />
            </div>
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <x-input-textarea-form name="description" :label="__('Judul Pengajuan')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="classification_code" class="form-label">{{ __('model.letter.classification_code') }}</label>
                    <select class="form-select" id="classification_code" name="classification_code">
                        @foreach($classifications as $classification)
                        <option value="{{ $classification->code }}" @selected(old('classification_code')==$classification->code)>
                            {{ $classification->type }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form name="note" :label="__('model.letter.note')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="attachments" class="form-label">{{ __('Lampiran Form Pendaftaran') }}</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                </div>
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="attachments" class="form-label">{{ __('Pernyataan Hak Cipta') }}</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                </div>
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="attachments" class="form-label">{{ __('Surat Pengalihan') }}</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                </div>
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="attachments" class="form-label">{{ __('Lampiran Karya') }}</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                </div>
            </div>
        </div>
        <div class="card-footer pt-0">
            <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
        </div>
    </form>
</div>
@endsection