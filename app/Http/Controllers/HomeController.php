<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use DataTables;
use Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $pgw = Pegawai::all();

            return Datatables::of($pgw)
                  ->addColumn('action', function($row){
                        $btn = '<button type="button" name="view" id="'.$row->id.'" class="view btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal" style="margin: 2px;">Lihat</button>';
                        $btn .= '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-warning btn-sm" data-toggle="modal" data-target="#formModal" style="margin: 2px;">Edit</button>';
                        $btn .= '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm" style="margin: 2px;">Hapus</button>';
                        return $btn;
                    })
                  ->rawColumns(['action'])
                  ->make(true);
        }

        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'departemen' => 'required',
            'level' => 'required',
            'agama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'departemen' => $request->departemen,
            'level' => $request->level,
            'agama' => $request->agama,
            'kontak' => $request->kontak,
            'email' => $request->email,
        );

        Pegawai::create($form_data);

        return response()->json(['success' => 'Data telah berhasil ditambahkan.']);
    }

    // show
    public function show($id)
    {
        if(request()->ajax()){
            $data = Pegawai::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax()){
            $data = Pegawai::findOrFail($id);
            return response()->json(['result' => $data]);
        }
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
        $rules = array(
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'departemen' => 'required',
            'level' => 'required',
            'agama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'departemen' => $request->departemen,
            'level' => $request->level,
            'agama' => $request->agama,
            'kontak' => $request->kontak,
            'email' => $request->email,
        );

        Pegawai::whereId($id)->update($form_data);

        return response()->json(['success' => 'Data telah berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
    }
}
