<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePelangganRequest;
use App\Models\Pelanggan;
use Exception;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();
            return view('pelanggan.index')->with($data);
        }catch (QueryException | Exception | PDOException $error){
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        try {
            DB::beginTransaction();
            Pelanggan::create($request->all());

            DB::commit();

            return redirect('pelanggan')->with('success', 'Data Pelanggan berhasil ditambahkan!');
        }catch (QueryException | Exception | PDOException $error){
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(StorePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect('pelanggan')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();

            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        }catch (QueryExecuted | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan ".$error->getMessage();
        }
    }
}
