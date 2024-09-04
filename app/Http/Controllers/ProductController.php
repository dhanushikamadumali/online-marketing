<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function show(Request $request)
    {
        $title = $request->query('title');
        $image = $request->query('image');
        $price = $request->query('price');

        return view('single_product_page', compact('title', 'image', 'price'));
    }



    public function showProducts()
    {
        $categories = Category::all();
        $products = Products::with('category')->get();

        return view('admin_dashboard.products', compact('categories', 'products'));
    }

    

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all(); 
        return view('admin_dashboard.edit_products', compact('product', 'categories'));
    }
    

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }



    public function update(Request $request, $id)
    {
        $request->merge([
            'affiliateProduct' => $request->has('affiliateProduct') ? true : false,
        ]);

            $validatedData = $request->validate([
                'productName' => 'required|string|max:255',
                'productDesc' => 'required|string',
                'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'normalPrice' => 'required|numeric|min:0',
                'affiliateProduct' => 'nullable|boolean',
                'affiliatePrice' => 'nullable|numeric|min:0',
                'commissionPercentage' => 'nullable|numeric|min:0|max:100',
                'totalPrice' => 'required|numeric|min:0',
                'category' => 'required|string',
            ]);
    
            $product = Products::findOrFail($id);
    
            $product->product_name = $validatedData['productName'];
            $product->product_description = $validatedData['productDesc'];
            $product->normal_price = $validatedData['normalPrice'];
            $product->is_affiliate = $request->input('affiliateProduct') ? 1 : 0; 
            $product->affiliate_price = $validatedData['affiliatePrice'] ?? null;
            $product->commission_percentage = $validatedData['commissionPercentage'] ?? null;
            $product->total_price = $validatedData['totalPrice'];
            $product->product_category = $validatedData['category']; 
    

            if ($request->hasFile('productImage')) {
                $image = $request->file('productImage');
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('product_images', $imageName, 'public');
                $product->product_image = $imagePath;
                Log::info('Image uploaded successfully: ' . $imagePath);
            }
    
            $product->save();
            Log::info('Product updated successfully', ['product_id' => $product->id]);
    
            return redirect()->route('products')->with('success', 'Product updated successfully!');
    }
    
    



    public function store(Request $request)
    {
        $request->merge([
            'affiliateProduct' => $request->has('affiliateProduct') ? true : false,
        ]);
    
        $request->validate([
            'productName' => 'required|string|max:255',
            'productDesc' => 'nullable|string',
            'productImage' => 'nullable|image|max:2048',
            'normalPrice' => 'required|numeric',
            'affiliateProduct' => 'required|boolean',
            'affiliatePrice' => 'nullable|numeric',
            'commissionPercentage' => 'nullable|numeric|min:0|max:100',
            'totalPrice' => 'required|numeric',
            'category' => 'required|string',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('product_images', $imageName, 'public');
        }
    
        Products::create([
            'product_name' => $request->input('productName'),
            'product_description' => $request->input('productDesc'),
            'product_image' => $imagePath,
            'normal_price' => $request->input('normalPrice'),
            'is_affiliate' => $request->input('affiliateProduct'),
            'affiliate_price' => $request->input('affiliatePrice'),
            'commission_percentage' => $request->input('commissionPercentage'),
            'total_price' => $request->input('totalPrice'),
            'product_category' => $request->input('category'), 
        ]);
    
        return redirect()->route('products')->with('success', 'Product added successfully!');
    }
    
   

    public function showCategory()
    {
        $categories = Category::all(); 
        return view('admin_dashboard.add_products', compact('categories'));
    }



}
