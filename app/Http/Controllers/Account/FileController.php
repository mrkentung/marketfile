<?php

namespace App\Http\Controllers\Account;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreFileRequest;

class FileController extends Controller
{
	public function index()
	{
		$files = auth()->user()->files()->latest()->finished()->get();

		return view('account.files.index', compact('files'));
	}

    public function create(File $file)
    {
    	if (!$file->exists) {
    		$file = $this->createAndReturnSekeletonFile();

    		return redirect()->route('account.files.create', $file);
    	}

    	$this->authorize('touch', $file);

    	return view('account.files.create', compact('file'));
    }

    public function store(File $file, StoreFileRequest $request)
    {
    	$this->authorize('touch', $file);

    	$file->fill($request->only(['title', 'overview', 'overview_short', 'price']));
    	$file->finished = true;
    	$file->save();

    	return redirect()->route('account.files.index')->withSuccess('Thanks, sumbitted for review');
    }

    protected function createAndReturnSekeletonFile()
    {
    	return auth()->user()->files()->create([
    		'title' => 'Untitle',
    		'overview' => 'None',
    		'overview_short' => 'None',
    		'price' => 0,
    		'finished' => false,
    	]);
    }
}
