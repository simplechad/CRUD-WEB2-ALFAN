@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('sneakers.index') }}" class="text-gray-500 hover:text-gray-700">Back</a>
            <h1 class="text-2xl font-bold">Sneaker Details</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('sneakers.edit', $sneaker->id) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">
                Edit
            </a>
            <form action="{{ route('sneakers.destroy', $sneaker->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded p-6 shadow-sm">
        <div class="mb-6">
            <span class="inline-block bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded uppercase tracking-wider mb-2">
                {{ $sneaker->brand }}
            </span>
            <h2 class="text-3xl font-bold text-gray-900 mb-1">{{ $sneaker->name }}</h2>
            <div class="text-xl text-gray-700">Rp {{ number_format($sneaker->price, 0, ',', '.') }}</div>
        </div>

        <div class="grid grid-cols-2 gap-4 border-t border-gray-200 pt-4">
            <div>
                <div class="text-sm text-gray-500">Size (EU)</div>
                <div class="text-lg font-semibold">{{ $sneaker->size }}</div>
            </div>
            
            <div>
                <div class="text-sm text-gray-500">Stock Availability</div>
                <div class="text-lg font-semibold {{ $sneaker->stock > 0 ? 'text-gray-900' : 'text-red-500' }}">
                    {{ $sneaker->stock > 0 ? $sneaker->stock . ' pcs' : 'Out of Stock' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
