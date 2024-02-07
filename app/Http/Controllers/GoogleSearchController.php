<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;

class GoogleSearchController extends Controller
{
    public function index()
    {
        return view('google_search');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $query = str_replace(' ', '+', $query);

        $url = 'https://www.google.com/search?q=' . urlencode($query);

        $html = HtmlDomParser::file_get_html($url);

        $top10Urls = [];

        if ($html) {
            $results = [];

            // Find the search result links
            $links = $html->find('a');

            // Iterate through the links and extract the URLs
            foreach ($links as $link) {
                $url = $link->href;

                // Filter out unwanted URLs (you may need to customize this based on your needs)
                if (strpos($url, '/url?q=') === 0) {
                    $url = urldecode(substr($url, 7));
                    $results[] = $url;
                }
            }

            // Get the top 10 URLs
            $top10Urls = array_slice($results, 0, 10);
        }

        return view('google_results', compact('top10Urls'));
    }
}
