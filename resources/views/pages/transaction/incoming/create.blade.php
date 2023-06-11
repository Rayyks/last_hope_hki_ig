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
                    <label for="attachments" class="form-label">{{ __('[Semua Dokumen]') }}</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                </div>
            </div>

            <!-- TAMBAH ANGGOTA -->

            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <h4>{{ __('Anggota') }}</h4>
                <table id="anggota-table">
                    <thead>
                        <tr>
                            <th>{{ __('Nama') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Action') }}</th>
                            <!-- Add more table headers if needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Render existing anggota rows if any -->
                        <tr>
                            <td>
                                <input type="text" name="nama_anggota[]" class="form-control">
                            </td>
                            <td>
                                <input type="email" name="email_anggota[]" class="form-control">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-delete-row">{{ __('Delete') }}</button>
                            </td>
                            <!-- Add more table cells if needed -->
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary mt-2" id="add-anggota-row">{{ __('Add Anggota') }}</button>
            </div>


            <!-- Include jQuery library -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                // Function to handle deletion of anggota row
                function deleteAnggotaRow(button) {
                    var row = button.closest('tr');
                    row.remove();
                }

                // Add event listener for delete button
                $(document).on('click', '.btn-delete-row', function() {
                    deleteAnggotaRow($(this));
                });

                document.getElementById('add-anggota-row').addEventListener('click', function() {
                    var tableBody = document.querySelector('#anggota-table tbody');
                    var newIndex = tableBody.getElementsByTagName('tr').length;

                    var newRow = document.createElement('tr');
                    var newNamaCell = document.createElement('td');
                    var newEmailCell = document.createElement('td');
                    var newActionCell = document.createElement('td');

                    var newNamaInput = document.createElement('input');
                    newNamaInput.type = 'text';
                    newNamaInput.name = 'nama_anggota[]';
                    newNamaInput.className = 'form-control';

                    var newEmailInput = document.createElement('input');
                    newEmailInput.type = 'email';
                    newEmailInput.name = 'email_anggota[]';
                    newEmailInput.className = 'form-control';

                    var deleteButton = document.createElement('button');
                    deleteButton.type = 'button';
                    deleteButton.className = 'btn btn-danger btn-delete-row';
                    deleteButton.innerHTML = 'Delete';

                    deleteButton.addEventListener('click', function() {
                        deleteAnggotaRow(this);
                    });

                    newNamaCell.appendChild(newNamaInput);
                    newEmailCell.appendChild(newEmailInput);
                    newActionCell.appendChild(deleteButton);

                    newRow.appendChild(newNamaCell);
                    newRow.appendChild(newEmailCell);
                    newRow.appendChild(newActionCell);

                    tableBody.appendChild(newRow);
                });
            </script>

            <!-- TAMBAH ANGGOTA -->
        </div>


        <div class="card-footer pt-0">
            <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
        </div>
    </form>
</div>
@endsection