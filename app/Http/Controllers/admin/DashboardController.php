<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \DateTime;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comp_new      = DB::table('complaints')->where('status_id', '1')->count();
        $comp_archived = DB::table('complaints')->where('status_id', '4')->count();
        $comp_count    = DB::table('complaints')->count() - $comp_archived;
        $comp_leatest  = DB::table('complaints')->pluck('created_at')->last();
        $days          = $this->countDays($comp_leatest);

        $users = [
            "count"       => User::all()->count(),
            "latest_user" => User::orderByDesc('created_at')->first(),
        ];

        $news = [
            "count"       => News::all()->count(),
            "latest_news" => News::orderByDesc('created_at')->first(),
        ];

        return view('admin.dashboard.index', compact([
            'comp_count',
            'comp_new',
            'comp_archived',
            'days',
            'users',
            'news'
        ]));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function countDays($date) {
        $now =  new DateTime(); // $cases->pluck('created_at')->first();
        $endDate = $date;
        $dateDiff = strtotime($now->format('Y-m-d H:i:s')) - strtotime($endDate);
        $daysCount = substr(round($dateDiff / (60 * 60 * 24)), 0 );

        return $daysCount;
    }
}
