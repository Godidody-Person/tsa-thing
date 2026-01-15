<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Enums\Provider;

class ResourceController extends Controller
{
    public function create(Request $request)
    {
        // Validate the incoming request data with custom messages
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:511',
            'type' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $resource = new Resource();
        $resource->name = $request->name;
        $resource->description = $request->description;
        $resource->type = $request->type;
        // Store the uploaded image and save the path
        $path = Storage::disk('public')->putFile('images', $request->file('image'));
        $resource->image_path = $path;

        $resource->creator_id = Auth::user()->id;

        $resource->save();

        return redirect()->route('resources');
    }

    public function loadResourcesPage(Request $request)
    {
        $new = Resource::orderBy('created_at', 'desc')->take(10)->get();
        $programs = Resource::programs();
        $events = Resource::events();
        $nonprofits = Resource::nonprofits();
        $clubs = Resource::clubs();
        return view('resources', compact('new', 'programs', 'events', 'nonprofits', 'clubs'));
    }

    public function loadEventsPage(Request $request)
    {
        $resources = Resource::events();
        $type = 'Events';
        return view('events', compact('resources', 'type'));
    }

    public function loadProgramsPage(Request $request)
    {
        $resources = Resource::programs();
        $type = 'Programs';
        return view('events', compact('resources', 'type'));
    }

    public function loadNonprofitsPage(Request $request)
    {
        $resources = Resource::nonprofits();
        $type = 'Nonprofits';
        return view('events', compact('resources', 'type'));
    }

    public function loadClubsPage(Request $request)
    {
        $resources = Resource::clubs();
        $type = 'Clubs';
        return view('events', compact('resources', 'type'));
    }

    public function viewResource(Request $request, $id)
    {
        $resource = Resource::find($id);

        if (!$resource) {
            return redirect()->route('resources')->with('error', 'Resource not found');
        }

        return view('resources.view', compact('resource'));
    }

    public function editResource(Request $request, $id)
    {
        $resource = Resource::find($id);

        if (!$resource) {
            return redirect()->route('resources')->with('error', 'Resource not found');
        }

        return view('resources.edit', compact('resource'));
    }

    public function updateResource(Request $request, $id)
    {
        $resource = Resource::find($id);

        if (!$resource) {
            return redirect()->route('resources')->with('error', 'Resource not found');
        }

        $resource->name = $request->name;
        $resource->description = $request->description;
        $resource->type = $request->type;
        // Store the uploaded image and save the path
        $path = Storage::disk('public')->put('images', $request->file('image'));
        $resource->image_path = $path;

        $resource->save();

        return redirect()->route('resources');
    }

    public function deleteResource(Request $request, $id)
    {
        $resource = Resource::find($id);

        if (!$resource) {
            return redirect()->route('resources')->with('error', 'Resource not found');
        }

        $resource->delete();

        return redirect()->route('resources');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $resources = Resource::where('name', 'like', '%' . $search . '%')->get();
        return view('search_results', compact('resources'));
    }

    public function getChatResult(Request $request){
        $request->validate([
            'query' => 'required|string|max:255'
        ]);

        $query = $request->input('query');

        $response = Prism::text()
            ->using(Provider::OpenRouter, 'nvidia/nemotron-3-nano-30b-a3b:free')
            ->withPrompt($query)
            ->generate();

        return json_encode([
            'response' => $response->text
        ]);
    }
}
