<?php
namespace App\Classes;

use Illuminate\Support\Facades\Http;

class RickAndMortyApi
{
    const baseUrl = 'https://rickandmortyapi.com/api/';
    const METHOD_GET = 'get';

    /**
     * Request data. Returns FALSE on error or result array data on success
     * @param $path
     * @param string $method
     * @return array|false
     */
    public function getData ($path = '', $page = null, $method = self::METHOD_GET)
    {
        $page = $page ? '?page='.$page : null;
        $url = self::baseUrl . $path . $page;
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        /** @var Response $response */
        $response = Http::withoutVerifying()->withHeaders($headers)->{$method}($url);
        return (isset($response['error']) || empty($response) ? null : $response);
    }
}
