<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\Size;
use Form;
use Illuminate\Http\Request;

class GetUserRelationController extends Controller
{
    public function getCart(Request $request)
    {
        $carts = Cart::where('user_id', $request->get('user_id'))->get();

        return $carts;
    }

    public function getShippingAddress(Request $request)
    {
        $shipments = Shipment::where('user_id', $request->get('user_id'))->get();

        return $shipments;
    }

    public function getCartDetail(Request $request)
    {
        $cart = Cart::with('products')->find($request->get('cart_id'));

        // weird hack for cart import lol

        $out = "";
        $productItems = Product::pluck('nama', 'id')->toArray();
        $colorItems = Color::pluck('name', 'id')->toArray();
        $sizeItems = Size::pluck('name', 'id')->toArray();

        foreach ($cart->products as $product) {
            $out .= "<tr>
                        <td>" . Form::checkbox('row_product', '1', null, ['class' => 'form-control']) . "</td>
                        <td>" . Form::select('product_id[]', $productItems, $product->id, ['class' => 'form-control custom-select', 'onchange' => 'updateProduct(this)', 'placeholder' => 'Pilih produk...']) . "</td>
                        <td>" . Form::select('color_id[]', $colorItems, $product->pivot->color_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih warna...', 'onchange' => 'updateProductSize(this)']) . "</td>
                        <td>" . Form::select('size_id[]', $sizeItems, $product->pivot->size_id, ['class' => 'form-control custom-select', 'placeholder' => 'Pilih ukuran...']) . "</td>
                        <td>" . Form::number('jumlah[]', $product->pivot->jumlah, ['class' => 'form-control', 'onchange' => 'updateJumlah(this)', 'min' => 1]) . "</td>
                        <td>" . Form::hidden('sub_total[]', $product->pivot->sub_total) . Form::text('subtotal[]', rp($product->pivot->sub_total), ['class' => 'form-control-plaintext text-right', 'readonly' => true]) . "
                        </td>
                    </tr>";
        }

        return $out;
    }
}
