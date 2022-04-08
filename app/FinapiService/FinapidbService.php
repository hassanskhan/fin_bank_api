<?php

namespace App\FinapiService;

use App\FinapiConnector\FinapiConnector;
use App\Models\Bank;
use App\Models\Connector;
use http\Env\Request;
use App\FinapiService\ConstantsService;
use Illuminate\Support\Facades\Http;
use PHPUnit\TextUI\XmlConfiguration\Constant;

class FinapidbService
{
    protected $finapiBaseurl = "https://sandbox.finapi.io";
    protected $dbservice;
    public function __construct(FinapiConnector $dbservice){

        $this->dbservice = $dbservice;

    }


    public function createOrUpdateAccessToken(){
        try {

            $response = $this->dbservice->oauth();

            $storeToken = Connector::updateOrCreate(

                ['connector' => ConstantsService::FinapiConnector],
                [
                    'access_token' => $response['access_token'],
                    'expires_in' => $response['expires_in'],
                    'scope' => $response['scope'],
                    'token_type' => $response['token_type'],
                    'refresh_token' => $response['refresh_token'],
                ]);

               return $storeToken;
              }catch (\Exception $e){

                 info('message',[

                'message' =>$e->getMessage()

             ]);

            }
      }

      public function banksStoreindb()
      {
          try {

              $dbAccesstoken = Connector::where('id','1')->value('access_token');

              $getBanks = Http::withHeaders([

                  'Accept' => 'application/json',
                  'Authorization' => 'bearer '.$dbAccesstoken
              ])->get($this->finapiBaseurl . '/api/v1/banks',[

                  'page' => 10,
                  'perPage' => 500

              ])->json();

              return $getBanks;
          }catch (\Exception $e){
              info('message',[
                  'message' => $e->getMessage()
              ]);
          }


      }
    public function getBanks(){

        try {

            $fetchBanks = Bank::all();
            return $fetchBanks;
        }catch (\Exception $e){
            info('message',[

                'message' => $e->getMessage()

            ]);
        }


    }




}
