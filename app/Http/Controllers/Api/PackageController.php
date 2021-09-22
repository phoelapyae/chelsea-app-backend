<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\MatchDayPackage;
use App\Benefit;
use App\BuyTicketStep;
use App\User;
use App\Cart;
use App\Order;
use App\Transaction;

use App\Http\Resources\PackageResource;
use App\Http\Resources\BenefitResource;
use App\Http\Resources\BuyTicketStepResource;
use App\Http\Resources\CartResource;
use App\Http\Resources\OrderResource;
use Psr\Http\Message\ResponseInterface;

class PackageController extends Controller
{
    public function buyPackages()
    {
        $packages = MatchDayPackage::get();
        return PackageResource::collection($packages);
    }

    public function getBenefits()
    {
        $benefits = Benefit::get();
        return BenefitResource::collection($benefits);
    }

    public function detailPackage($id)
    {
        $package = MatchDayPackage::find($id);
        if ($package) {
            return new PackageResource($package);
        }
        return response()->json(['error' => 'There is no package.'], 404);
    }

    public function addPackageToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'match_id' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::find(auth()->id());
        $package = MatchDayPackage::find($request->package_id);
        $total = $request->qty * $package->price;

        $cart = Cart::where('user_id', auth()->id())
            ->where('package_id', $package->id)
            ->where('match_id', $request->match_id)
            ->first();

        if ($cart) {
            $cart->update([
                'qty' => $cart->qty + $request->qty,
                'total' => $cart->total + $total
            ]);
        } else {
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'package_id' => $package->id,
                'match_id' => $request->match_id,
                'qty' => $request->qty,
                'total' => $total
            ]);
        }

        return new CartResource($cart);
    }

    public function cartList()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        if ($carts) {
            return CartResource::collection($carts);
        } else {
            return response()->json(['error' => 'There is no cart!'], 422);
        }
    }

    public function packageOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_id' => 'required',
            'payment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $invoice_no = time() . rand(100, 999);

        $order = Order::create([
            'user_id' => auth()->id(),
            'cart_id' => $request->cart_id,
            'payment_id' => $request->payment_id,
            'invoice_no' => $invoice_no
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'payment_id' => $order->payment_id,
            'package_id' => $order->cart->package_id,
            'invoice_no' => $order->invoice_no,
            'amount' => $order->cart->total,
            'status' => 0,
            'order_id' => $order->id,
            'type' => 1
        ]);

        return new OrderResource($order);
    }

    public function confirmOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $order = Order::find($request->order_id);
        if ($order) {
            $order->update(['status' => 1]);
            Transaction::where('order_id', $order->id)->update(['status' => 1]);
            return response()->json(['message' => 'Confim your order successfully.'], 200);
        }
        return response()->json(['error' => 'There is no error.'], 422);
    }

    public function orderList()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        if ($orders) {
            return OrderResource::collection($orders);
        }
        return response()->json(['error' => 'There is no order.'], 422);
    }

    public function getSteps()
    {
        $steps = BuyTicketStep::get();
        return BuyTicketStepResource::collection($steps);
    }
}
