<?php

namespace App\Http\Services\Spiders\Maltapi;

class SpiderFactory {

    private $typeMape = [
        'ahks' => 'ahks'
    ];

    private $url;

	private $params = [
		'code' => '',
		'rows' => 5,
		'format' => 'json',
		'token' => '138DB436F537B7E7',
	];

	public function __construct()
	{
		$this->url = config('setting.maltapi.host');
	}

	public function setToken($token)
	{
		$this->params['token'] = $token;
	}

	public function handle()
	{
		$client = new \GuzzleHttp\Client();

		$res = $client->request('GET', $this->url, ['query' => $this->params]);
		$res = $res->getBody()->getContents();

		$res = str_replace(["}{", "\t","\n"], ["},{", "",""], $res);print_r($res);exit;
		$res = json_decode($res, true);
		
		return $this->translate($res['data'] ?? []);
	}

	public function translate($data)
	{
		if (empty($data)) return null;

		$result = new SpiderResult();
		$current = current($data);
		$result->setPeriod($current['expect'] ?? '');
		$result->setOpenTime($current['opentime'] ?? '');
		$result->setCode($current['opencode'] ?? '');
		$result->setSpiderTime(date('Y-m-d H:i:s'));

		return $result;
    }
    
    private function tokenError($msg) {
        return $msg == '彩种错误.';
    }

    private function updateToken() {
        
    }
}