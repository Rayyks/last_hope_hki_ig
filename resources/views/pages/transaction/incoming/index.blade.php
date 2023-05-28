@extends('layout.main')

@section('content')
@if(auth()->user()->role == 'admin')
<x-breadcrumb :values="[__('Pengajuan Masuk')]">

</x-breadcrumb>
@endif

@if(auth()->user()->role == 'staff')
<x-breadcrumb :values="[_('Pengajuan Masuk')]">
    <a href="{{ route('transaction.incoming.create') }}" class="btn btn-primary">Ajukan Hak Cipta</a>
</x-breadcrumb>
@endif

@foreach($data as $letter)
<x-letter-card :letter="$letter" />
@endforeach

{!! $data->appends(['search' => $search])->links() !!}
@endsection