<?php

namespace App\FinapiService;

use App\Finapiconnector\FinapiConnector;
use App\Models\Connector;
use http\Client\Response;
use PHPUnit\Exception;

class FinapiService
{

        protected $finapiconn;

        public function __construct(FinapiConnector $finapiconn){
            $this->finapiconn = $finapiconn;

        }
        public function accessToken(){


            try {
                //  $this->finapiconn->index();
                $responseTokken = $this->finapiconn->getAccessToken();
                return $responseTokken;

            }catch (\Exception $e){
                info('message',[

                    'message' =>$e->getMessage()

                ]);
            }

        }
        public function createUser()
        {
            try {

               $returnUser = $this->finapiconn->createNewuser();
               return $returnUser;

            }catch (\Exception $e){

                info('message',[

                    'message'=>$e->getMessage()

                ]);

            }
        }
        public function generateUsertokken()
        {
            try {

                $oauthtokken = $this->finapiconn->oauth();
                return $oauthtokken;

            }catch (\Exception $e){

                info('message',[

                    'message' => $e->getMessage()

                ]);
            }



        }

            public function getBankdetails()
            {
                try {

                   $banks= $this->finapiconn->getBanks();
                    return $banks;

                }
                catch (\Exception $e){

                    info('message',[

                        'message' => $e->getMessage()

                    ]);
                }


            }
      public function userImportconn($bankId){

          try {
              $bankConnection = $this->finapiconn->importBankconn($bankId);

              return $bankConnection;
          }catch (\Exception $e){

              info('message',[

                  'message' => $e->getMessage()
              ]);
          }

      }


      public function getBankacc()
      {
          try {
              $bankacc = $this->finapiconn->getaccounts();
              return $bankacc;
          }catch (\Exception $e){

              info('message',[

                  'message' =>$e->getMessage()
              ]);
          }


      }

}
