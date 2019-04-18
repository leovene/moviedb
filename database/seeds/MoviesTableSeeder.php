<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $client = new Client(['base_uri' => env('API_ENDPOINT', "")]);
        try {
            $res = $client->request('GET', "movie/upcoming", [
                'query' => ['api_key' => env('API_KEY', ""),"page" => 1]
            ]);
            if ($res->getStatusCode() == 200) {
                $content = $res->getBody()->getContents();
                $result = json_decode($content,true);
                $pages = $result["total_pages"];
                $i = 1;
                do {
                    foreach ($result["results"] as $movie) {
                        DB::table('movies')->insert([
                            'vote_count' => $movie["vote_count"],
                            'video' => $movie["video"],
                            'vote_average' => $movie["vote_average"],
                            'title' => $movie["title"],
                            'popularity' => $movie["popularity"],
                            'poster_path' => $movie["poster_path"],
                            'original_language' => $movie["original_language"],
                            'original_title' => $movie["original_title"],
                            'genre_ids' => implode(",",$movie["genre_ids"]),
                            'backdrop_path' => $movie["backdrop_path"],
                            'adult' => $movie["adult"],
                            'overview' => $movie["overview"],
                            'release_date' => $movie["release_date"]
                        ]);
                    }
                    $res = $client->request('GET', "movie/upcoming", [
                        'query' => ['api_key' => env('API_KEY', ""),"page" => ++$i]
                    ]);
                    $content = $res->getBody()->getContents();
                    $result = json_decode($content,true);
                } while ($i <= $pages);
            }
        } catch (HttpException $ex) {
            Log::debug($ex);
        }
    }
}
