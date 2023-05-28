@extends('layout.main')

@section('content')
<x-breadcrumb :values="[__('Pengajuan Masuk'), __('menu.general.view')]">
</x-breadcrumb>

<x-letter-card :letter="$data">
    <div class="mt-2">
        <div class="divider">
            <div class="divider-text">{{ __('menu.general.view') }}</div>
        </div>
        <dl class="row mt-3">

            <dt class="col-sm-3">{{ __('Tanggal Pengajuan') }}</dt>
            <dd class="col-sm-9">{{ $data->formatted_letter_date }}</dd>

            <dt class="col-sm-3">{{ __('Tanggal Karya Dibuat') }}</dt>
            <dd class="col-sm-9">{{ $data->formatted_received_date }}</dd>

            <dt class="col-sm-3">{{ __('Email') }}</dt>
            <dd class="col-sm-9">{{ $data->email }}</dd>

            <dt class="col-sm-3">{{ __('Nomor WhatsApp') }}</dt>
            <dd class="col-sm-9">{{ $data->nomor_wa }}</dd>

            <dt class="col-sm-3">{{ __('NIK') }}</dt>
            <dd class="col-sm-9">{{ $data->nik }}</dd>

            <dt class="col-sm-3">{{ __('KKT') }}</dt>
            <dd class="col-sm-9">{{ $data->kkt }}</dd>

            <dt class="col-sm-3">{{ __('Nama Ketua') }}</dt>
            <dd class="col-sm-9">{{ $data->nama_ketua }}</dd>

            <dt class="col-sm-3">{{ __('model.classification.code') }}</dt>
            <dd class="col-sm-9">{{ $data->classification_code }}</dd>

            <dt class="col-sm-3">{{ __('model.classification.type') }}</dt>
            <dd class="col-sm-9">{{ $data->classification?->type }}</dd>

            <dt class="col-sm-3">{{ __('model.letter.from') }}</dt>
            <dd class="col-sm-9">{{ $data->from }}</dd>

            <!-- <dt class="col-sm-3">{{ __('model.general.created_by') }}</dt>
            <dd class="col-sm-9">{{ $data->user?->name }}</dd> -->

            <dt class="col-sm-3">{{ __('model.general.created_at') }}</dt>
            <dd class="col-sm-9">{{ $data->formatted_created_at }}</dd>

            <dt class="col-sm-3">{{ __('model.general.updated_at') }}</dt>
            <dd class="col-sm-9">{{ $data->formatted_updated_at }}</dd>
        </dl>
    </div>
</x-letter-card>

@endsection