@foreach ($jadwaljiwa as $data)
<div class="modal fade" id="hapusModal_{{ $data->id_jadwaljiwa }}" tabindex="-1" aria-labelledby="hapusModalLabel_{{ $data->id_jadwaljiwa }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-bold" id="hapusModalLabel_{{ $data->id_jadwaljiwa }}">HAPUS DATA JADWAL SPESIALIS KEJIWAAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('jadwaljiwa.destroy', $data->id_jadwaljiwa)}}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('delete')
                    <p>Anda yakin ingin menghapus data jadwal pada hari {{ $data->hari }} ?</p>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button value="true">Hapus</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach