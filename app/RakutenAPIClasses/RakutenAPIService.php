<?php
namespace App\RakutenAPIClasses;
use Illuminate\Http\Request;

define("APPLICATION_ID", '1091499237650590309');
define("APPLICATION_SEACRET", 'f0b301d233270b34f41cfc99bb6ec1dbc376ab46');
define("AFFILIATE_ID", '1d5ba2b3.4dfc9799.1d5ba2b4.abffaaa3');
define("ACCESS_URL", 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');

class RakutenAPIService implements RakutenAPIServiceInterface
{
    private $resultAPI;
    public function __construct()
    {

    }
    
    public function ExecuteAPI($info)
    {
        $params = array();
        $params['format']         = 'json';
        $params['applicationId']  = APPLICATION_ID;
        $params['outOfStockFlag'] = '1';
        // $params['application_seacret'] = APPLICATION_SEACRET;
        // $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要

        $requestURL = ACCESS_URL;
        foreach($params as $key => $param){
            $requestURL .= "&{$key}={$param}";
        }
        foreach($info as $key =>$param){
            if(!is_null($param)){
                $requestURL .= "&{$key}={$param}";
            }
        }
        
        $id = 0;
        $infos = array();
        $request = app('Illuminate\Http\Request');

        $apiResult = file_get_contents($requestURL);
        $apiResult = json_decode($apiResult, true);

        if(count($apiResult) != 0){
            foreach($apiResult as $key => $Items){
                if($key == "Items"){
                    foreach($Items as $Item){
                        $info = [
                            'id' => $id,
                            'title' => $Item['Item']['title'],
                            'author' => $Item['Item']['author'],
                            'publisherName' => $Item['Item']['publisherName'],
                        ];
                        array_push($infos, $info);
                        $id++;
                    }
                }
            }
            $pageCount = $apiResult['pageCount'];
            if($pageCount != 1){
                for($page = 2; $page <= $pageCount; $page++){
                    $requestURLpage = $requestURL . "&page=2";
                    $apiResult = file_get_contents($requestURLpage);
                    $apiResult = json_decode($apiResult, true);
                    if(count($apiResult) != 0){
                        foreach($apiResult as $key => $Items){
                            if($key == "Items"){
                                foreach($Items as $Item){
                                    $info = [
                                        'id' => $id,
                                        'title' => $Item['Item']['title'],
                                        'author' => $Item['Item']['author'],
                                        'publisherName' => $Item['Item']['publisherName'],
                                    ];
                                    array_push($infos, $info);
                                    $id++;
                                }
                            }
                        }
                    }
                    if($page == 3) break;
                }
            }
            foreach($infos as $info){
                $request->session()->put($info['id'], $info);
            }
        }
        return $infos;
    }
}