<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    @csrf

                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">NAMA</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengaduan" class="form-label">TANGGAL PENGADUAN</label>
                            <input type="date" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control" required>
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nama_guru" value="NAMA GURU" />
                            <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" value="{{ old('nama_guru')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                        </div>

                        <div class="mb-3">
                            <label for="jenis_pengaduan" class="form-label">JENIS PENGADUAN</label>
                            <select name="jenis_pengaduan" id="jenis_pengaduan" class="form-select" required>
                                <option selected disabled>Pilih Jenis Bimbingan Konseling</option>
                                <option value="Pribadi">Pribadi</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Karir">Karir</option>
                                <option value="Belajar">Belajar</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="isi_keluhan" class="form-label">ISI KELUHAN / PERMASALAHAN</label>
                            <input type="text" name="isi_keluhan" id="isi_keluhan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="dokumentasi" class="form-label">DOKUMENTASI</label>
                            <small class="d-block text-muted mb-2">
                                Dokumentasi ini di isi opsional, jika terdapat ada nya gambar atau dokumentasi tentang siswa/i
                                dalam kasus kenakalan remaja di lingkungan sekolah boleh di kirimkan
                            </small>
                            <input type="file" name="dokumentasi" id="dokumentasi" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-dark px-4">KIRIM</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>


