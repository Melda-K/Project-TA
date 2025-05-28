<x-app-layout>

    @include('siswa.create')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA SISWA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xlxl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center">
                    @hasrole('Admin|Guru BK')
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">TAMBAH DATA</button>
                    <form id="filterForm" action="{{ route('siswa.filter') }}" method="GET" class="inline-block">
                        <x-select-input id="kelas" name="kelas" class="mt-1 block w-36" required onchange="submitFilterForm()">
                            <option value="">PILIH KELAS</option>
                            <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X ATPH</option>
                            <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X APHP</option>
                            <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X TKJ</option>
                            <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X TKRO</option>
                            <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X AKL</option>
                            <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X APAT</option>

                            <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI ATPH</option>
                            <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI APHP</option>
                            <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI TKJ</option>
                            <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI TKRO</option>
                            <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI AKL</option>
                            <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI APAT</option>

                            <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII ATPH</option>
                            <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII APHP</option>
                            <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII TKJ</option>
                            <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII TKRO</option>
                            <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII AKL</option>
                            <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII APAT</option>
                        </x-select-input>
                    </form>
                    @endhasrole
                </div>
                <x-table :tableId="'myTable_' . uniqid()">
                    <x-slot name="header">
                        <tr class="bg-gray-400 text-center">
                            <th>NO.</th>
                            <th>NAMA</th>
                            <th>NIS</th>
                            <th>KELAS</th>
                            <th>TAHUN PELAJARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @foreach ($siswas as $data)

                    <tr class="text-center">
                        <td>{{ $num++ }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->tahun_pelajaran }}</td>
                        <td>
                            <button tag="a" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id }}"><i class="fa-solid fa-trash-can"></i></button>
                            <button tag="a" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id }}"><i class="fa-solid fa-folder"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>

    <script>
        function submitFilterForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
</x-app-layout>