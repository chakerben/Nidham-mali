<?php

namespace App\Http\Controllers;

use App\Settings;
use App\ExpenseType;
use App\TransferMethode;
use App\Transfer;
use App\Role;
use App\Rate;
use App\BancAcount;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index($rate = false)
    {
        //$this->canDo("ExpD");
        //Récupère tout les settings
        $settings = [];     $result = Settings::all();
        foreach ($result as $key => $value){
            $settings[$value->name] = $value->value;
        }
        //Récupère tout les types de dépenses
        $expenseTypes = ExpenseType::all();
        //Récupère tout les methodes de transfer
        $transferMethodes = TransferMethode::all();
        //Récupère tout les roles
        $roles = Role::all();
        //Récupère tout les comptes
        $acounts = BancAcount::all();
        //Récupère tout les noms des banques
        $banks = BancAcount::distinct()->get(['bank_name']);
        //Récupère tout les rates (pourcentages)
        $rates = Rate::all();
        //Récupère tout les comptes
        $transfers = Transfer::all();

        return view('Settings.index', ["settings" => $settings, "expenseTypes" => $expenseTypes, "roles" => $roles,
            "transferMethodes" => $transferMethodes, "acounts" => $acounts, "rates" => $rates, "transfers" => $transfers,
            "banks" => $banks]);
    }

    public function setSetting()
    {
        if($this->canDo("SetAg") || $this->canDo("SetUg")){
            $inputs = Input::except('_token');
            foreach ($inputs as $key => $value){
                $setting = Settings::find($key);
                if ($setting === null) {
                    $setting = Settings::create(['name' => $key, 'value' =>  $value]);
                } else {
                    $setting->fill(['value' => $value]);
                    $setting->save();
                }
            }
        }
        return redirect()->route('settings');
    }

    public function createRole()
    {
        if(input::get('newRole') != "")
            $methode = Role::create([ 'name' => input::get('newRole') ]);
        return redirect()->route('settings');
    }

    public function createExpenseType()
    {
        if(input::get('newType') != "")
            $methode = ExpenseType::create([ 'name' => input::get('newType') ]);
        return redirect()->route('settings');
    }

    public function createTransferMethode()
    {
        if(input::get('newMethode') != "")
            $methode = TransferMethode::create([ 'name' => input::get('newMethode') ]);
        return redirect()->route('settings');
    }

    public function createBankAcount(){
        if($this->canDo("SetAa")){
            $acount = BancAcount::create([
                'bank_name' => input::get('bank_name'),
                'count_num' => input::get('count_num'),
                'init_amount' => input::get('init_amount'),
                'total_amount' => input::get('init_amount'),
                'iban' => input::get('iban'),
                'percent_name' => input::get('percent_name'),
                'percent_valu' => input::get('percent_valu')
                ]);
            }
        return redirect()->route('settings');
    }

    public function createRate() {
        if($this->canDo("SetAr")){
            $acount = Rate::create([
                'name' => input::get('name'),
                'value' => input::get('value'),
                'remarques' => input::get('remarques')
                ]);
        }
        return redirect()->route('settings');
    }

    public function deleteRate($rateId){
        $rate = Rate::findOrFail($rateId);
        $rate->delete();
        return redirect()->route('settings');
    }

    public function editRate($rateId){ 
        //Récupère tout les settings
        $settings = [];     $result = Settings::all();
        foreach ($result as $key => $value){
            $settings[$value->name] = $value->value;
        }
        //Récupère tout les types de dépenses
        $expenseTypes = ExpenseType::all();
        //Récupère tout les methodes de transfer
        $transferMethodes = TransferMethode::all();
        //Récupère tout les roles
        $roles = Role::all();
        //Récupère tout les comptes
        $acounts = BancAcount::all();
        //Récupère tout les noms des banques
        $banks = BancAcount::distinct()->get(['bank_name']);
        //Récupère tout les rates (pourcentages)
        $rates = Rate::all();
        //Récupère tout les comptes
        $transfers = Transfer::all();
        //Récupère le rate (pourcentage) a éditere
        $rateToEdit = $rateId ? Rate::findOrFail($rateId) : null;

        return view('Settings.index', ["settings" => $settings, "expenseTypes" => $expenseTypes, "roles" => $roles,
            "transferMethodes" => $transferMethodes, "acounts" => $acounts, "rates" => $rates,
            "transfers" => $transfers, "banks" => $banks, "rateToEdit" => $rateToEdit]);
    }

    public function updateRate($rateId){
        $rate = Rate::find($rateId);
        $rate->fill([
            'name' => input::get('name'),
            'value' => input::get('value'),
            'remarques' => input::get('remarques')
        ]);
        $rate->save();
        return redirect()->route('settings');
    }

    public function editTransfer($transferId){ 
        //Récupère tout les settings
        $settings = [];     $result = Settings::all();
        foreach ($result as $key => $value){
            $settings[$value->name] = $value->value;
        }
        //Récupère tout les types de dépenses
        $expenseTypes = ExpenseType::all();
        //Récupère tout les methodes de transfer
        $transferMethodes = TransferMethode::all();
        //Récupère tout les roles
        $roles = Role::all();
        //Récupère tout les comptes
        $acounts = BancAcount::all();
        //Récupère tout les noms des banques
        $banks = BancAcount::distinct()->get(['bank_name']);
        //Récupère tout les rates (pourcentages)
        $rates = Rate::all();
        //Récupère tout les comptes
        $transfers = Transfer::all();
        //Récupère le rate (pourcentage) a éditere
        $transferToEdit = $transferId ? Transfer::findOrFail($transferId) : null;

        return view('Settings.index', ["settings" => $settings, "expenseTypes" => $expenseTypes, "roles" => $roles,
            "transferMethodes" => $transferMethodes, "acounts" => $acounts, "rates" => $rates,
            "transfers" => $transfers, "banks" => $banks, "transferToEdit" => $transferToEdit]);
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["SetPerms"];
        //dd($permissions);
        return $permissions["$section"];
    }
}
