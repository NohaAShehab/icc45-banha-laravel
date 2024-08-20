<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreManagerRequest;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $managers = Manager::paginate(3);
        return view('managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('managers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagerRequest $request)
    {
        //
        $image_path=null;
        if($request->file('image')){
            $image = $request->file('image');
            $image_path= $image->store("images", 'managers_upload');
        }
        ### use requests
        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $manager = Manager::create($request_data); # mass assignment
        return to_route('managers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        //
        return view('managers.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        //
        $manager->delete();
        return to_route('managers.index');
    }
}
