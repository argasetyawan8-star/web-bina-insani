@extends('layouts.admin')

@section('title','Program Diklat')

@section('content')

<div class="space-y-6">

    <div class="flex justify-between items-center mb-6">

    <form method="GET">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari program..."
            class="rounded-xl border px-4 py-3 w-80">

    </form>

    <a
        href="{{ route('admin.programs.create') }}"
        class="bg-blue-600 text-white px-5 py-3 rounded-xl">

        <i class="bi bi-plus-circle"></i>

        Tambah Program

    </a>

</div>


   @if(session('success'))

<div
class="mb-6 rounded-xl bg-green-100 p-4 text-green-700">

{{ session('success') }}

</div>

@endif


@if(session('error'))

<div
class="mb-6 rounded-xl bg-red-100 p-4 text-red-700">

{{ session('error') }}

</div>

@endif


    <div class="bg-white rounded-2xl shadow border overflow-hidden">

        

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Program
                    </th>

                    <th class="px-6 py-4 text-left">
                        Biaya Daftar
                    </th>

                    <th class="px-6 py-4 text-left">
                        Biaya Diklat
                    </th>

                    <th class="px-6 py-4 text-left">
                        Status
                    </th>

                    <th class="px-6 py-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($programs as $program)

                <tr class="border-t">

                    <td class="px-6 py-5 font-semibold">

                        {{ $program->name }}

                    </td>

                    <td class="px-6">

                        Rp {{ number_format($program->registration_fee,0,',','.') }}

                    </td>

                    <td class="px-6">

                        Rp {{ number_format($program->training_fee,0,',','.') }}

                    </td>

                    <td class="px-6">

                        @if($program->is_active)

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                Aktif

                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                Nonaktif

                            </span>

                        @endif

                    </td>

                    <td class="px-6">

                        <div class="flex justify-center gap-2">

                        <a
                        href="{{ route('admin.programs.edit',$program) }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

                        <i class="bi bi-pencil"></i>

                        </a>

                        <form
                        action="{{ route('admin.programs.destroy',$program) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus program ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                        class="bg-red-600 text-white px-4 py-2 rounded-lg">

                        <i class="bi bi-trash"></i>

                        </button>

                        </form>

                        </div>

                        </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="5"
                        class="text-center py-8 text-gray-500">

                        Belum ada program.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
 <div class="p-6">

{{ $programs->links() }}

</div>
</div>

@endsection