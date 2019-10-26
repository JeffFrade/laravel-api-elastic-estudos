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

        $this->esParams['body'] = [
            'query' => [
                'match' => $params ?? []
            ]
        ];

        $this->esParams['size'] = $size;

        return $this->esClient->search($this->esParams);
    }

    public function store(array $params)
    {
        $temperatures = $this->esClient->search($this->esParams);
        $id = count($temperatures['hits']['hits']) + 1;

        $this->esParams['id'] = $id;
        $this->esParams['body'] = $params;
        $this->esParams['refresh'] = true;
        $this->esClient->create($this->esParams);

        return true;
    }
}