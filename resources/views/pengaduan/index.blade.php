<x-app-layout>

    @include('pengaduan.create')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA PENGADUAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xlxl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center">
                    @hasrole('Admin|Guru BK')
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">TAMBAH DATA</button>

                    @endhasrole
                </div>
                <x-table :tableId="'myTable_' . uniqid()">
                    <x-slot name="header">
                        <tr class="bg-gray-400 text-center">
                            <th>NO.</th>
                            <th>NAMA SISWA</th>
                            <th>NAMA GURU</th>
                            <th>TANGGAL</th>
                            <th>JENIS PENGADUAN BK</th>
                            <th>STATUS</th>
                            <th>KETERANGAN</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @foreach ($pengaduan as $data)

                    <tr class="text-center">
                        <td>{{ $num++ }}</td>
                        <td>{{ $data->siswa->nama_siswa }}</td>
                        <td>{{ $data->guru->nama_guru }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->jenis_pengaduan }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <button tag="a" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_pengaduan }}"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id_pengaduan }}"><i class="fa-solid fa-trash-can"></i></button>
                            <button tag="a" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id_pengaduan }}"><i class="fa-solid fa-folder"></i></button>
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