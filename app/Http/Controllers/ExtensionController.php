<?php

namespace App\Http\Controllers;

use App\ExtensionsManager;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $installed = ExtensionsManager::all();

        // $installed = [
        //     [
        //         'name' => 'karacms/impersonate',
        //         'title' => 'Impersonate',
        //         'author' => 'KaraCMS',
        //         'website' => 'https://karacms.com/extensions/impersonate',
        //         'icon' => null,
        //         'photo' => null,
        //         'description' => 'Impersonate Extension for KaraCMS',
        //         'price' => 0
        //     ],
        //     [
        //         'name' => 'karacms/payment',
        //         'title' => 'Payment',
        //         'author' => 'KaraCMS',
        //         'website' => 'https://karacms.com/extensions/payment',
        //         'icon' => null,
        //         'description' => 'Payment extension for KaraCMS',
        //         'price' => 0
        //     ],
        //     [
        //         'name' => 'karacms/backup',
        //         'title' => 'Backup',
        //         'author' => 'KaraCMS',
        //         'website' => 'https://karacms.com/extensions/backup',
        //         'icon' => null,
        //         'description' => 'Backup extension for KaraCMS',
        //         'price' => 0,
        //         'downloaded' => false
        //     ]
        // ];

        $extensions['installed'] = $installed;

        return view('extensions.index', compact('extensions'));
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
     * Activate/Deactivate extension
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->activate)) {
            ExtensionsManager::activate($request->activate);
        }

        if (!empty($request->deactivate)) {
            ExtensionsManager::deactivate($request->deactivate);
        }

        return back()->withMessage('Extension activated!');
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
}
