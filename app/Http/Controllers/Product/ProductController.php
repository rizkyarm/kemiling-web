<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use App\Models\ProductImage;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $products = Product::with(['category', 'user'])
                            ->latest()
                            ->paginate(12);

        return view('products.index', compact('products'));
    }

    Public function myProducts()
    {
        $products = Product::where('user_id', Auth::id())
                            ->with('category')
                            ->latest()
                            ->paginate(10);

        return view('products.my-products', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'user', 'images']);
        
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) 
            ->inRandomOrder()
            ->take(4)
            ->get();
        
        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::with('category')
                ->where('id', '!=', $product->id) 
                ->inRandomOrder()
                ->take(4)
                ->get();
        }

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'latitude'    => ['required','numeric','between:-90,90'],
            'longitude'   => ['required','numeric','between:-180,180'],
            'price' => 'required|numeric|min:0',
            'price_unit' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096' 
        ]);

        $imageManager = new ImageManager(new Driver());

        $mainImageFile = $request->file('image');
        $mainImageName = 'products/' . uniqid() . '.jpg';
        $image = $imageManager->read($mainImageFile);
        $encodedImage = $image->cover(600, 400)->toJpeg(85)->toString();
        Storage::disk('public')->put($mainImageName, $encodedImage);

        $lat = round((float) $validated['latitude'],  8);
        $lng = round((float) $validated['longitude'], 8);

        $product = Product::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . uniqid(),
            'description' => $validated['description'],
            'address' => $validated['address'],
            'latitude'    => $lat,
            'longitude'   => $lng,
            'price' => $validated['price'],
            'price_unit' => $validated['price_unit'],
            'image' => $mainImageName,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryFile) {
                $galleryImageName = 'products/gallery/' . uniqid() . '.jpg';
                $image = $imageManager->read($galleryFile);
                
                $encodedGalleryImage = $image->scaleDown(1200)->toJpeg(85)->toString();
                Storage::disk('public')->put($galleryImageName, $encodedGalleryImage);
                
                $product->images()->create([
                    'path' => $galleryImageName
                ]);
            }
        }

        
        
        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        $categories = Category::orderBy('name')->get();
        
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product->id)],
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'latitude'    => ['required','numeric','between:-90,90'],
            'longitude'   => ['required','numeric','between:-180,180'],
            'price' => 'required|numeric|min:0',
            'price_unit' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096', 
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096'
        ]);
        
        $productData = $validated;
        $productData['slug'] = Str::slug($validated['name']);

        $imageManager = new ImageManager(new Driver());

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $mainImageFile = $request->file('image');
            $mainImageName = 'products/' . uniqid() . '.jpg';
            $image = $imageManager->read($mainImageFile);
            $encodedImage = $image->cover(600, 400)->toJpeg(85)->toString();
            Storage::disk('public')->put($mainImageName, $encodedImage);
            $productData['image'] = $mainImageName;
        }
        $product->update($productData);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryFile) {
                $galleryImageName = 'products/gallery/' . uniqid() . '.jpg';
                $image = $imageManager->read($galleryFile);
                $encodedGalleryImage = $image->scaleDown(1200)->toJpeg(85)->toString();
                Storage::disk('public')->put($galleryImageName, $encodedGalleryImage);
                
                $product->images()->create(['path' => $galleryImageName]);
            }
        }

        return redirect()->route('my-products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->images) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->path);
            }
        }

        $product->delete();

        return redirect()->route('my-products')->with('success', 'Produk berhasil dihapus.');
    }
}
