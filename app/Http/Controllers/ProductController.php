<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
         //$product = product::paginate(5);
         $product = product::all();
         return view('product',['produk' => $product]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_produk' => 'required',
                'stok' => 'required',
                'harga' => 'required'
            ]
        );
        Alert::success('Success', 'Data Berhasil DiTambahkan!!!');
        Product::create($request->all());
        return redirect('/product')->with('status', 'Data Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/edit',[
            'produk' => Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $this->validate($request, [
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);
        $data->update($request->all());
        Alert::success('Success', 'Success Data Berhasil Di Update!!!');
        return redirect('/product')->with('status', 'Data Berhasil Di Ubah!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::error('Delete', 'Data Berhasil DiHapus!!!');
        Product::destroy($id);
        return redirect('/product')->with('delete', 'Data Berhasil Di Hapus!!!');
    }
}
