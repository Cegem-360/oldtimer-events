<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\GarageCar;
use App\Models\Museum;

class PageController extends Controller
{
    public function home()
    {
        $featuredEvents = Event::featured()->take(3)->get();

        return view('pages.home', compact('featuredEvents'));
    }

    public function events()
    {
        $query = Event::query();

        if ($category = request('category')) {
            $query->where('category', $category);
        }

        if ($country = request('country')) {
            $query->where('country', $country);
        }

        $sort = request('sort', 'date');
        if ($sort === 'featured') {
            $query->orderByDesc('featured')->orderBy('date');
        } else {
            $query->orderBy('date');
        }

        $events = $query->paginate(10)->withQueryString();
        $categories = ['Rally', 'Concours', 'Museum', 'Auction', 'Other'];
        $countries = Event::distinct()->pluck('country')->sort()->values()->all();

        return view('pages.events.index', compact('events', 'categories', 'countries'));
    }

    public function eventShow(string $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $relatedEvents = Event::where('category', $event->category)
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        if ($relatedEvents->isEmpty()) {
            $relatedEvents = Event::where('id', '!=', $event->id)->take(3)->get();
        }

        return view('pages.events.show', compact('event', 'relatedEvents'));
    }

    public function map()
    {
        $events = Event::whereNotNull('lat')->whereNotNull('lng')->get();

        return view('pages.map', compact('events'));
    }

    public function garage()
    {
        $cars = GarageCar::all();

        return view('pages.garage', compact('cars'));
    }

    public function museums()
    {
        $museums = Museum::all();
        $countries = Museum::distinct()->pluck('country')->sort()->values()->all();

        return view('pages.museums', compact('museums', 'countries'));
    }

    public function membership()
    {
        return view('pages.membership');
    }

    public function dashboard()
    {
        $events = Event::all();

        return view('pages.dashboard', compact('events'));
    }

    public function eventCreate()
    {
        return view('pages.events.create');
    }

    public function admin()
    {
        $events = Event::take(4)->get();

        return view('pages.admin', compact('events'));
    }
}
