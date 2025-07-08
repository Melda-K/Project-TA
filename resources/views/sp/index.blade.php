<x-app-layout>

    @include('sp.create')
    @include('sp.edit')
    @include('sp.delete')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA SP-1, SP-2, SP-3') }}
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
                            <th>TANGGAL</th>
                            <th>NIS</th>
                            <th>NAMA SISWA</th>
                            <th>KELAS</th>
                            <th>JENIS SURAT</th>
                            <th>DOKUMEN SURAT</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @foreach ($sp as $data)

                    <tr class="text-center">
                        <td>{{ $num++ }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->siswa->nis }}</td>
                        <td>{{ $data->siswa->nama_siswa }}</td>
                        <td>{{ $data->siswa->kelas }}</td>
                        <td>{{ $data->jenis_sp }}</td>
                        <td>{{ $data->dokumen_sp }}</td>
                        <td>{{ $data->guru->nama_guru }}</td>
                        <td>
                            <button tag="a" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_sp }}"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id_sp }}"><i class="fa-solid fa-trash-can"></i></button>
                            <button tag="a" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id_sp }}"><i class="fa-solid fa-folder"></i></button>
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