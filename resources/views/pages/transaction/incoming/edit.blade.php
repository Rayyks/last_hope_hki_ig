@extends('layout.main')

@section('content')
<x-breadcrumb :values="[__('Pengajuan Masuk'), __('menu.general.edit')]">
</x-breadcrumb>

<div class="card mb-4">
    <form action="{{ route('transaction.incoming.update', $data) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body row">
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="hidden" name="type" value="{{ $data->type }}">
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->email" name="email" :label="__('Email')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->from" name="from" :label="__('model.letter.from')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->nomor_wa" name="nomor_wa" :label="__('Nomor_WA')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->nik" name="nik" :label="__('NIK / NIM')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->kkt" name="kkt" :label="__('KKT')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->nama_ketua" name="nama_ketua" :label="__('Nama Ketua Pengusul')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                <x-input-form :value="date('Y-m-d', strtotime($data->letter_date))" name="letter_date" :label="__('Tanggal Pengajuan')" type="date" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                <x-input-form :value="date('Y-m-d', strtotime($data->received_date))" name="received_date" :label="__('Tanggal Karya Dibuat')" type="date" />
            </div>
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <x-input-textarea-form :value="$data->description" name="description" :label="__('model.letter.description')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="classification_code" class="form-label">{{ __('model.letter.classification_code') }}</label>
                    <select class="form-select" id="classification_code" name="classification_code">
                        @foreach($classifications as $classification)
                        <option @selected(old('classification_code', $data->classification_code) == $classification->code)
                            value="{{ $classification->code }}"
                            >{{ $classification->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <x-input-form :value="$data->note ?? ''" name="note" :label="__('model.letter.note')" />
            </div>
            <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="attachments" class="form-label">{{ __('model.letter.attachment') }}</label>
                    <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                    <span class="error invalid-feedback">{{ $errors->first('attachments') }}</span>
                </div>
                <ul class="list-group">
                    @foreach($data->attachments as $attachment)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ $attachment->path_url }}" target="_blank">{{ $attachment->filename }}</a>
                        <span class="badge bg-danger rounded-pill cursor-pointer btn-remove-attachment" data-id="{{ $attachment->id }}">
                            <i class="bx bx-trash"></i>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- TAMBAH ANGGOTA -->
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
                                <input type="text" name="nama_anggota[]" value="$data->nama_anggota" class="form-control">
                            </td>
                            <td>
                                <input type="email" name="email_anggota[]" value="$data->email_anggota" class="form-control">
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
            <!-- TAMBAH ANGGOTA -->
        </div>
        <div class="card-footer pt-0">
            <button class="btn btn-primary" type="submit">{{ __('menu.general.update') }}</button>
        </div>
    </form>
</div>
<form action="{{ route('attachment.destroy') }}" method="POST" id="form-to-remove-attachment">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="attachment-id-to-remove">
</form>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17"></script>
<script>
    $(document).on('click', '.btn-remove-attachment', function(event) {
        event.preventDefault();
        var attachmentId = $(this).data('id');
        $('#attachment-id-to-remove').val(attachmentId);

        Swal.fire({
            title: '{{ __('
            menu.general.delete_confirm ') }}',
            text: '{{ __('
            menu.general.delete_warning ') }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#696cff',
            confirmButtonText: '{{ __('
            menu.general.delete ') }}',
            cancelButtonText: '{{ __('
            menu.general.cancel ') }}'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-to-remove-attachment').submit();
            }
        });
    });
</script>
@endpush