<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ $cancelUrl }}" class="mr-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ isset($item) ? 'Edit ' . $title : 'Create New ' . $title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-3xl bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
            <div class="p-8 bg-white border-b border-gray-200">
                
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ $submitUrl }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($item) && $item->exists)
                        @method('PUT')
                    @endif

                    @foreach($fields as $name => $field)
                        <div>
                            <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-1">{{ $field['label'] }}</label>
                            
                            @if($field['type'] === 'textarea')
                                <textarea name="{{ $name }}" id="{{ $name }}" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow {{ ($field['readonly'] ?? false) ? 'bg-gray-100 cursor-not-allowed text-gray-500' : '' }}" {{ ($field['readonly'] ?? false) ? 'readonly' : '' }}>{{ old($name, $item->$name ?? '') }}</textarea>
                            
                            @elseif($field['type'] === 'select')
                                <select name="{{ $name }}" id="{{ $name }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow">
                                    @foreach($field['options'] as $value => $label)
                                        <option value="{{ $value }}" {{ old($name, $item->$name ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            
                            @elseif($field['type'] === 'image' || $field['type'] === 'file')
                                @php
                                    $currentImage = null;
                                    $isFallback = false;
                                    
                                    if (isset($item) && $item->$name) {
                                        $currentImage = asset('storage/' . $item->$name);
                                    } elseif (isset($item) && $name === 'image_upload' && isset($item->type) && $item->type === 'image' && $item->value) {
                                        $currentImage = asset('storage/' . $item->value);
                                    } else {
                                        $isFallback = true;
                                        if (Str::contains($title ?? '', 'Products')) {
                                            $currentImage = asset('assets/images/catalog/L Buttress.png');
                                        } elseif (Str::contains($title ?? '', 'Timeline')) {
                                            $currentImage = asset('assets/images/timeline-hispatology.png');
                                        } elseif (Str::contains($title ?? '', 'Facilities')) {
                                            $currentImage = asset('assets/images/facility-cnc.png');
                                        } elseif (Str::contains($title ?? '', 'Events')) {
                                            $currentImage = asset('assets/images/kantor-risa.png');
                                        }
                                    }
                                @endphp
                                
                                @if($currentImage)
                                    <div class="mb-4 rounded-xl border border-gray-200 bg-white p-3 shadow-sm inline-block w-full sm:w-2/3">
                                        <p class="text-xs text-slate-500 mb-2 font-bold uppercase tracking-wider flex items-center gap-1.5">
                                            @if($isFallback)
                                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                Foto Bawaan Sistem (Fallback)
                                            @else
                                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Foto Terpasang di Website
                                            @endif
                                        </p>
                                        <div class="bg-slate-50 rounded-lg p-4 flex justify-center items-center border border-slate-100">
                                            <img src="{{ $currentImage }}" class="h-48 w-auto object-contain rounded shadow-sm bg-white p-2">
                                        </div>
                                        @if(!$isFallback)
                                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center">
                                            <input type="checkbox" name="remove_{{ $name }}" id="remove_{{ $name }}" value="1" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500 cursor-pointer">
                                            <label for="remove_{{ $name }}" class="ml-2 text-sm font-bold text-red-600 hover:text-red-800 cursor-pointer">Hapus Foto Ini Secara Permanen</label>
                                        </div>
                                        @endif
                                    </div>
                                @endif
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 mb-2 border-dashed rounded-md hover:border-blue-400 focus-within:border-blue-500 hover:bg-blue-50 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="{{ $name }}" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 px-1 py-1">
                                                <span>Click to upload a file</span>
                                                <input id="{{ $name }}" name="{{ $name }}" type="file" class="sr-only">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                                    </div>
                                </div>
                            
                            @else
                                <input type="{{ $field['type'] }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $item->$name ?? '') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow {{ ($field['readonly'] ?? false) ? 'bg-gray-100 cursor-not-allowed text-gray-500 border-gray-200 shadow-none' : '' }}" {{ ($field['readonly'] ?? false) ? 'readonly' : '' }}>
                            @endif
                        </div>
                    @endforeach

                    <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                        <a href="{{ $cancelUrl }}" class="px-4 py-2 hover:bg-gray-100 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition ease-in-out duration-150 mr-3">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
