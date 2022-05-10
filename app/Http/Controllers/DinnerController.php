<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinner;
use App\Models\Group;
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
        $dinners = Dinner::select('meal', 'side', 'soup')->latest()->limit(10)->get();

        return view("dinner", ['dinners' => $dinners]);
    }

    /**
     *  
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user();
        $auth_id = Auth::id();

        $groups = Group::where('user_id', '=', $auth_id)->get();
        return view("create_menu",['groups' => $groups]);
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
            'group_id' => ['required'],
            'meal' => ['required', 'string'],
        ];

        $this->validate($request, $rules);

        $user=Auth::user();

        $dinner = new Dinner;
        $dinner->user_id = $user->id;
        $dinner->group_id = $request->group_id;
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
        $auth = Auth::user();
        $auth_id = Auth::id();

        $dinner = Dinner::find($id);
        $groups = Group::where('user_id', '=', $auth_id)->get();

        if (auth()->user()->id != $dinner->user_id) {
            return redirect(route('login')->with('error', '許可されていない操作です'));
        };

        return view("edit_menu", ['dinner' => $dinner], ['groups' => $groups]);
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
        $id = $dinner->group_id;

        $rules = [
            'group_id' => ['required'],
            'meal' => ['required', 'string'],
        ];

        $this->validate($request, $rules);

        if (auth()->user()->id != $dinner->user_id) {
            return redirect(route('login')->with('error', '許可されていない操作です'));
        };

        // リクエストデータ受取
        $form = $request->all();
        // フォームトークン削除
        unset($form['_token']);
        
        $dinner->fill($form)->save();

        return redirect()->route('group.show', $id)->with('message', '更新しました。');
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

        return redirect()->route('dinner.index')->with('message', '削除しました。');
    }
}
