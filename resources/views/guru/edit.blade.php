@foreach($guru as $data)
<div class="modal fade" id="exampleModal_{{$data->id_guru}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="exampleModalLabel_{{$data->id_guru}}">EDIT DATA GURU</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <form method="post" action="{{ route('guru.update', $data->id_guru) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="username" value="NAMA PELANGGAN" />
                            <x-text-input id="username" type="text" name="username" class="mt-1 block w-full" value="{{ old('username', $data->user->username)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nip" value="NIP" />
                            <x-text-input id="nip" type="text" name="nip" class="mt-1 block w-full" value="{{ old('nip', $data->nip)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nama_guru" value="NAMA GURU" />
                            <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" value="{{ old('nama_guru', $data->nama_guru)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                        </div>
                        <div class="max-w-xl">
                        <x-input-label for="jabatan" value="JABATAN" />
                        <x-select-input id="jabatan" name="jabatan" class="mt-1 block w-full" required>
                            <option value="">Pilih Jabatan</option>
                            <option value="Kepala Sekolah" {{ old('jabatan') === 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                            <option value="Wali Kelas 1" {{ old('jabatan') === 'Wali Kelas 1' ? 'selected' : '' }}>Wali Kelas 1</option>
                            <option value="Wali Kelas 2" {{ old('jabatan') === 'Wali Kelas 2' ? 'selected' : '' }}>Wali Kelas 2</option>
                            <option value="Wali Kelas 3" {{ old('jabatan') === 'Wali Kelas 3' ? 'selected' : '' }}>Wali Kelas 3</option>
                            <option value="Wali Kelas 4" {{ old('jabatan') === 'Wali Kelas 4' ? 'selected' : '' }}>Wali Kelas 4</option>
                            <option value="Wali Kelas 5" {{ old('jabatan') === 'Wali Kelas 5' ? 'selected' : '' }}>Wali Kelas 5</option>
                            <option value="Wali Kelas 6" {{ old('jabatan') === 'Wali Kelas 6' ? 'selected' : '' }}>Wali Kelas 6</option>
                            <option value="Guru Pengajar" {{ old('jabatan') === 'Guru Pengajar' ? 'selected' : '' }}>Guru Pengajar</option>
                        </x-select-input>
                    </div>
                        <div class="max-w-xl">
                            <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                            <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="P" {{ old('jenis_kelamin',  $data->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                                <option value="L" {{ old('jenis_kelamin',  $data->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            </x-select-input>
                        </div>
                        <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection