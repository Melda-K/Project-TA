<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="tambahModalLabel">TAMBAH DATA SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nis" value="NIS" />
                        <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="ttl" value="TEMPAT TANGGAL LAHIR" />
                        <x-text-input id="ttl" type="text" name="ttl" class="mt-1 block w-full" value="{{ old('ttl')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('ttl')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                        <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="agama" value="AGAMA" />
                        <x-text-input id="agama" type="text" name="agama" class="mt-1 block w-full" value="{{ old('agama')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="pendik_sebelumnya" value="PENDIDIKAN SEBELUMNYA" />
                        <x-text-input id="pendik_sebelumnya" type="text" name="pendik_sebelumnya" class="mt-1 block w-full" value="{{ old('pendik_sebelumnya')}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('pendik_sebelumnya')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jmlh_sodara" value="ANAK KE" />
                        <x-text-input id="jmlh_sodara" type="text" name="jmlh_sodara" class="mt-1 block w-full" value="{{ old('jmlh_sodara')}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('jmlh_sodara')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="alamat" value="ALAMAT" />
                        <x-text-input id="alamat" type="text" name="alamat" class="mt-1 block w-full" value="{{ old('alamat')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                    </div>
                    <div class="row g-3">
                        <p>NAMA ORANG TUA </p>
                        <div class="col">
                            <x-text-input id="nama_ayah" type="text" name="nama_ayah" class="mt-1 block w-full" value="{{ old('nama_ayah')}}" placeholder="Nama Ayah" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_ayah')" />
                        </div>
                        <div class="col">
                            <x-text-input id="nama_ibu" type="text" name="nama_ibu" class="mt-1 block w-full" value="{{ old('nama_ibu')}}" placeholder="Nama Ibu" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_ibu')" />
                        </div>
                    </div>
                    <div class="row g-3">
                        <p>PEKERJAAN ORANG TUA </p>
                        <div class="col">
                            <x-text-input id="pekerjaan_ayah" type="text" name="pekerjaan_ayah" class="mt-1 block w-full" value="{{ old('pekerjaan_ayah')}}" placeholder="Pekerjaan Ayah" />
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ayah')" />
                        </div>
                        <div class="col">
                            <x-text-input id="pekerjaan_ibu" type="text" name="pekerjaan_ibu" class="mt-1 block w-full" value="{{ old('pekerjaan_ibu')}}" placeholder="Pekerjaan Ibu" />
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ibu')" />
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="wali_siswa" value="NAMA WALI SISWA" />
                        <x-text-input id="wali_siswa" type="text" name="wali_siswa" class="mt-1 block w-full" value="{{ old('wali_siswa')}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('wali_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS" />
                        <x-select-input id="kelas" name="kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih Kelas</option>
                            <option value="X ATPH" {{ old('kelas') === 'X' ? 'selected' : '' }}>X ATPH</option>
                            <option value="X APHP" {{ old('kelas') === 'X' ? 'selected' : '' }}>X APHP</option>
                            <option value="X TKJ" {{ old('kelas') === 'X' ? 'selected' : '' }}>X TKJ</option>
                            <option value="X TKRO" {{ old('kelas') === 'X' ? 'selected' : '' }}>X TKRO</option>
                            <option value="X AKL" {{ old('kelas') === 'X' ? 'selected' : '' }}>X AKL</option>
                            <option value="X APAT" {{ old('kelas') === 'X' ? 'selected' : '' }}>X APAT</option>

                            <option value="XI ATPH" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI ATPH</option>
                            <option value="XI APHP" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI APHP</option>
                            <option value="XI TKJ" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI TKJ</option>
                            <option value="XI TKRO" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI TKRO</option>
                            <option value="XI AKL" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI AKL</option>
                            <option value="XI APAT" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI APAT</option>

                            <option value="XII ATPH" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII ATPH</option>
                            <option value="XII APHP" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII APHP</option>
                            <option value="XII TKJ" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII TKJ</option>
                            <option value="XII TKRO" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII TKRO</option>
                            <option value="XII AKL" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII AKL</option>
                            <option value="XII APAT" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII APAT</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="id_guru" value="WALI KELAS" />
                        <x-select-input id="id_guru" name="id_guru" class="mt-1 block w-full" required>
                            <option value="">Pilih Wali Kelas</option>
                            @foreach (App\Models\Guru::all() as $data)
                            <option value="{{ $data->id_guru }}">{{ $data->nama_guru }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_guru')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="tahun_pelajaran" value="TAHUN PELAJARAN" />
                        <x-select-input id="tahun_pelajaran" name="tahun_pelajaran" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Tahun Pelajaran</option>
                            <option value="2025" {{ old('tahun_pelajaran') === '2025' ? 'selected' : '' }}>2025</option>
                            <option value="2026" {{ old('tahun_pelajaran') === '2026' ? 'selected' : '' }}>2026</option>
                        </x-select-input>
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>