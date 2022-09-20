<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Writer;
use App\Models\Penerbit;
use App\Models\Kategori;
use PDF;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::with('writer','penerbit','kategori')->latest()->paginate(5);

        return view('book.index',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function pdf()
    {
        $data = book::all();

        $pdf = PDF::loadview('book.pdf-book',['book'=>$data]);
        return $pdf->stream('laporan-pegawai-pdf');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p = Penerbit::all();
        $w = Writer::all();
        $k = Kategori::all();
        return view('book.create',compact('k', 'w', 'p'));   
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
        'tahun_terbit' => 'required',
        // 'id_penulis' => 'required',
        // 'id_penerbit' => 'required',
            // 'id_kategori' => 'required',
        'sinopsis' => 'required',
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'

    ]);

       $input = $request->all();

       if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    }

    Book::create($input);

    return redirect()->route('books.index')
    ->with('success','Post created successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the speci  ```1fied resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $p = Penerbit::all();
        $w = Writer::all();
        $k = Kategori::all();
        return view('book.edit',compact('k', 'w', 'p'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tahun_terbit' => 'required',
             // 'id_penulis' => 'required',
            // 'id_penerbit' => 'required',
            // 'id_kategori' => 'required',
            'sinopsis' => 'required',
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

        $book->update($input);

        return redirect()->route('books.index')
        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
        ->with('success','Post deleted successfully');
    }
}
 