<?php

namespace App\Http\Controllers;

use App\Models\UserTopup;
use App\Http\Requests\{StoreUserTopupRequest, UpdateUserTopupRequest};
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;


class UserTopupController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user topup view')->only('index', 'show');
        $this->middleware('permission:user topup create')->only('create', 'store');
        $this->middleware('permission:user topup edit')->only('edit', 'update');
        $this->middleware('permission:user topup delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userTopups = UserTopup::with('user:id,first_name');

            return DataTables::of($userTopups)
                ->addColumn('note', function ($row) {
                    return str($row->note)->limit(100);
                })
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->first_name : '';
                })
                ->addColumn('action', 'user-topups.include.action')
                ->toJson();
        }

        return view('user-topups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-topups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTopupRequest $request)
    {
        UserTopup::create($request->validated() + ['date' => now(), 'status' => 'Sukses']);

        $user = User::where('id', $request->user_id)->first();
        $pengguna = $user->deposit($request->amount, ['description' => $request->note]);

        // activity()->log('Topup saldo jimpay ' . $request->note . ' ke ' . $user->member_id . ' ' . $user->first_name);

        return redirect()
            ->route('user-topups.index')
            ->with('success', __('The userTopup was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function show(UserTopup $userTopup)
    {
        $userTopup->load('user:id,first_name');

        return view('user-topups.show', compact('userTopup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTopup $userTopup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTopupRequest $request, UserTopup $userTopup)
    {

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTopup  $userTopup
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTopup $userTopup)
    {
        //
    }
}
