<?php

namespace App\Controllers;

class StreamController extends BaseController
{
    private function getActiveStreamNames(): array
    {
        $context = stream_context_create([
            'http' => ['timeout' => 2]
        ]);

        $response = @file_get_contents(
            'http://streaming:8080/stat',
            false,
            $context
        );

        if ($response === false) {
            return [];
        }

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($response);
        libxml_clear_errors();

        if ($xml === false) {
            return [];
        }

        $activeStreams = [];

        foreach ($xml->server->application as $application) {
            foreach ($application->live->stream as $stream) {
                if (isset($stream->name)) {
                    $activeStreams[] = (string) $stream->name;
                }
            }
        }

        return $activeStreams;
    }

    private function getStreams(): array
    {
        return [
            [
                'id' => '1',
                'streamKey' => 'test',
                'title' => 'Ranked matches',
                'creator' => 'Ninja',
                'category' => 'Fortnite',
                'description' => 'Partidas competitivas y ranked',
                'color' => '#6246ea',
                'icon' => 'fa-gamepad',
            ],
            [
                'id' => '2',
                'streamKey' => 'shroud',
                'title' => 'Road to Global',
                'creator' => 'Shroud',
                'category' => 'Counter-Strike 2',
                'description' => 'Competición y partidas tácticas',
                'color' => '#d97706',
                'icon' => 'fa-crosshairs',
            ],
            [
                'id' => '3',
                'streamKey' => 'ibai',
                'title' => 'Just Chatting',
                'creator' => 'Ibai',
                'category' => 'Just Chatting',
                'description' => 'Charlando con la comunidad',
                'color' => '#0891b2',
                'icon' => 'fa-comments',
            ],
            [
                'id' => '4',
                'streamKey' => 'pokimane',
                'title' => 'Competitive gameplay',
                'creator' => 'Pokimane',
                'category' => 'Valorant',
                'description' => 'Gameplay competitivo',
                'color' => '#be185d',
                'icon' => 'fa-crosshairs',
            ],
            [
                'id' => '5',
                'streamKey' => 'rubius',
                'title' => 'Survival adventure',
                'creator' => 'Rubius',
                'category' => 'Minecraft',
                'description' => 'Aventura y supervivencia',
                'color' => '#15803d',
                'icon' => 'fa-cube',
            ],
        ];
    }

    public function index()
    {
        $activeStreamNames = $this->getActiveStreamNames();
        $streams = $this->getStreams();

        foreach ($streams as &$stream) {
            $stream['live'] = in_array(
                $stream['streamKey'],
                $activeStreamNames,
                true
            );
        }
        unset($stream);

        $categories = [
            'Fortnite',
            'Valorant',
            'Counter-Strike 2',
            'Just Chatting',
            'Minecraft',
        ];

        $selectedCategory = $this->request->getGet('category');

        if ($selectedCategory !== null && $selectedCategory !== '') {
            $streams = array_filter(
                $streams,
                static fn ($stream) =>
                    strcasecmp($stream['category'], $selectedCategory) === 0
            );
        }

        return view('streams/index', [
            'pageTitle' => 'Live Streams | Level Up Live',
            'streams' => array_values($streams),
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'totalStreams' => count($this->getStreams()),
        ]);
    }

    public function watch($id)
    {
        return view('streams/player', [
            'pageTitle' => 'Watch Stream | Level Up Live',
            'streamId' => $id,
        ]);
    }
}