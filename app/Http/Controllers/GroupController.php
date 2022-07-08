<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Dinner;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $auth_id = Auth::id();

        // ユーザーごとのグループデータを表示
        $groups = Group::where('user_id', '=', $auth_id)->orderBy('created_at', 'desc')->get();

        return view("group_pick", ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create_group");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string','max:24'],
        ];

        $this->validate($request, $rules);

        $user = Auth::user();

        $group = new Group;
        $group->user_id = $user->id;
        $group->name = $request->name;
        $group->save();
        
        // グループ作成画面に遷移
        return redirect()->route('dinner.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = Auth::user();

        // ユーザーごとのグループデータを表示
        $dinners = Dinner::where('group_id', '=', $id)->orderBy('created_at', 'desc')->get();

        $group = Group::find($id);

        if (!isset($group) OR $user->id !== $group->user_id) {
            return redirect()->route('login')->with('error', '許可されていない操作です');
        };

        foreach($dinners as $dinner){
            if ($user->id !== $dinner->user_id) {
                return redirect()->route('login')->with('error', '許可されていない操作です');
            };
        };

        return view("group_show", ['dinners' => $dinners],[ 'group' => $group ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $group = Group::find($id);

        if ($user->id !== $group->user_id or $user->id !== $group->user_id) {
            return redirect()->route('login')->with('error', '許可されていない操作です');
        };

        return view("edit_group", [
            'group' => $group,
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
        $user = Auth::user();
        
        $group = Group::find($id);

        $rules = [
            'name' => ['required', 'string','max:24'],
        ];

        $this->validate($request, $rules);
        
        if ($user->id !== $group->user_id) {
            return redirect()->route('login')->with('error', '許可されていない操作です');
        };

        // リクエストデータ受取
        $form = $request->all();
        // フォームトークン削除
        unset($form['_token']);
        
        $group->fill($form)->save();
        
        return redirect()->route('group.show', $id)->with('message', '更新しました。');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $group = Group::find($id);
        if ($user->id !== $group->user_id) {
            return redirect()->route('login')->with('error', '許可されていない操作です');
        };

        $group->delete();

        
        return redirect()->route('group.index')->with('message', '削除しました。');
    }
}
