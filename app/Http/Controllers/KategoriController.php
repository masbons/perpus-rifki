<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use PDF;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kategori::latest()->paginate(5);

        return view('kategori.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pdf()
    {
        $data = kategori::all();

        $pdf = PDF::loadview('kategori.pdf-kategori',['kategori'=>$data]);
        return $pdf->stream('laporan-pegawai-pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            // 'nama' => 'required|max:255',
            // 'alamat' => 'required',
            // 'telepon' => 'required',
             'nama' => 'required',

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

        Kategori::create($input);

        return redirect()->route('kategori.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            // 'nama' => 'required|max:255',
            // 'alamat' => 'required',
            //  'telepon' => 'required',
            // 'id_penerbit' => 'required',
            // 'id_kategori' => 'required',
            'nama' => 'required',
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

        $kategori->update($input);

        return redirect()->route('kategori.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
                        ->with('success','Post deleted successfully');
    }
}

