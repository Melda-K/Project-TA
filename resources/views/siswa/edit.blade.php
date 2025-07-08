@foreach($siswas as $data)
<div class="modal fade" id="exampleModal_{{$data->id_siswa}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id_siswa}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="exampleModalLabel_{{$data->id_siswa}}">EDIT DATA SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('siswa.update', $data->id_siswa) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="max-w-xl">
                        <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa', $data->nama_siswa)}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nis" value="NIS" />
                        <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis', $data->nis)}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="ttl" value="TTL" />
                        <x-text-input id="ttl" type="text" name="ttl" class="mt-1 block w-full" value="{{ old('ttl', $data->ttl)}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('ttl')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jenis_sp" value="JENIS SP" />
                        <x-select-input id="jenis_sp" name="jenis_sp" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Jenis SP Siswa</option>
                            <option value="Sp-1" {{ old('jenis-sp',  $data->jenis_sp) === 'Sp-1' ? 'selected' : '' }}>SP-1</option>
                            <option value="Sp-2" {{ old('jenis_sp',  $data->jenis_sp) === 'Sp-2' ? 'selected' : '' }}>SP-2</option>
                            <option value="Sp-3" {{ old('jenis_sp',  $data->jenis_sp) === 'Sp-3' ? 'selected' : '' }}>SP-3</option>

                        </x-select-input>
                    </div>
                    
                    <div class="max-w-xl">
                        <x-input-label for="dokumentasi" value="DOKUMENTASI" />
                        <x-file-input id="dokumentasi" name="dokumentasi" class="mt-1 block w-full" value="{{ old('dokumentasi') }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('dokumentasi')" />
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