<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Type;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.dashboard.event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::pluck('name')->toArray();
        return view('admin.dashboard.event.create', ['types' => $types, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $imageUrl = $image->store('events', 'public');
            $data['image'] = $imageUrl;
        }

        $event = Event::create($data);


        if ($request->tags) {
            $tagIds = [];
            $tags = json_decode($request->tags);
            foreach ($tags as $item) {
                $tag = Tag::where('name', $item->value)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item->value,
                        'slug' => Str::slug($item->value)
                    ]);
                }
                $tagIds[] = $tag->id;
            }
            $event->tags()->attach($tagIds);
        }


        return redirect()->route('events.index')->with('success', 'Event Addedd Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event Successflly Deleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettrashed()
    {
        $events = Event::onlyTrashed()
            ->get();
        return view('admin.dashboard.event.trash', ['events' => $events]);
    }
    /**
     * restore specific event
     *
     * @return void
     */

    public function restore($id)
    {
        Event::withTrashed()->find($id)->restore();
        return redirect()->back();
        return redirect()->route('events.index')->with('success', 'Event Restored Successfully');
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Event::onlyTrashed()->restore();

        return redirect()->route('events.index')->with('success', 'All Trashed Events Restored Successfully');
    }

    /**
     * force delete specific event
     *
     * @return void
     */
    public function forcedelete($id)
    {
        Event::withTrashed()->find($id)->forceDelete();

        return redirect()->route('events.index')->with('success', 'Event Permantly Deleted');
    }
}
