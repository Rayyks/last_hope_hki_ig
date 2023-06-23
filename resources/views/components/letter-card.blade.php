@php
$statuses = [
(object) ['id' => 1, 'status' => 'Di Terima'],
(object) ['id' => 2, 'status' => 'Di Tolak'],
(object) ['id' => 3, 'status' => 'Pending'],
(object) ['id' => 4, 'status' => 'Belum Lengkap'],
];
@endphp

@if(auth()->user()->role == 'admin')
<div class="card mb-4">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <div class="card-title">
                <h5 class="text-nowrap mb-0 fw-bold">{{ $letter->email }}</h5>
                <small class="text-black">
                    {{ $letter->type == 'incoming' ? $letter->from : $letter->to }} |
                    <span class="text-secondary">{{ __('Nomor Wa') }}:</span> {{ $letter->nomor_wa }}
                    |
                    {{ $letter->classification?->type }}
                </small>
            </div>
            <div class="card-title d-flex flex-row">
                <div class="d-inline-block mx-2 text-end text-black">
                    <small class="d-block text-secondary">{{ __('model.letter.letter_date') }}</small>
                    {{ $letter->formatted_letter_date }}
                </div>
                @if($letter->type == 'incoming')
                <div class="mx-3">

                    <!-- BUAT STATUS -->
                    <div class="mx-3">
                        @if($letter->status == 'Di Terima')
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Di Terima</h4>
                            <hr>
                            <p class="mb-0">{{ $letter->info ?? '' }}</p>
                        </div>
                        @endif
                        @if($letter->status == 'Di Tolak')
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Di Tolak</h4>
                            <hr>
                            <p class="mb-0">{{ $letter->info ?? '' }}</p>
                        </div>
                        @endif
                        @if($letter->status == 'Pending')
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Di Pending</h4>
                            <hr>
                            <p class="mb-0">{{ $letter->info ?? '' }}</p>
                        </div>
                        @endif
                        @if($letter->status == 'Belum Lengkap')
                        <div class="alert alert-dark" role="alert">
                            <h4 class="alert-heading">Belum Lengkap</h4>
                            <hr>
                            <p class="mb-0">{{ $letter->info ?? '' }}</p>
                        </div>
                        @endif

                        <form action="{{ route('update_status') }}" method="post">
                            @csrf
                            <input type="hidden" name="letter_id" value="{{ $letter->id }}">
                            <select name="status" class="form-select">
                                <option value="" class="text-center">==== Pilih Status ====</option>
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ $status->id == $letter->status ? 'selected' : '' }}>
                                    {{ $status->status }}
                                </option>
                                @endforeach
                            </select>
                            <input type="text" name="info" placeholder="Keterangan Status" class="form-control mt-2" required>
                            <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                        </form>
                    </div>



                    <!-- BUAT STATUS-->







                </div>
                @endif

                <div class="dropdown d-inline-block">
                    <button class="btn p-0" type="button" id="dropdown-{{ $letter->type }}-{{ $letter->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    @if($letter->type == 'incoming')
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-{{ $letter->type }}-{{ $letter->id }}">
                        @if(!\Illuminate\Support\Facades\Route::is('*.show'))

                        @endif
                        <form action="{{ route('transaction.incoming.destroy', $letter) }}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <span class="dropdown-item cursor-pointer btn-delete">Delete</span>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <hr>
        <p>{{ $letter->description }}</p>
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <small class="text-secondary">{{ $letter->note }}</small>
            @if(count($letter->attachments))
            <div>
                @foreach($letter->attachments as $attachment)
                <a href="{{ $attachment->path_url }}" target="_blank">
                    @if($attachment->extension == 'pdf')
                    <i class="bx bxs-file-pdf display-6 cursor-pointer text-primary"></i>
                    @elseif(in_array($attachment->extension, ['jpg', 'jpeg']))
                    <i class="bx bxs-file-jpg display-6 cursor-pointer text-primary"></i>
                    @elseif($attachment->extension == 'png')
                    <i class="bx bxs-file-png display-6 cursor-pointer text-primary"></i>
                    @endif
                </a>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ $attachment->path_url }}" target="_blank">{{ $attachment->filename }}</a>
                </li>
                @endforeach
            </div>
            @endif
        </div>
        <div class="mt-2">
            <div class="divider">
                <div class="divider-text">{{ __('menu.general.view') }}</div>
            </div>
            <dl class="row mt-3">

                <dt class="col-sm-3">{{ __('Tanggal Pengajuan') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_letter_date }}</dd>

                <dt class="col-sm-3">{{ __('Tanggal Karya Dibuat') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_received_date }}</dd>

                <dt class="col-sm-3">{{ __('Email') }}</dt>
                <dd class="col-sm-9">{{ $letter->email }}</dd>

                <dt class="col-sm-3">{{ __('Nomor WhatsApp') }}</dt>
                <dd class="col-sm-9">{{ $letter->nomor_wa }}</dd>

                <dt class="col-sm-3">{{ __('NIk / NIM') }}</dt>
                <dd class="col-sm-9">{{ $letter->nik }}</dd>

                <dt class="col-sm-3">{{ __('KKT') }}</dt>
                <dd class="col-sm-9">{{ $letter->kkt }}</dd>

                <dt class="col-sm-3">{{ __('Nama Ketua') }}</dt>
                <dd class="col-sm-9">{{ $letter->nama_ketua }}</dd>

                <dt class="col-sm-3">{{ __('Nama Anggota') }}</dt>
                <dd class="col-sm-9">
                    @if ($letter->nama_anggota)
                    {{ $letter->nama_anggota }}
                    @else
                    Belum di isi / Tidak ada
                    @endif
                </dd>

                <dt class="col-sm-3">{{ __('Email Anggota') }}</dt>
                <dd class="col-sm-9">
                    @if ($letter->email_anggota)
                    {{ $letter->email_anggota }}
                    @else
                    Belum di isi / Tidak ada
                    @endif
                </dd>

                <dt class="col-sm-3">{{ __('model.classification.code') }}</dt>
                <dd class="col-sm-9">{{ $letter->classification_code }}</dd>

                <dt class="col-sm-3">{{ __('model.classification.type') }}</dt>
                <dd class="col-sm-9">{{ $letter->classification?->type }}</dd>

                <dt class="col-sm-3">{{ __('model.letter.from') }}</dt>
                <dd class="col-sm-9">{{ $letter->from }}</dd>

                <dt class="col-sm-3">{{ __('model.general.created_at') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_created_at }}</dd>

                <dt class="col-sm-3">{{ __('model.general.updated_at') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_updated_at }}</dd>
            </dl>
        </div>
        {{ $slot }}
    </div>
</div>
@endif

@if(auth()->user()->role == 'staff' && auth()->user()->id == $letter->user_id)

<div class="card mb-4">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <div class="card-title">
                <h5 class="text-nowrap mb-0 fw-bold">{{ $letter->email }}</h5>
                <small class="text-black">
                    {{ $letter->type == 'incoming' ? $letter->from : $letter->to }} |
                    <span class="text-secondary">{{ __('Nomor Wa') }}:</span> {{ $letter->nomor_wa }}
                    |
                    {{ $letter->classification?->type }}
                </small>
            </div>
            <div class="card-title d-flex flex-row">
                <div class="d-inline-block mx-2 text-end text-black">
                    <small class="d-block text-secondary">{{ __('model.letter.letter_date') }}</small>
                    {{ $letter->formatted_letter_date }}
                </div>
                @if($letter->type == 'incoming')
                <div class="mx-3">
                    @if($letter->status == 'Di Terima')
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Di Terima</h4>
                        <hr>
                        <p class="mb-0">{{ $letter->info ?? '' }}</p>
                    </div>
                    @endif
                    @if($letter->status == 'Di Tolak')
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Di Tolak</h4>
                        <hr>
                        <p class="mb-0">{{ $letter->info ?? '' }}</p>
                    </div>
                    @endif
                    @if($letter->status == 'Pending')
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Di Pending</h4>
                        <hr>
                        <p class="mb-0">{{ $letter->info ?? '' }}</p>
                    </div>
                    @endif
                    @if($letter->status == 'Belum Lengkap')
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Belum Lengkap</h4>
                        <hr>
                        <p class="mb-0">{{ $letter->info ?? '' }}</p>
                    </div>
                    @endif
                </div>
                @endif
                <div class="dropdown d-inline-block">
                    <button class="btn p-0" type="button" id="dropdown-{{ $letter->type }}-{{ $letter->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    @if($letter->type == 'incoming')
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-{{ $letter->type }}-{{ $letter->id }}">
                        @if(!\Illuminate\Support\Facades\Route::is('*.show'))

                        <a class="dropdown-item" href="{{ route('transaction.incoming.edit', $letter) }}">{{ __('menu.general.edit') }}</a>
                        @endif

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <hr>
        <h3>{{ $letter->description }}</h3>
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <p class="text-secondary">{{ $letter->note }}</p>
            @if(count($letter->attachments))
            <div>
                @foreach($letter->attachments as $attachment)
                <a href="{{ $attachment->path_url }}" target="_blank">
                    @if($attachment->extension == 'pdf')
                    <i class="bx bxs-file-pdf display-6 cursor-pointer text-primary"></i>
                    @elseif(in_array($attachment->extension, ['jpg', 'jpeg']))
                    <i class="bx bxs-file-jpg display-6 cursor-pointer text-primary"></i>
                    @elseif($attachment->extension == 'png')
                    <i class="bx bxs-file-png display-6 cursor-pointer text-primary"></i>
                    @endif
                </a>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ $attachment->path_url }}" target="_blank">{{ $attachment->filename }}</a>
                </li>
                @endforeach
            </div>
            @endif
        </div>
        <div class="mt-2">
            <div class="divider">
                <div class="divider-text">{{ __('menu.general.view') }}</div>
            </div>
            <dl class="row mt-3">

                <dt class="col-sm-3">{{ __('Tanggal Pengajuan') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_letter_date }}</dd>

                <dt class="col-sm-3">{{ __('Tanggal Karya Dibuat') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_received_date }}</dd>

                <dt class="col-sm-3">{{ __('Email') }}</dt>
                <dd class="col-sm-9">{{ $letter->email }}</dd>

                <dt class="col-sm-3">{{ __('Nomor WhatsApp') }}</dt>
                <dd class="col-sm-9">{{ $letter->nomor_wa }}</dd>

                <dt class="col-sm-3">{{ __('NIK / NIM') }}</dt>
                <dd class="col-sm-9">{{ $letter->nik }}</dd>

                <dt class="col-sm-3">{{ __('KKT') }}</dt>
                <dd class="col-sm-9">{{ $letter->kkt }}</dd>

                <dt class="col-sm-3">{{ __('Nama Ketua') }}</dt>
                <dd class="col-sm-9">{{ $letter->nama_ketua }}</dd>

                <dt class="col-sm-3">{{ __('Nama Anggota') }}</dt>
                <dd class="col-sm-9">
                    @if ($letter->nama_anggota)
                    {{ $letter->nama_anggota }}
                    @else
                    Belum di isi / Tidak ada
                    @endif
                </dd>

                <dt class="col-sm-3">{{ __('Email Anggota') }}</dt>
                <dd class="col-sm-9">
                    @if ($letter->email_anggota)
                    {{ $letter->email_anggota }}
                    @else
                    Belum di isi / Tidak ada
                    @endif
                </dd>


                <dt class="col-sm-3">{{ __('model.classification.code') }}</dt>
                <dd class="col-sm-9">{{ $letter->classification_code }}</dd>

                <dt class="col-sm-3">{{ __('model.classification.type') }}</dt>
                <dd class="col-sm-9">{{ $letter->classification?->type }}</dd>

                <dt class="col-sm-3">{{ __('model.letter.from') }}</dt>
                <dd class="col-sm-9">{{ $letter->from }}</dd>

                <dt class="col-sm-3">{{ __('model.general.created_at') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_created_at }}</dd>

                <dt class="col-sm-3">{{ __('model.general.updated_at') }}</dt>
                <dd class="col-sm-9">{{ $letter->formatted_updated_at }}</dd>
            </dl>
        </div>
        {{ $slot }}
    </div>
</div>
@endif