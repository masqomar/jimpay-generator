<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogAcivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bank view')->only('index', 'show');
    }

    public function index()
    {
        if (request()->ajax()) {
            $activities = ActivityLog::with('user');

            return DataTables::of($activities)
                ->addColumn('user', function ($row) {
                    return $row->user->first_name;
                })
                ->addColumn('waktu', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->setRowAttr([
                    'properties' => function ($row) {
                        return $row->properties;
                    },
                ])
                ->toJson();
        }
        // $activities = ActivityLog::with('user')->get();

        // return json_decode($activities);
        return view('log-acivity.index');
    }
}
