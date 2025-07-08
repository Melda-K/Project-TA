@foreach ($pelanggarans as $data)
<div class="modal fade" id="openModel_{{ $data->id_pelanggaran }}" tabindex="-1" aria-labelledby="openModalLabel_{{ $data->id_pelanggaran }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id_pelanggaran="openModalLabel_{{ $data->id_pelanggaran }}">DATA PELANGGARAN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="modal-title fs-9 font-bold text-center">POIN PELANGGARAN TATA TERTIB SISWA </h2>
                <h2 class="modal-title fs-9 font-bold text-center">SMK NEGERI 1 BOJONGPICUNG </h2>
                <br>
                <br>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-6 d-flex">
                            <strong class="me-2">NAMA SISWA :</strong>
                            <span>{{ $data->siswa->nama_siswa }}</span>
                        </div>
                        <div class="col-6 d-flex">
                            <strong class="me-2">WALI KELAS :</strong>
                            <span>{{ $data->guru->nama_guru ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-6 d-flex">
                            <strong class="me-2">KELAS :</strong>
                            <p>{{ $data->siswa->kelas }}</p>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                @php
                // Ambil data pelanggaran berdasarkan id_siswa
                $poin = \App\Models\Pelanggaran::where('id_siswa', $data->id_siswa)
                ->orderBy('tanggal')
                ->get();

                // Hitung total poin pelanggaran
                $totalPelanggaran = $poin->sum('jmlh_pelanggaran');

                // Tentukan keterangan otomatis berdasarkan total
                $keteranganOtomatis = '-';
                if ($totalPelanggaran >= 30 && $totalPelanggaran < 70) {
                    $keteranganOtomatis='Pemanggilan Orang Tua / Wali' ;
                    } elseif ($totalPelanggaran>= 70 && $totalPelanggaran <= 100) {
                        $keteranganOtomatis='Dikembalikan kepada Orang Tua' ;
                        }
                        @endphp

                        <div class="container my-4">

                        {{-- Header Tabel --}}
                        <div class="row fw-bold text-uppercase bg-light border py-2 text-center">
                            <div class="col">Tanggal</div>
                            <div class="col">Nomor Poin Pelanggaran</div>
                            <div class="col">Jumlah Poin Pelanggaran</div>
                            <div class="col">Saldo Pelanggaran</div>
                            <div class="col">Keterangan</div>
                        </div>

                        {{-- Isi Tabel --}}
                        @forelse($poin as $index => $item)
                        <div class="row text-center border-bottom py-2">
                            <div class="col">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</div>
                            <div class="col">{{ $item->point_pelanggaran }}</div>
                            <div class="col">{{ $item->jmlh_pelanggaran }}</div>
                            <div class="col">{{ $item->saldo_pelanggaran }}</div>

                            {{-- Tampilkan keterangan hanya di baris terakhir --}}
                            <div class="col">
                                {{ $loop->last ? $keteranganOtomatis : '-' }}
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-muted py-3">Tidak ada data pelanggaran.</div>
                        @endforelse

                        {{-- Total Pelanggaran --}}
                        <div class="row mt-3">
                            <div class="col text-end">
                                <strong>Total Pelanggaran: {{ $totalPelanggaran }}</strong>
                            </div>
                        </div>
            </div>

            <div class="modal-footer">
                <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach