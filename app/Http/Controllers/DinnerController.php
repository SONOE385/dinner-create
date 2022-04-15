<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinner;

class DinnerController extends Controller
{
    /**
     * 一覧表示用のメソッド
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dinners = Dinner::all();
        return view("　", ['dinners' => $dinners]);

    }

    /**
     *  
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("　");
    }

    /**
     * 献立の新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dinner = new Dinner($request->input('dinner'));
        $dinner->save();

        return redirect()->route('dinner')->with('message', '作成しました。');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dinner $dinner)
    {
        return view("　", [
            'dinner' => $dinner,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dinner = Dinner::find($id);
        return view("　", [
            'dinner' => $dinner,
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
        $dinner = Dinner::find($id);
        $dinner->fill($request->input('dinner'));
        $dinner->save();

        return redirect()->route('dinners.index')->with('message', '更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dinner = Dinner::find($id);
        $dinner->delete();

        return redirect()->route('dinners.index')->with('message', '削除しました。');
    }
}
