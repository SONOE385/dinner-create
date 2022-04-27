<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinner;
use Illuminate\Support\Facades\Auth;

class DinnerController extends Controller
{
    /**
     * 一覧表示用のメソッド
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $auth_id = Auth::id();

        // ユーザーごとのグループデータを表示
        $dinners = Dinner::where('user_id', '=', $auth_id)->get();

        return view("dinner", ['dinners' => $dinners]);
    }

    /**
     *  
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create_menu");
    }

    /**
     * 献立の新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = [
            'meal' => ['required', 'string'],
            'side' => ['required', 'string'],
            'soup' => ['required', 'string'],
        ];

        $this->validate($request, $rules);

        $user=Auth::user();

        $dinner = new Dinner;
        $dinner->user_id = $user->id;
        $dinner->meal = $request->meal;
        $dinner->side = $request->side;
        $dinner->soup = $request->soup;
        $dinner->save();

        return redirect()->route('dinner.create')->with('message', '作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dinner $dinner)
    {
        return view("", [
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

        if (auth()->user()->id != $group->user_id) {
            return redirect(route('group.index')->with('error', '許可されていない操作です'));
        };

        return view("dinner.edit", [
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

        $rules = [
            'meal' => ['required', 'string'],
            'side' => ['required', 'string'],
            'soup' => ['required', 'string'],
        ];

        $this->validate($request, $rules);

        $dinner->fill($request->input('dinner'));
        $dinner->save();

        return redirect()->route('dinners.edit')->with('message', '更新しました。');
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
