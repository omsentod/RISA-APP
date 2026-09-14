<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Overview Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stat Card 1 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Total Products</h3>
                <p class="text-4xl font-bold text-gray-800">{{ \App\Models\Product::count() }}</p>
            </div>
            
            <!-- Stat Card 2 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Facilities Listed</h3>
                <p class="text-4xl font-bold text-gray-800">{{ \App\Models\Facility::count() }}</p>
            </div>
            
            <!-- Stat Card 3 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Company Events</h3>
                <p class="text-4xl font-bold text-gray-800">{{ \App\Models\CompanyEvent::count() }}</p>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
            <div class="p-8 text-gray-900 flex items-start gap-6">
                <div class="hidden sm:block">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Welcome to RISA CMS, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600 mb-6 max-w-2xl leading-relaxed">
                        You're logged into the content management system. Use the sidebar on the left to navigate through the different sections of the website. Any changes you make here will be instantly reflected on the live public website.
                    </p>
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-800 transition shadow">
                        Manage Products
                    </a>
                    <a href="/" target="_blank" class="ml-3 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition">
                        View Live Site
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
