<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function product()
    {

        $products = Product::all();

        return view('Admin.Product.product', compact('products'));
    }

    public function formProduct()
    {

        $category = Category::all();

        return view('Admin.Product.addProduct', compact('category'));
    }

    public function addProduct(Request $request)
    {
        $imagePath = $request->file('img')->store('img-product', 'public');

        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'slug' => Str::slug($request->name),
            'img' => $imagePath,
        ]);

        return redirect()->route('admin.index.product')
            ->with('Create', "Successfully Added Data $request->name !");
    }

    public function descProduct($products)
    {

        $products = Product::findOrFail($products->id);

        return view("Admin.Product.descProduct", compact("products"));
    }

    public function editProduct($id)
    {

        $category = Category::all();
        $products = Product::findOrFail($id);

        return view('Admin.Product.editProduct', compact('category', 'products'));
    }

    public function updateProduct(Request $request, $id)
    {

        $products = Product::findOrFail($id);
        if ($request->hasFile('img')) {
            // Upload gambar baru
            $newImagePath = $request->file('img')->store('img-product', 'public');

            // Hapus gambar lama jika ada
            if ($products->img) {
                Storage::disk('public')->delete($products->img);
            }

            // Update dengan gambar baru
            $products->img = $newImagePath;
        }

        // Update data lainnya
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->desc = $request->desc;

        // Menyimpan data perubahan
        $products->save();
        return redirect()->route('admin.index.product')
            ->with('Update', "Data $request->name Success Update");
    }

    public function deleteProduct(Request $request)
    {

        $products = Product::findOrFail($request->id);

        Storage::delete($products->img);
        $products->name = $request->name;
        $products->delete();

        return redirect()->back()
            ->with('Delete', "Data $request->name Successfully Delete");
    }
}
