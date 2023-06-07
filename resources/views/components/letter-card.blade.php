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
                    @php
                    $statuses = [
                    (object) ['id' => 1, 'status' => 'Di Terima'],
                    (object) ['id' => 2, 'status' => 'Di Tolak'],
                    (object) ['id' => 3, 'status' => 'Pending'],
                    (object) ['id' => 4, 'status' => 'Belum Lengkap'],
                    ];
                    @endphp
                    @if(!$letter->disposition)
                    <div class="">
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
                        <a class="dropdown-item" href="{{ route('transaction.incoming.show', $letter) }}">{{ __('menu.general.view') }}</a>
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
        {{ $slot }}
    </div>
</div>
@endif

@if(auth()->user()->role == 'staff' && auth()->user()->email == $letter->email)
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
                    <a href="{{ route('transaction.disposition.index', $letter) }}" class="btn btn-primary btn">Lihat Status</a>
                </div>
                @endif
                <div class="dropdown d-inline-block">
                    <button class="btn p-0" type="button" id="dropdown-{{ $letter->type }}-{{ $letter->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    @if($letter->type == 'incoming')
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-{{ $letter->type }}-{{ $letter->id }}">
                        @if(!\Illuminate\Support\Facades\Route::is('*.show'))
                        <a class="dropdown-item" href="{{ route('transaction.incoming.show', $letter) }}">{{ __('menu.general.view') }}</a>
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
        {{ $slot }}
    </div>
</div>
@endif