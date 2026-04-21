@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Inventory</h1>
    <a href="{{ route('sneakers.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        Add Sneaker
    </a>
</div>

<div class="mb-6 flex flex-col md:flex-row justify-between gap-4">
    <!-- Search Form -->
    <form method="GET" action="{{ route('sneakers.index') }}" class="bg-white p-4 rounded border border-gray-200 flex gap-2 items-end md:w-1/3">
        @if(request('brand'))
            <input type="hidden" name="brand" value="{{ request('brand') }}">
        @endif
        @if(request('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
        @endif
        
        <div class="flex-1">
            <label class="block text-sm text-gray-600 mb-1">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or brand..." class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded text-sm">Search</button>
        </div>
    </form>

    <!-- Filter and Sort Form -->
    <form method="GET" action="{{ route('sneakers.index') }}" class="bg-white p-4 rounded border border-gray-200 flex flex-wrap gap-4 items-end md:w-2/3 justify-end">
        @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        
        <div class="w-40">
            <label class="block text-sm text-gray-600 mb-1">Filter by Brand</label>
            <select name="brand" onchange="this.form.submit()" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                <option value="">All Brands</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-48">
            <label class="block text-sm text-gray-600 mb-1">Sort By</label>
            <select name="sort" onchange="this.form.submit()" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                <option value="">Latest</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
            </select>
        </div>

        @if(request()->hasAny(['search', 'brand', 'sort']))
            <div>
                <a href="{{ route('sneakers.index') }}" class="text-sm text-gray-500 hover:text-gray-800 underline">Clear All</a>
            </div>
        @endif
    </form>
</div>

<div class="bg-white border border-gray-200 rounded shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Brand</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Name</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Size</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Price</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Stock</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($sneakers as $sneaker)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-600">{{ $sneaker->brand }}</td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $sneaker->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $sneaker->size }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">Rp {{ number_format($sneaker->price, 0, ',', '.') }}</td>
                <td class="px-6 py-4 text-sm {{ $sneaker->stock > 0 ? 'text-gray-600' : 'text-red-500' }}">
                    {{ $sneaker->stock > 0 ? $sneaker->stock : 'Out of Stock' }}
                </td>
                <td class="px-6 py-4 text-sm text-right space-x-3">
                    <a href="{{ route('sneakers.show', $sneaker->id) }}" class="text-gray-500 hover:text-gray-700">View</a>
                    <a href="{{ route('sneakers.edit', $sneaker->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                    <form action="{{ route('sneakers.destroy', $sneaker->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                    No sneakers found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
