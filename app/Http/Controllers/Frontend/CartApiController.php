<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class CartApiController extends Controller
{
    // Return cart items and count for AJAX updates
    public function getCartData(Request $request)
    {
        $items = Helper::getUserCartItems();
        $count = count($items);
        return response()->json([
            'items' => $items,
            'count' => $count,
        ]);
    }

        // Delete a cart item by ID (for AJAX)
    public function deleteCartItem($id)
    {
        $user = auth()->guard('user')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }
        $cart = \App\Models\Cart::where('id', $id)->where('user_id', $user->id)->first();
        if ($cart) {
            $cart->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    }
}
