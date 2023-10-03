<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemasokRequest;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();
            return view('pemasok.index')->with($data);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemasokRequest $request)
    {
        try {
            DB::beginTransaction();
            Pemasok::create($request->all());

            DB::commit();

            return redirect('pemasok')->with('success', 'Data pemasok berhasil ditambahkan');
        }catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(StorePemasokRequest $request, Pemasok $pemasok)
    {
        $pemasok->update($request->all());

        return redirect('pemasok')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        try {
            $pemasok->delete();

            return redirect('pemasok')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error){
            DB::rollBack();
            return "terjadi kesalahan ".$error->getMessage();
        }
    }
}
