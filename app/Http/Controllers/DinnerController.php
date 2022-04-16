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
        return view("一覧画面を表示させたい画面", ['dinners' => $dinners]);
    }

    /**
     *  
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("投稿完了画面もしくはホームページ");
    }

    /**
     * 献立の新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $dinner = new Dinner;
        $channel->user_id = $request->user_id;
        $channel->meal = $request->meal;
        $channel->side = $request->side;
        $channel->soup = $request->soup;
        $dinner->save();

        return redirect()->route('dinner.create');
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
     * 編集メソッド
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dinner = Dinner::find($id);
        return view("auth.edit", [
            'dinner' => $dinner,
        ]);
    }
    /**
     * 更新メソッド
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
     * 削除メソッド
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
