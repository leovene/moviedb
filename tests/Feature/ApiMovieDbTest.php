<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Tests\TestCase;

class ApiMovieDbTest extends TestCase
{
    private $http;

    public function setUp(): void
    {
        parent::setUp();
        $this->http = new Client(['base_uri' => env('API_ENDPOINT', "")]);
    }

    public function testPingMovieDbApi()
    {
        $response = $this->http->request('GET', 'movie/upcoming',[
            'query' => ['api_key' => env('API_KEY', "")]
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->http = null;
    }
}
