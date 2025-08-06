{{-- filepath: resources/views/home.blade.php --}}
@extends('layouts.main')

@section('isihalaman')
    <div class="container py-4">
        <h2>Data Hinterland Daerah: {{ ucfirst($user->region) }}</h2>

        {{-- Tombol tambah data --}}
        <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahTab">
            Tambah Data Tab Hinterland
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tab</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabs as $tab)
                    <tr>
                        <td>
                            @switch($tab->tab_name)
                                @case('analisa_data')
                                    Analisa Data
                                @break

                                @case('kukm_perindustrian')
                                    Data KUKM dan Perindustrian
                                @break

                                @case('perdagangan')
                                    Data Perdagangan
                                @break

                                @case('pariwisata')
                                    Data Pariwisata
                                @break

                                @case('perikanan_kelautan')
                                    Data Perikanan dan Kelautan
                                @break

                                {{-- @case('galeri')
                                    Galeri
                                @break

                                @case('maps')
                                    Maps
                                @break --}}

                                @default
                                    {{ ucfirst($tab->tab_name) }}
                            @endswitch
                        </td>
                        <td>{!! Str::limit(strip_tags($tab->content), 100) !!}</td>
                        <td>
                            <a href="{{ route('hinterland-tabs.edit', $tab->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('hinterland-tabs.destroy', $tab->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah Data --}}
    <style>
        /* Membesarkan modal */
        .modal-dialog {
            max-width: 900px;
        }
    </style>
    <div class="modal fade" id="modalTambahTab" tabindex="-1" aria-labelledby="modalTambahTabLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('hinterland-tabs.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTabLabel">Tambah Data Tab Hinterland</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <input type="hidden" name="region" value="{{ $user->region }}"> --}}
                        <div class="mb-3">
                            <label class="form-label">Tab</label>
                            <select name="tab_name" class="form-control" required>
                                <option value="analisa_data">Analisa Data</option>
                                <option value="kukm_perindustrian">Data KUKM dan Perindustrian</option>
                                <option value="perdagangan">Data Perdagangan</option>
                                <option value="pariwisata">Data Pariwisata</option>
                                <option value="perikanan_kelautan">Data Perikanan dan Kelautan</option>
                                <option value="galeri">Galeri</option>
                                <option value="maps">Maps</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konten</label>
                            <input id="tab-content" type="hidden" name="content">
                            <trix-editor input="tab-content"></trix-editor>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
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
