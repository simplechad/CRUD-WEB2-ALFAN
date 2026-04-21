@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center mb-6 gap-4">
        <a href="{{ route('sneakers.index') }}" class="text-gray-500 hover:text-gray-700">Back</a>
        <h1 class="text-2xl font-bold">Edit Sneaker</h1>
    </div>

    <div class="bg-white border border-gray-200 p-6 rounded shadow-sm">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 text-red-600 border border-red-200 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sneakers.update', $sneaker->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $sneaker->name) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                <input type="text" name="brand" value="{{ old('brand', $sneaker->brand) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500 outline-none" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Size (EU)</label>
                    <input type="number" name="size" value="{{ old('size', $sneaker->size) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500 outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $sneaker->stock) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500 outline-none" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $sneaker->price) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500 outline-none" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
