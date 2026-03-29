<x-app-layout>
@php
    $modelMap = [
        'admin.products' => 'Product',
        'admin.timeline' => 'TimelineEvent',
        'admin.facilities' => 'Facility',
        'admin.company-events' => 'CompanyEvent',
    ];
    $modelClass = $routePrefix ? ($modelMap[$routePrefix] ?? '') : '';
@endphp
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center flex-wrap gap-4">
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ $title }} {{ (isset($isTrash) && $isTrash) ? '(Trash Bin)' : '' }}
                </h2>
                @if(isset($isTrash))
                    @if($isTrash)
                        <a href="{{ route($routePrefix . '.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 px-4 py-2 rounded-full border border-blue-100 flex items-center shadow-sm">
                            ← Back to Active
                        </a>
                    @else
                        <a href="{{ route($routePrefix . '.index', ['trashed' => 1]) }}" class="text-sm font-semibold text-gray-600 hover:text-red-700 transition-colors flex items-center hover:bg-red-50 px-4 py-2 rounded-full border border-transparent hover:border-red-100 shadow-sm bg-white">
                            <svg class="w-5 h-5 mr-1 inline text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            View Trash Bin
                        </a>
                    @endif
                @endif
            </div>

            @if(!($disableCreate ?? false) && !(isset($isTrash) && $isTrash))
                <a href="{{ $createUrl }}" class="inline-flex items-center px-4 py-2.5 bg-blue-600 border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shrink-0">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    ADD NEW {{ strtoupper(Str::singular($title)) }}
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[600px]">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 uppercase text-xs font-bold tracking-widest border-b border-gray-200">
                            @if(!(isset($disableSort) && $disableSort) && !(isset($isTrash) && $isTrash))
                                <th class="px-4 py-5 w-10 text-center"></th>
                            @endif
                            @foreach($columns as $field => $label)
                                <th class="px-6 py-5">{{ $label }}</th>
                            @endforeach
                            <th class="px-6 py-5 text-right w-1/4">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="{{ !(isset($isTrash) && $isTrash) ? 'sortable-tbody' : '' }}" data-model="{{ $modelClass ?? '' }}" data-url="{{ route('admin.reorder') }}" class="divide-y divide-gray-100 text-sm">
                        @forelse($items as $item)
                            <tr class="hover:bg-slate-50 hover:shadow-inner transition-colors bg-white" data-id="{{ $item->id }}">
                                @if(!(isset($disableSort) && $disableSort) && !(isset($isTrash) && $isTrash))
                                    <td class="px-4 py-4 text-center cursor-grab text-gray-400 hover:text-gray-600 hover:bg-gray-100 drag-handle active:cursor-grabbing border-r border-gray-50 transition-colors">
                                        <svg class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/></svg>
                                    </td>
                                @endif
                                @foreach($columns as $field => $label)
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 align-middle">
                                        @if(in_array($field, ['image_path', 'value', 'image_upload']) && is_string($item->$field) && (Str::contains($item->$field, 'settings/') || Str::contains($item->$field, 'products/') || Str::contains($item->$field, 'timeline/') || Str::contains($item->$field, 'facilities/') || Str::contains($item->$field, 'events/')))
                                            <div class="h-16 w-24 rounded-lg shadow border border-gray-300 bg-white overflow-hidden p-1 flex justify-center items-center">
                                                <img src="{{ asset('storage/' . $item->$field) }}" class="h-full w-auto object-contain">
                                            </div>
                                        @else
                                            <span class="font-medium text-base">{{ Str::limit((string)$item->$field, 50) }}</span>
                                        @endif
                                    </td>
                                @endforeach
                                <td class="px-6 py-4 whitespace-nowrap text-right align-middle">
                                    <div class="flex justify-end items-center gap-3">
                                        @if(isset($isTrash) && $isTrash)
                                            <!-- TRASH ACTIONS -->
                                            <form action="{{ route($routePrefix . '.restore', $item->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="inline-flex items-center text-emerald-700 hover:text-white hover:bg-emerald-600 bg-emerald-50 px-4 py-2 rounded-lg font-bold transition-all text-sm border border-emerald-200 shadow-sm cursor-pointer whitespace-nowrap">
                                                    <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                    Restore
                                                </button>
                                            </form>
                                            @if(!($disableDelete ?? false))
                                                <form action="{{ route($routePrefix . '.forceDelete', $item->id) }}" method="POST" onsubmit="return confirm('PERMANENTLY DELETE? This cannot be undone!');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center text-red-700 hover:text-white hover:bg-red-700 bg-red-100 px-4 py-2 rounded-lg font-bold transition-all text-sm border border-red-200 shadow-sm cursor-pointer whitespace-nowrap">
                                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        Force Delete
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <!-- ACTIVE ACTIONS -->
                                            @if(!($disableCreate ?? false))
                                                <a href="{{ route($routePrefix . '.create', ['duplicate' => $item->id]) }}" class="inline-flex items-center text-indigo-700 hover:text-white hover:bg-indigo-600 bg-indigo-50 px-4 py-2 rounded-lg font-bold transition-all text-sm border border-indigo-200 shadow-sm cursor-pointer whitespace-nowrap">
                                                    <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    Copy
                                                </a>
                                            @endif
                                            <a href="{{ route($routePrefix . '.edit', $item) }}" class="inline-flex items-center text-blue-700 hover:text-white hover:bg-blue-600 bg-blue-50 px-4 py-2 rounded-lg font-bold transition-all text-sm border border-blue-200 shadow-sm cursor-pointer whitespace-nowrap">
                                                <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                Edit
                                            </a>
                                            @if(!($disableDelete ?? false))
                                                <form action="{{ route($routePrefix . '.destroy', $item) }}" method="POST" onsubmit="return confirm('Move to trash? You can undo this action later from the Trash Bin.');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center text-red-700 hover:text-white hover:bg-red-600 bg-red-50 px-4 py-2 rounded-lg font-bold transition-all text-sm border border-red-200 shadow-sm cursor-pointer whitespace-nowrap">
                                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        Trash
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($columns) + 1 }}" class="px-6 py-16 text-center text-gray-500 bg-gray-50">
                                    <div class="flex flex-col items-center justify-center">
                                        @if(isset($isTrash) && $isTrash)
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            <p class="text-xl font-bold text-gray-900">Trash Bin is empty.</p>
                                        @else
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-xl font-bold text-gray-900">No {{ strtolower($title) }} found.</p>
                                            <p class="text-gray-500 mt-2 text-base">Get started by creating a new entry.</p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if(!(isset($isTrash) && $isTrash))
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var el = document.getElementById('sortable-tbody');
            if (el && el.getAttribute('data-model')) {
                Sortable.create(el, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'bg-blue-50',
                    onEnd: function (evt) {
                        var ids = [];
                        el.querySelectorAll('tr[data-id]').forEach(function(row) {
                            ids.push(row.getAttribute('data-id'));
                        });
                        
                        fetch(el.getAttribute('data-url'), {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                model: el.getAttribute('data-model'),
                                ids: ids
                            })
                        }).then(r => r.json()).then(data => {
                            if(!data.success) alert('Gagal mendeteksi urutan baru. Mohon refresh halaman.');
                        }).catch(e => console.error(e));
                    }
                });
            }
        });
    </script>
    @endif
</x-app-layout>
