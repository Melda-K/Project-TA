<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                    @csrf

                    <p class="fw-bold mb-3">KELOLA DATA PENGADUAN SISWA</p>

                    <div class="row g-3 mb-3">
                        <div class="col">
                            <x-input-label for="nama" value="NAMA" />
                            <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full" value="{{ old('nama')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="col">
                            <x-input-label for="tanggal_pengaduan" value="TANGGAL PENGADUAN" />
                            <x-text-input id="tanggal_pengaduan" type="date" name="tanggal_pengaduan" class="mt-1 block w-full" value="{{ old('tanggal_pengaduan')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_pengaduan')" />
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col">
                            <x-input-label for="id_guru" value="NAMA GURU BK" />
                            <x-select-input id="id_guru" name="id_guru" class="mt-1 block w-full" required>
                                <option value="">Pilih Guru BK</option>
                                <option value="1">Lina Elyana, S.Pd., MM.Pd</option>
                                <option value="2">Dian Rusdianto, S.Pd</option>
                                <option value="3">Yuliastuti Dewi Y, S.Si</option>
                                <option value="4">Desy Rosita Nuriswandi, S.Pd</option>
                                <option value="5">Yani Agustiani, S.Pd</option>
                            </x-select-input>
                        </div>

                        <div class="col">
                            <x-input-label for="jenis_pengaduan" value=" JENIS PENGADUAN BK" />
                            <x-select-input id="jenis_pengaduan" name="jenis_pengaduan" class="mt-1 block w-full" required>
                                <option value="">Pilih Jenis Bimbingan Konseling</option>
                                <option value="1">Pribadi</option>
                                <option value="2">Sosial</option>
                                <option value="3">Karier</option>
                                <option value="4">Belajar</option>
                            </x-select-input>
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-input-label for="isi_keluhan" value="ISI KELUHAN / PERMASALAHAN" />
                        <x-text-input id="isi_keluhan" type="text" name="isi_keluhan" class="mt-1 block w-full" value="{{ old('isi_keluhan')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('isi_keluhan')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="dokumentasi" value="DOKUMENTASI" />

                        <small class="d-block text-muted mb-2">
                            Dokumentasi ini diisi opsional, jika ada dokumentasi tentang siswa/i
                            dalam kasus kenakalan remaja di lingkungan sekolah,
                            <strong>silakan unggah di sini</strong>.
                        </small>

                        <input id="dokumentasi" name="dokumentasi" type="file"
                            class="form-control rounded-md"
                            style="height: 45px; border: 1px solid #ced4da; border-radius: 0;"
                            value="{{ old('dokumentasi') }}">

                        <x-input-error class="mt-2" :messages="$errors->get('dokumentasi')" />
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn px-4 py-2 border border-dark" style="background-color: rgba(87, 7, 65, 1); color: white;">
                            KIRIM
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>