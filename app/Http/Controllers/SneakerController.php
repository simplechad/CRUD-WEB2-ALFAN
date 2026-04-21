<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Http\Request;

class SneakerController extends Controller
{
    public function index(Request $request)
    {
        $query = Sneaker::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%");
            });
        }

        // Filter by Brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Sort
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $sneakers = $query->get();
        
        // Get unique brands for the filter dropdown
        $brands = Sneaker::select('brand')->distinct()->pluck('brand');

        return view('sneakers.index', compact('sneakers', 'brands'));
    }

    public function create()
    {
        return view('sneakers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Sneaker::create($request->all());

        return redirect()->route('sneakers.index')->with('success', 'Sneaker added successfully.');
    }

    public function show(Sneaker $sneaker)
    {
        return view('sneakers.show', compact('sneaker'));
    }

    public function edit(Sneaker $sneaker)
    {
        return view('sneakers.edit', compact('sneaker'));
    }

    public function update(Request $request, Sneaker $sneaker)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $sneaker->update($request->all());

        return redirect()->route('sneakers.index')->with('success', 'Sneaker updated successfully.');
    }

    public function destroy(Sneaker $sneaker)
    {
        $sneaker->delete();

        return redirect()->route('sneakers.index')->with('success', 'Sneaker deleted successfully.');
    }
}
