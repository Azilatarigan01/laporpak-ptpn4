@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Notifications</h3>
    <ul class="list-group">
        @foreach ($notifications as $notification)
            <li class="list-group-item">
                <strong>{{ $notification->judul ?? 'Notification' }}</strong>
                <p>{{ $notification->tgl_pengaduan->toDayDateTimeString() }}</p>
            </li>
        @endforeach
    </ul>

    {{-- <div class="mt-3">
        {{ $notifications->links() }}
    </div> --}}
</div>
@endsection
