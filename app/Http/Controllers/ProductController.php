<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Compound;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getInfo(Request $request) {
        //Пример ожидаемых данных
        /*$request->merge([
            'category' => 'compound',
            'color' => '9321da',
            'price_sort' => true,
            'weight' => 44,
            'composition' => ['Масло', 'Мука'],
            'name' => 'Apple'
        ]);*/
        $products = Product::query();

        if (in_array($request->category, array_keys(Relation::morphMap()))) {
            $products->where('productable_type', $request->category);
            $class = (new (Relation::morphMap()[$request->category]));

            foreach ($request->only($class->getFillable()) as $key => $value) {
                $products->whereHasMorph('productable', get_class($class), fn ($query) =>
                    $query->when(is_array($value), function ($query) use ($key, $value){
                        foreach ($value as $item) {
                            $query->orWhereJsonContains($key, ['name' => $item]);
                        }
                    }, fn ($query) => $query->where($key, $value))
                );
            }
        }

        if (key_exists('price_sort', $request->all())) {
            $products->orderBy('price', $request->price_sort ? 'asc' : 'desc');
        }
        return json_encode($products->get());

    }
}
