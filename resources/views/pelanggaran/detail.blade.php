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
                $poin = App\Models\Pelanggaran::where('id_siswa', $data->id_siswa)->orderBy('id_siswa')->get();
                @endphp

                <div class="container">
                    <div class="row fw-bold text-uppercase mb-2">
                        <div class="col text-center">Tanggal</div>
                        <div class="col text-center">Nomor Poin Pelanggaran</div>
                        <div class="col text-center">Jumlah Poin Pelanggaran</div>
                        <div class="col text-center">Saldo Pelanggaran</div>
                        <div class="col text-center">Keterangan</div>
                    </div>

                    @foreach($poin as $item)
                    <div class="row text-center">
                        <div class="col">{{ $item->tanggal }}</div>
                        <div class="col">{{ $item->point_pelanggaran }}</div>
                        <div class="col">{{ $item->jmlh_pelanggaran }}</div>
                        <div class="col">{{ $item->saldo_pelanggaran }}</div>
                        <div class="col">{{ $item->keterangan ?? '-' }}</div>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach