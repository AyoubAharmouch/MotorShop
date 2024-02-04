<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Response;

class PanierController extends Controller
{
    public function index(){

        return view('panier');
    }

    public function AddToPanier($id){
        $product = Article::findOrFail($id);

        $panier = session()->get('panier',[]);

        if(isset($panier[$id])){
            $panier[$id]['quantity']++;
        }else{
            $panier[$id] = [
                "titre"    => $product->titre,
                "image"    => $product->image,
                "prix"     => $product->prix,
                'quantity' => 1,
            ];
        }
        session()->put('panier', $panier);
        return redirect()->back()->with('success', 'Product added to cart successfully ;)');
    }


    

    public function remove($id)
{
    $panier = session()->get('panier');

    if (isset($panier[$id])) {
        unset($panier[$id]);
        session()->put('panier', $panier);
        return redirect()->back()->with('success', 'Product successfully removed!');
    }

    return redirect()->back()->with('error', 'Product not found.');
}


public function update(Request $request, $id)
{
    $panier = session()->get('panier');

    if (isset($panier[$id])) {
        $quantity = max(1, intval($request->input('quantity')));
        $panier[$id]['quantity'] = $quantity;
        session()->put('panier', $panier);
        return redirect()->back()->with('success', 'Quantity updated successfully!');
    }

    return redirect()->back()->with('error', 'Product not found.');
}


}
