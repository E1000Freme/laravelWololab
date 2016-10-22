<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Report as Report;
use App\Model\Result as Result;
use App\Model\User as User;
class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:operator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rp = Report::paginate(10);
        return view('reports.rindex')->with('reports', $rp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                        'pName' => 'required|max:255',
                        'tTitle_0' => 'required|max:255',
                        'tDesc_0' => 'required|max:255',
                        'tResult_0' =>'required|max:255'
                        ]);
        // dd($request);
        $patient = User::where('name', $request->pName)->first();
        $newReport = new Report;
        $newReport->user_id = $patient->id;
        $newReport->save();
        $testNo = 0;
        while(!is_null($request->{'tTitle_'.$testNo})){

            $newResult = new Result;
            $newResult->title = $request->{'tTitle_'.$testNo};
            $newResult->description = $request->{'tDesc_'.$testNo};
            $newResult->data = $request->{'tResult_'.$testNo};
            $newResult->save();

            $newReport->results()->attach($newResult);
            $testNo++;
        }

       return redirect()->route('report.show', ['id' => $newReport->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('reports.show')->with('rp',Report::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('reports.edit')->with('rp',Report::find($id));
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
        $this->validate($request, [
                        'tTitle_0' => 'required|max:255',
                        'tDesc_0' => 'required|max:255',
                        'tResult_0' =>'required|max:255'
                        ]);
        // dd($request);
        $report = Report::find($id);
        $testNo = 0;
        foreach ($report->results()->get() as $result) {
            $result->title = $request->{'tTitle_'.$testNo};
            $result->description = $request->{'tDesc_'.$testNo};
            $result->data = $request->{'tResult_'.$testNo};
            $result->save();
            $testNo++;
        }

       return redirect()->route('report.show', ['id' => $report->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Report::destroy($id);
        return redirect()->route('report');
    }
}
