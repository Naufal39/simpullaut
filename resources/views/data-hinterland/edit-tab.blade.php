@extends('layouts/main')
@section('isihalaman')
    <div class="container py-4">
        <h4>Edit Data Tab Hinterland</h4>
        <form method="POST" action="{{ route('hinterland-tab.update', $tab->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="region" value="{{ $tab->region }}">
            <input type="hidden" name="tab_name" value="{{ $tab->tab_name }}">
            <div class="mb-3">
                <label class="form-label">Konten</label>
                <input id="x" type="hidden" name="content" value="{{ $tab->content }}">
                <trix-editor input="x"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endpush
@push('scripts')
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.js"></script>
@endpush
