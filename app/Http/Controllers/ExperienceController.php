<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
        return $this->render($experiences);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceRequest $request)
    {
        $experience = Experience::create($request->all());
        return $this->render($experience);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return $this->render($experience);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExperienceRequest $request, Experience $experience)
    {
        $experience->job_title = $request->job_title;
        $experience->company_name = $request->company_name;
        $experience->company_web_url = $request->company_web_url;
        $experience->city = $request->city;
        $experience->country = $request->country;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->responsibilities = $request->responsibilities;
        $experience->save();
        return $this->render($experience);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Experience::destroy($id);
    }
}
