<?php


namespace App\Services;


use Elasticsearch\Client;

class Temperature
{
    private $esClient;
    private $esParams = [];

    public function __construct()
    {
        $this->esClient = $client = app(Client::class);
        $this->esParams['index'] = env('ES_INDEX');
        $this->esParams['type'] = 'temperatures';
    }

    public function index(array $params)
    {
        $size = $params['size'] ?? 1000;

        unset($params['size']);

        if (count($params) > 0) {
            $this->esParams['body'] = [
                'query' => [
                    'match' => $params ?? []
                ]
            ];
        }

        $this->esParams['size'] = $size;
        $temperatures = $this->esClient->search($this->esParams);

        return $temperatures['hits']['hits'];
    }

    public function store(array $params)
    {
        $this->esParams['body'] = $params;
        $this->esParams['refresh'] = true;
        $this->esClient->index($this->esParams);

        return true;
    }
}