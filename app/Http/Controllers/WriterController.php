<?php
namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use PDF;
class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Writer::latest()->paginate(5);

        return view('writer.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pdf()
    {
        $data = Writer::all();

        $pdf = PDF::loadview('writer.pdf-writer',['writer'=>$data]);
        return $pdf->stream('laporan-pegawai-pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('writer.create');
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
            'no_telepon' => 'required',
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

        Writer::create($input);

        return redirect()->route('writers.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Writer $writer)
    {
        return view('writer.show',compact('writer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Writer $writer)
    {
        return view('writer.edit',compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Writer $writer)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
             'no_telepon' => 'required',
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

        $writer->update($input);

        return redirect()->route('writers.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();

        return redirect()->route('writers.index')
                        ->with('success','Post deleted successfully');
    }
}

