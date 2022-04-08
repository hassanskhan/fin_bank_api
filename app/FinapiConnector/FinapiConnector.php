<?php

namespace App\FinapiConnector;

use App\Models\Bank;
use Carbon\Carbon;
use http\Env\Request;
use http\Env\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Connector;
class FinapiConnector
{
    protected $finapiBaseurl = "https://sandbox.finapi.io";
    protected $finapiWebfomurl = "https://webform-sandbox.finapi.io";

        public function getAccessToken(){

                $response = Http::asForm()->post($this->finapiBaseurl .'/oauth/token',[

                        'grant_type' => 'client_credentials',
                        'client_id' => env('Finapi_APP_CLIENT_ID'),
                        'client_secret' => env('Finapi_APP_CLIENT_SECRET'),
                ])->json();

                return $response;



        }

        public function createNewuser(){

            $response = Http::withHeaders([

                'Content-Type' => 'application/json',
                'Authorization'  => 'bearer '.'s_eBwdLfoNDh0UwDgyCBTRpKUcw7TIfEPBFSMqUFkc26hOFgRlYrryEPJjct8tCFzWVMjk3wztE1zmp50Tv3kNTplZhBiaFaP3tN1b6_K2gNX3wIt4brJ2LokGlXKk7J'
            ])->post($this->finapiBaseurl .'/api/v1/users',[

                "id" =>"softPers",
                  "password" => "112233hk",
                  "email" => "hk147471@gmail.com",
                  "phone" => "+92484348709",
                  "isAutoUpdateEnabled" => true

                ])->json();

                return $response;

        }

        public function oauth(){

            $response = Http::asForm()->post($this->finapiBaseurl .'/oauth/token',[

                'grant_type' => 'password',
                'client_id' => env('Finapi_APP_CLIENT_ID'),
                'client_secret' => env('Finapi_APP_CLIENT_SECRET'),
                'username' => 'softPers',
                'password' =>  '112233hk',

            ])->json();

            return $response;
        }


      public function importBankconn($bankId){
          $dbAccesstoken = Connector::where('id','1')->value('access_token');
          //dd($dbAccesstoken);
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.$dbAccesstoken,
            ])->post($this->finapiWebfomurl.'/api/webForms/bankConnectionImport',[
                "bank" => [
                    'id' => (int)$bankId,
                ],
                "bankConnectionName" => 'My bank connection',
                'skipPositionsDownload' => false,
                'loadOwnerData' => false,
                'maxDaysForDownload' => 3650,
                "accountTypes" => [
                    'CHECKING',
                    'SAVINGS',
                    'CREDIT_CARD',
                    'SECURITY',
                    'MEMBERSHIP',
                    'LOAN',
                    'BAUSPAREN',
                ],
                'callbacks' => [
                    'finalised' => 'https://dev.finapi.io/callback?state=42'
                ],

               // "redirectUrl" => 'https://www.goolge.com/',

            ])->json();

             return $response;

        }

        public function getaccounts()
        {
            $dbAccesstoken = Connector::where('id','1')->value('access_token');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$dbAccesstoken,
            ])->get($this->finapiBaseurl .'/api/v1/accounts')->json();

            return $response;

        }


}
