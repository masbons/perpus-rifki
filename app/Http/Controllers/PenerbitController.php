<?php
namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use PDF;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penerbit::latest()->paginate(5);

        return view('penerbit.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pdf()
    {
        $data = Penerbit::all();

        $pdf = PDF::loadview('penerbit.pdf-penerbit',['penerbit'=>$data]);
        return $pdf->stream('laporan-pegawai-pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',

            // 'id_penulis' => 'required',
            // 'id_penerbit' => 'required',
            // 'id_kategori' => 'required',
          
        ]);

         $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
    }

        Penerbit::create($input);

        return redirect()->route('penerbits.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        return view('penerbits.show',compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        return view('penerbits.edit',compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
             'telepon' => 'required',
            // 'id_penerbit' => 'required',
            // 'id_kategori' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $penerbit->update($input);

        return redirect()->route('penerbits.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return redirect()->route('penerbits.index')
                        ->with('success','Post deleted successfully');
    }
}

