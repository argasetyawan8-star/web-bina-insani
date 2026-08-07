@extends('layouts.admin')

@section('title', 'FAQ Website')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                FAQ Website
            </h1>

            <p class="mt-1 text-slate-500">
                Kelola pertanyaan yang akan tampil pada website.
            </p>

        </div>

        <a
            href="{{ route('admin.faqs.create') }}"
            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">

            <i class="bi bi-plus-circle"></i>

            Tambah FAQ

        </a>

    </div>

    {{-- Alert --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl bg-white shadow">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="w-20 px-6 py-4 text-left font-semibold text-slate-700">
                            No
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-700">
                            Pertanyaan
                        </th>

                        <th class="w-40 px-6 py-4 text-center font-semibold text-slate-700">
                            Status
                        </th>

                        <th class="w-48 px-6 py-4 text-center font-semibold text-slate-700">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($faqs as $faq)

                        <tr class="hover:bg-slate-50">

                            <td class="px-6 py-5">

                                {{ $loop->iteration }}

                            </td>

                            <td class="px-6 py-5">

                                <div class="font-semibold text-slate-800">

                                    {{ $faq->question }}

                                </div>

                                <div class="mt-1 text-sm text-slate-500">

                                    {{ Str::limit($faq->answer, 80) }}

                                </div>

                            </td>

                            <td class="px-6 py-5 text-center">

                                @if($faq->is_active)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">

                                        Aktif

                                    </span>

                                @else

                                    <span class="rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700">

                                        Nonaktif

                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('admin.faqs.edit',$faq) }}"
                                        class="rounded-lg bg-yellow-500 px-4 py-2 text-white transition hover:bg-yellow-600">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.faqs.destroy',$faq) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin ingin menghapus FAQ ini?')"
                                            class="rounded-lg bg-red-600 px-4 py-2 text-white transition hover:bg-red-700">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="px-6 py-16 text-center text-slate-500">

                                Belum ada data FAQ.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div>

        {{ $faqs->links() }}

    </div>

</div>

@endsection