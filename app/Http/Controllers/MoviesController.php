<?php

namespace App\Http\Controllers;

use App\Http\Resources\MoviesCollection;
use App\Movies;
use GuzzleHttp\Client;
use HttpException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class MoviesController extends Controller
{
    public function listUpcoming($page=1)
    {
        if ($page == 1) {
            $movies = Movies::take(10)->get();
        } else {
            $movies = Movies::skip(($page-1)*10)->take(10)->get();
        }
        return new MoviesCollection($movies);
    }

    public function findUpcoming($title,$page=1) {
        if ($page == 1) {
            $movies = Movies::where('title', 'LIKE', "%{$title}%")->orWhere('title', 'LIKE', "%{$title}%")->take(10)->get();
        } else {
            $movies = Movies::where('title', 'LIKE', "%{$title}%")->orWhere('title', 'LIKE', "%{$title}%")->skip(($page-1)*10)->take(10)->get();
        }
        return new MoviesCollection($movies);
    }

    public function listTopRated($page=1)
    {
        $client = new Client(['base_uri' => env('API_ENDPOINT', "")]);
        $moviesList["data"] = array();
        try {
            $res = $client->request('GET', "movie/top_rated", [
                'query' => ['api_key' => env('API_KEY', ""),"page" => $page]
            ]);
            if ($res->getStatusCode() == 200) {
                $content = $res->getBody()->getContents();
                $result = json_decode($content,true);
                foreach ($result["results"] as $movie) {
                    array_push($moviesList["data"], $movie);
                }
            }
            return json_encode($moviesList);
        } catch (HttpException $ex) {
            Log::debug($ex);
        }
    }

    public function findMovie($title,$page=1) {
        $client = new Client(['base_uri' => env('API_ENDPOINT', "")]);
        $moviesList["data"] = array();
        try {
            $res = $client->request('GET', "search/movie", [
                'query' => ['api_key' => env('API_KEY', ""),"query"=>$title,"page" => $page,"include_adult" => false]
            ]);
            if ($res->getStatusCode() == 200) {
                $content = $res->getBody()->getContents();
                $result = json_decode($content,true);
                foreach ($result["results"] as $movie) {
                    array_push($moviesList["data"], $movie);
                }
            }
            return json_encode($moviesList);
        } catch (HttpException $ex) {
            Log::debug($ex);
        }
    }
}
