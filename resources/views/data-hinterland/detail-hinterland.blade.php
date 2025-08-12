@extends('layouts/main')

@section('isihalaman')
    <style>
        .hinterland-header {
            background: linear-gradient(90deg, #0099cc 0%, #00c6a7 100%);
            color: #fff;
            border-radius: 1rem 1rem 0 0;
            padding: 2rem 1rem 1rem 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .hinterland-card {
            border-radius: 1rem;
            overflow: hidden;
            border: none;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #0099cc;
            color: #fff;
            font-weight: 600;
        }

        .nav-pills .nav-link {
            color: #0099cc;
            border-radius: 50px;
            margin-right: 0.5rem;
        }

        .tab-content {
            background: #f8f9fa;
            border-radius: 0 0 1rem 1rem;
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            min-height: 250px;
        }

        .hinterland-logo {
            display: block;
            margin: 0 auto 1rem auto;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .hinterland-badge {
            background: #00c6a7;
            color: #fff;
            font-size: 1rem;
            border-radius: 0.5rem;
            padding: 0.3rem 0.8rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .hinterland-container-wide {
            max-width: 100%;
        }

        .trix-editor {
            text-align: justify;
            font-family: poppins, sans-serif;
            font-size: 1rem;
        }

        .trix-editor img {
            max-width: 90%;
            /* gambar max 80% dari container */
            height: auto;
            display: block;
            /* agar bisa diberi margin auto */
            margin: 1.5rem auto;
        }

        .trix-editor img~* {
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
    <main class="main">
        <section class="section py-5">
            <div class="container hinterland-container-wide">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="card hinterland-card">
                            <div class="hinterland-header text-center">
                                <span class="hinterland-badge">Detail Hinterland</span>
                                <h2 class="card-title mb-2" style="font-weight:700; letter-spacing:1px;">
                                    @if ($id == 'pangandaran')
                                        Kabupaten Pangandaran
                                    @elseif($id == 'banjar')
                                        Kota Banjar
                                    @elseif($id == 'ciamis')
                                        Kabupaten Ciamis
                                    @elseif($id == 'tasikmalaya')
                                        Kabupaten Tasikmalaya
                                    @elseif($id == 'cianjur')
                                        Kabupaten Cianjur
                                    @elseif($id == 'garut')
                                        Kabupaten Garut
                                    @elseif($id == 'kota-tasikmalaya')
                                        Kota Tasikmalaya
                                    @elseif($id == 'kabupaten-sukabumi')
                                        Kabupaten Sukabumi
                                    @else
                                        {{ ucfirst($id) }}
                                    @endif
                                </h2>
                            </div>
                            <div class="card-body p-0">
                                <!-- Nav tabs data hinterland saja -->
                                <ul class="nav nav-pills justify-content-center mb-3 pt-3" id="hinterlandDataTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="analisa-data-tab" data-bs-toggle="pill"
                                            data-bs-target="#analisa-data" type="button" role="tab">Analisa
                                            Data</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="kukm-perindustrian-tab" data-bs-toggle="pill"
                                            data-bs-target="#kukm-perindustrian" type="button" role="tab">Data KUKM dan
                                            Perindustrian</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="perdagangan-tab" data-bs-toggle="pill"
                                            data-bs-target="#perdagangan" type="button" role="tab">Data
                                            Perdagangan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pariwisata-tab" data-bs-toggle="pill"
                                            data-bs-target="#pariwisata" type="button" role="tab">Data
                                            Pariwisata</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="perikanan-kelautan-tab" data-bs-toggle="pill"
                                            data-bs-target="#perikanan-kelautan" type="button" role="tab">Data
                                            Perikanan dan Kelautan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="maps-tab" data-bs-toggle="pill" data-bs-target="#maps"
                                            type="button" role="tab">Maps</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="galeri-tab" data-bs-toggle="pill"
                                            data-bs-target="#galeri" type="button" role="tab">Galeri</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="hinterlandDataTabContent">
                                    {{-- Analisa Data --}}
                                    <div class="tab-pane fade show active" id="analisa-data" role="tabpanel">
                                        @php
                                            use App\Models\HinterlandTab;
                                            $user = Auth::user();
                                            $tabAnalisa = HinterlandTab::where('region', $id)
                                                ->where('tab_name', 'analisa_data')
                                                ->first();
                                        @endphp
                                        <h5 class="fw-bold text-primary">Analisa Data</h5>
                                        @if ($tabAnalisa)
                                            <div class="trix-editor">{!! $tabAnalisa->content !!}</div>
                                            @if (($user && $user->region == $id && $user->id == $tabAnalisa->user_id) || $user->region == 'root')
                                                <a href="{{ route('hinterland-tab.edit', $tabAnalisa->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Edit</a>
                                            @endif
                                        @elseif($user && $user->region == $id)
                                            <form method="POST" action="{{ route('hinterland-tab.store') }}">
                                                @csrf
                                                <input type="hidden" name="region" value="{{ $id }}">
                                                <input type="hidden" name="tab_name" value="analisa_data">
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Analisa Data</label>
                                                    <input id="analisa-data-content" type="hidden" name="content">
                                                    <trix-editor input="analisa-data-content"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                    {{-- Data KUKM dan Perindustrian --}}
                                    <div class="tab-pane fade" id="kukm-perindustrian" role="tabpanel">
                                        @php
                                            $tabKukm = HinterlandTab::where('region', $id)
                                                ->where('tab_name', 'kukm_perindustrian')
                                                ->first();
                                        @endphp
                                        <h5 class="fw-bold text-primary">Data KUKM dan Perindustrian</h5>
                                        @if ($tabKukm)
                                            <div class="trix-editor">{!! $tabKukm->content !!}</div>
                                            @if (($user && $user->region == $id && $user->id == $tabKukm->user_id) || $user->region == 'root')
                                                <a href="{{ route('hinterland-tab.edit', $tabKukm->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Edit</a>
                                            @endif
                                        @elseif($user && $user->region == $id)
                                            <form method="POST" action="{{ route('hinterland-tab.store') }}">
                                                @csrf
                                                <input type="hidden" name="region" value="{{ $id }}">
                                                <input type="hidden" name="tab_name" value="kukm_perindustrian">
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Data KUKM dan Perindustrian</label>
                                                    <input id="kukm-perindustrian-content" type="hidden" name="content">
                                                    <trix-editor input="kukm-perindustrian-content"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                    {{-- Data Perdagangan --}}
                                    <div class="tab-pane fade" id="perdagangan" role="tabpanel">
                                        @php
                                            $tabPerdagangan = HinterlandTab::where('region', $id)
                                                ->where('tab_name', 'perdagangan')
                                                ->first();
                                        @endphp
                                        <h5 class="fw-bold text-primary">Data Perdagangan</h5>
                                        @if ($tabPerdagangan)
                                            <div class="trix-editor">{!! $tabPerdagangan->content !!}</div>
                                            @if (($user && $user->region == $id && $user->id == $tabPerdagangan->user_id) || $user->region == 'root')
                                                <a href="{{ route('hinterland-tab.edit', $tabPerdagangan->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Edit</a>
                                            @endif
                                        @elseif($user && $user->region == $id)
                                            <form method="POST" action="{{ route('hinterland-tab.store') }}">
                                                @csrf
                                                <input type="hidden" name="region" value="{{ $id }}">
                                                <input type="hidden" name="tab_name" value="perdagangan">
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Data Perdagangan</label>
                                                    <input id="perdagangan-content" type="hidden" name="content">
                                                    <trix-editor input="perdagangan-content"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                    {{-- Data Pariwisata --}}
                                    <div class="tab-pane fade" id="pariwisata" role="tabpanel">
                                        @php
                                            $tabPariwisata = HinterlandTab::where('region', $id)
                                                ->where('tab_name', 'pariwisata')
                                                ->first();
                                        @endphp
                                        <h5 class="fw-bold text-primary">Data Pariwisata</h5>
                                        @if ($tabPariwisata)
                                            <div class="trix-editor">{!! $tabPariwisata->content !!}</div>
                                            @if (($user && $user->region == $id && $user->id == $tabPariwisata->user_id) || $user->region == 'root')
                                                <a href="{{ route('hinterland-tab.edit', $tabPariwisata->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Edit</a>
                                            @endif
                                        @elseif($user && $user->region == $id)
                                            <form method="POST" action="{{ route('hinterland-tab.store') }}">
                                                @csrf
                                                <input type="hidden" name="region" value="{{ $id }}">
                                                <input type="hidden" name="tab_name" value="pariwisata">
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Data Pariwisata</label>
                                                    <input id="pariwisata-content" type="hidden" name="content">
                                                    <trix-editor input="pariwisata-content"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                    {{-- Data Perikanan dan Kelautan --}}
                                    <div class="tab-pane fade" id="perikanan-kelautan" role="tabpanel">
                                        @php
                                            $tabPerikanan = HinterlandTab::where('region', $id)
                                                ->where('tab_name', 'perikanan_kelautan')
                                                ->first();
                                        @endphp
                                        <h5 class="fw-bold text-primary">Data Perikanan dan Kelautan</h5>
                                        @if ($tabPerikanan)
                                            <div class="trix-editor">{!! $tabPerikanan->content !!}</div>
                                            @if (($user && $user->region == $id && $user->id == $tabPerikanan->user_id) || $user->region == 'root')
                                                <a href="{{ route('hinterland-tab.edit', $tabPerikanan->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Edit</a>
                                            @endif
                                        @elseif($user && $user->region == $id)
                                            <form method="POST" action="{{ route('hinterland-tab.store') }}">
                                                @csrf
                                                <input type="hidden" name="region" value="{{ $id }}">
                                                <input type="hidden" name="tab_name" value="perikanan_kelautan">
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Data Perikanan dan Kelautan</label>
                                                    <input id="perikanan-kelautan-content" type="hidden" name="content">
                                                    <trix-editor input="perikanan-kelautan-content"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                    {{-- Maps --}}
                                    <div class="tab-pane fade" id="maps" role="tabpanel">
                                        <h5 class="fw-bold text-primary">Maps</h5>
                                        <div class="mb-3">
                                            <span class="text-muted">Peta interaktif hinterland dan ruas jalan
                                                provinsi.</span>
                                        </div>
                                        <div id="leaflet-map" style="height:400px; border-radius:1rem; overflow:hidden;">
                                        </div>
                                        <script>
                                            let leafletMapInstance = null;

                                            function renderLeafletMap() {
                                                if (leafletMapInstance) return;
                                                var map = L.map('leaflet-map').setView([-7.700, 108.495], 10);
                                                leafletMapInstance = map;
                                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                    maxZoom: 18,
                                                    attribution: '© OpenStreetMap'
                                                }).addTo(map);
                                                var hinterlandLocations = {
                                                    pangandaran: [-7.700, 108.495],
                                                    banjar: [-7.370, 108.541],
                                                    ciamis: [-7.325, 108.353],
                                                    tasikmalaya: [-7.350, 108.220],
                                                    cianjur: [-6.822, 107.142],
                                                    garut: [-7.210, 107.770]
                                                };
                                                var id = "{{ $id }}";
                                                if (hinterlandLocations[id]) {
                                                    map.setView(hinterlandLocations[id], 11);
                                                }
                                            }
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var mapsTab = document.getElementById('maps-tab');
                                                if (mapsTab) {
                                                    mapsTab.addEventListener('shown.bs.tab', function() {
                                                        setTimeout(renderLeafletMap, 200);
                                                    });
                                                }
                                                if (mapsTab && mapsTab.classList.contains('active')) {
                                                    setTimeout(renderLeafletMap, 200);
                                                }
                                            });
                                        </script>
                                    </div>
                                    {{-- Galeri --}}
                                    <div class="tab-pane fade" id="galeri" role="tabpanel">
                                        @php
                                            $tabGaleri = HinterlandTab::where('region', $id)
                                                ->where('tab_name', 'galeri')
                                                ->first();
                                        @endphp
                                        <h5 class="fw-bold text-primary">Galeri</h5>
                                        @if ($tabGaleri)
                                            <div>{!! $tabGaleri->content !!}</div>
                                            @if ($user && $user->region == $id && $user->id == $tabGaleri->user_id)
                                                <a href="{{ route('hinterland-tab.edit', $tabGaleri->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Edit</a>
                                            @endif
                                        @elseif($user && $user->region == $id)
                                            <form method="POST" action="{{ route('hinterland-tab.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="region" value="{{ $id }}">
                                                <input type="hidden" name="tab_name" value="galeri">
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Galeri</label>
                                                    <input id="galeri-content" type="hidden" name="content">
                                                    <trix-editor input="galeri-content"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('hinterland') }}" class="btn btn-secondary mt-4">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endpush
@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.js"></script>
@endpush
