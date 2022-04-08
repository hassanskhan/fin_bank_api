<?php

namespace App\Http\Controllers;

use App\FinapiService\FinapidbService;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\FinapiService\FinapiService;
use Illuminate\Support\Facades\Redirect;

class FinapiController extends Controller
{
    public function generateTokken(FinapiService $finapiservice)
    {

        $clientToken = $finapiservice->accessToken();
        return response()->json($clientToken);

    }
         public function createUser(FinapiService $finapiService)
         {

         $usercreate = $finapiService->createUser();
         return $usercreate;
         }
    public function genUserTokken(FinapiService $finapiService)
    {

         $userTokken = $finapiService->generateUsertokken();
         return $userTokken;
    }
    public function storeaccessToken(FinapidbService $finapidbService,FinapiService $finapiService)
    {
         $finapiService->generateUsertokken();
         $storeToken = $finapidbService->createOrUpdateAccessToken();
         return redirect()->back()->with('status','Tokken Generate successfully');
    }
    public function home(FinapiService $finapiService)
    {
        $getBankaccounts =$finapiService->getBankacc();
        return view('home',compact('getBankaccounts'));
    }
    public function showbankDetails(FinapidbService $finapidbService)
    {
        $getBanks = $finapidbService->getBanks();
        return view('BankDetails',compact('getBanks'));
    }

    public function newBankconn(Request $request, FinapiService $finapiService)
    {
        $getBankconnections = $finapiService->userImportconn($request->bankId);
        return Redirect($getBankconnections['url']);
    }
    public function getaccounts(FinapiService $finapiService)
    {
         $getBankacc =$finapiService->getBankacc();
         return $getBankacc;
    }

    public function getAndstoreBanks(FinapidbService $finapidbService){

        $apiBanks = $finapidbService->banksStoreindb();
    //    dd($apiBanks);
         foreach ($apiBanks['banks'] as $apiBank)
         {
             Bank::create([

                 'bank_id' => $apiBank['id'],
                 'bank_name' => $apiBank['name'],

             ]);

         }
         return "successfully stored";

    }
}
