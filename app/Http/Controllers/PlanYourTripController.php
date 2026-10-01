<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Regency;

class PlanYourTripController extends Controller
{
    public function index()
    {
        return view('plan-your-trip.index');
    }

    /**
     * "Build My Trip" — generates a curated itinerary from DB destinations.
     */
    public function build()
    {
        $area     = request('area',     'all');
        $duration = (int) request('duration', 3);
        $style    = request('style',    'relaxed');
        $budget   = request('budget',   'mid');

        // ── 1. Fetch destinations from DB ─────────────────────────────────────
        $query = Destination::query();

        // Filter by area (using regency name substring)
        if ($area !== 'all') {
            $areaMap = [
                'north'   => 'Utara',
                'east'    => 'Timur',
                'south'   => 'Selatan',
                'west'    => 'Barat',
                'central' => ['Pusat', 'Tengah'],
            ];
            $keyword = $areaMap[$area] ?? null;
            if ($keyword) {
                $query->whereHas('regency', function ($q) use ($keyword) {
                    if (is_array($keyword)) {
                        $q->where(function ($q2) use ($keyword) {
                            foreach ($keyword as $k) {
                                $q2->orWhere('name', 'like', "%{$k}%");
                            }
                        });
                    } else {
                        $q->where('name', 'like', "%{$keyword}%");
                    }
                });
            }
        }

        $all = $query->get()->shuffle();

        // ── 2. Decide how many spots per day ─────────────────────────────────
        $days          = $duration <= 2 ? 2 : ($duration <= 4 ? 3 : 5);
        $spotsPerDay   = $style === 'relaxed' ? 3 : ($style === 'culinary' ? 4 : 4);

        // ── 3. Build day-by-day chunks ────────────────────────────────────────
        $dayChunks = [];
        $pool      = $all->values();
        $offset    = 0;
        for ($d = 0; $d < $days; $d++) {
            $chunk = $pool->slice($offset, $spotsPerDay)->values();
            if ($chunk->isEmpty()) break;
            $dayChunks[] = $chunk;
            $offset     += $spotsPerDay;
        }

        // ── 4. Build itinerary metadata ───────────────────────────────────────
        $styleLabels = [
            'relaxed'   => 'Santai & Menyenangkan',
            'culture'   => 'Budaya & Sejarah',
            'culinary'  => 'Kuliner Surabaya',
            'adventure' => 'Aktif & Petualangan',
        ];
        $areaLabels = [
            'all'     => 'Seluruh Surabaya',
            'north'   => 'Surabaya Utara',
            'east'    => 'Surabaya Timur',
            'south'   => 'Surabaya Selatan',
            'west'    => 'Surabaya Barat',
            'central' => 'Surabaya Pusat',
        ];
        $tipsMap = [
            'relaxed'   => 'Mulai hari lebih awal untuk menghindari antrean, bawa air minum, dan nikmati setiap tempat tanpa terburu-buru.',
            'culture'   => 'Kenakan pakaian sopan saat mengunjungi situs religi. Bawa uang tunai untuk tiket masuk dan donasi.',
            'culinary'  => 'Coba kuliner di pagi dan siang hari saat warung paling ramai dan segar. Rujak, lontong balap, dan soto lamongan adalah must-try!',
            'adventure' => 'Kenakan alas kaki yang nyaman, bawa sunscreen, dan patuhi aturan di setiap lokasi.',
        ];

        $itinerary = [
            'title'    => ($styleLabels[$style] ?? 'Trip') . ' — ' . ($areaLabels[$area] ?? 'Surabaya'),
            'subtitle' => $days . ' hari · ' . ($budget === 'budget' ? 'Budget-friendly' : ($budget === 'comfort' ? 'Comfort' : 'Mid-range')) . ' · ' . ($areaLabels[$area] ?? ''),
            'days'     => $dayChunks,
            'tips'     => $tipsMap[$style] ?? null,
        ];

        return view('plan-your-trip.index', compact('itinerary'));
    }

    public function nature()
    {
        $items = Destination::whereHas('regency', fn($q) => $q->where('name', 'like', '%Surabaya%'))
            ->inRandomOrder()->take(12)->get();
        return view('plan-your-trip.show_category', ['title' => 'Nature Escape', 'items' => $items]);
    }

    public function culture()
    {
        $items = Destination::whereHas('regency', fn($q) => $q->where('name', 'like', '%Surabaya%'))
            ->inRandomOrder()->take(12)->get();
        return view('plan-your-trip.show_category', ['title' => 'Culture & Heritage', 'items' => $items]);
    }

    public function culinary()
    {
        $items = Destination::whereHas('regency', fn($q) => $q->where('name', 'like', '%Surabaya%'))
            ->inRandomOrder()->take(12)->get();
        return view('plan-your-trip.show_category', ['title' => 'Culinary Journey', 'items' => $items]);
    }
}