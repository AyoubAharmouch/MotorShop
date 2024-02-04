<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\AddArticleReques;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class ArticleAddController extends Controller
{
    public function index(){
        // $data= Article::all();
        $data= Article::paginate('5');
        return view ("home" , ['product'=>$data]);
    }
    public function pro($cat){
        $data = Article::where('category', '=', $cat)->get();
        return view ('product',[
            'product'=>$data,
            'cat'=>$cat
        ]);
    }

    public function espclient(){
        return view('espaceclient');
    }
public function Catalogue(){
    $sold = Article::where('solde',1)->get();

    $data = [
        'product' =>$sold,
        'test' =>'test',

    ];

    $pdf =Pdf::loadView('Catalogue',$data);

    return $pdf->stream();

}

    public function add(){
        return view ("add");
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddArticleReques $request)
    {
        $request->validated();

        $titre=$request->input('titre');
        $prix=$request->input('prix');
        $category=$request->input('category');
        $image=$request->file('image')->getClientOriginalName();

        $Article = new Article();
        $Article ->titre = $titre;
        $Article ->prix = $prix;
        $Article ->category = $category;
        $Article ->image = $image;

        $Article->save();

        $request->file('image')->move(public_path('imgs'), $image);
        return back()->with('success','You have successfully added a new Product.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article=Article::find($id);
        return view('edit',['article'=>$article]);
        // return view('edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddArticleReques $request,  $id)
    {
        $request->validated();

        $article=Article::find($id);

        $titre=$request->input('titre');
        $prix=$request->input('prix');
        $category=$request->input('category');

        //$image = '';

        $article->titre=$titre;
        $article->prix=$prix;
        $article->category=$category;
        if($request->hasFile('image')) {
            $image=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('imgs'), $image);

        }else{
            $image= $article->image;
        }
        $article->image=$image;

        $article->save();

        return back()->with('successupdate','You have successfully updated an article.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $Article=Article::find($id);


    //      // delete with delete

    //     $Article->delete();

    //     return back()->with('successdelete','You have successfully deleted a product.');

    // }
    public function destroy(string $id)
{
    $Article = Article::find($id);

    // Check if the article exists
    if ($Article) {
        // Delete the article
        $Article->delete();

        return back()->with('successdelete', 'You have successfully deleted a product.');
    } else {
        // Article not found, return with an error message
        return back()->with('error', 'Product not found.');
    }
}



    public function addCart($id){
        $product = Article::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                "titre"  => $product->titre,
                'quantity' =>1,
                "prix"  => $product->prix,
                "image"  => $product->image,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to Favorite List!');
    }

    public function shopCart(){
        return view('cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product successfully disfavorite!');
        }

        return redirect()->back()->with('error', 'Product not found.');
    }

    // public function deleteCart(Request $request){
    //     if($request->id) {

    //         $cart = session()->get('cart');

    //         if(isset($cart[$request->id])) {

    //             unset($cart[$request->id]);

    //             session()->put('cart', $cart);
    //         }

    //         session()->flash('success', 'Product removed successfully');
    //     }

    // }


}
