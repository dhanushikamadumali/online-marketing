<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubcategory;

class CategoryController extends Controller
{


        public function showCategories()
    {
        $categories = Category::with('subcategories.subSubcategories')->get();
        
        return view('admin_dashboard.category', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'parent_category' => 'nullable|string|max:255',
            'subcategories.*.name' => 'nullable|string|max:255',
            'subcategories.*.sub_subcategories.*.name' => 'nullable|string|max:255',
        ]);
    
        $parentCategory = Category::create([
            'parent_category' => $request->input('parent_category'),
        ]);
    
        $subcategories = $request->input('subcategories', []);
    
        foreach ($subcategories as $subcategoryData) {
            if (isset($subcategoryData['name'])) {
                $subCat = Subcategory::create([
                    'category_id' => $parentCategory->id,
                    'subcategory' => $subcategoryData['name'],
                ]);
    
                if (isset($subcategoryData['sub_subcategories'])) {
                    foreach ($subcategoryData['sub_subcategories'] as $subSubcategoryData) {
                        if (isset($subSubcategoryData['name'])) {
                            SubSubcategory::create([
                                'subcategory_id' => $subCat->id,
                                'sub_subcategory' => $subSubcategoryData['name'],
                            ]);
                        } else {
                            \Log::warning("Missing 'name' in sub-subcategory.", $subSubcategoryData);
                        }
                    }
                }
            } else {
                \Log::warning("Missing 'name' in subcategory.", $subcategoryData);
            }
        }
    
        return redirect()->route('category')->with('success', 'Category added successfully.');
    }
    

    


    public function destroy($id)
    {
        $parentCategory = Category::find($id);
    
        if (!$parentCategory) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }
    
        $parentCategory->subcategories()->each(function ($subcategory) {
            $subcategory->subSubcategories()->delete(); 
            $subcategory->delete(); 
        });
    
        $parentCategory->delete();
    
        return response()->json(['success' => true, 'message' => 'Category and its subcategories deleted successfully.']);
    }
        
}
