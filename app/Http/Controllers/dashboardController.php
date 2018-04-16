<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Project;
use App\Payment;
use App\Service;
use App\Tranche;
use App\BancAcount;
/*
use App\TransferMethode;
use App\Rate;
use App\Employee;
*/
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index()
    {
        $expProj = 0; $expServ = 0; $expTotal = 0;
        $costProj = 0; $totalPay = 0; //$totalRest = 0;
        $nbrTranches = 0; $nbrPaydTranches = 0; $nbrRestTranches = 0;
        $nbrGoodPrj = 0; $nbrFalePrj = 0; $nbrNullPrj = 0;
        $nbrBancAcounts = 0; $totalBancAcounts = 0;

        $allExpenses = Expense::all();
        foreach ($allExpenses as $exp){
            $expTotal += $exp->amount;
            $expProj += ($exp->project_id != null) ? $exp->amount : 0;
            $expServ += ($exp->service_id != null) ? $exp->amount : 0;
        }

        $allProjects = Project::with('tranches.payments', 'expenses')->get();
        
        foreach ($allProjects as $prj){
            $costProj += $prj->cost;

            $pays = 0; $exps = 0;
            foreach ($prj->tranches as $tr){
                foreach ($tr->payments as $pay){
                    $pays += $pay->amount;
                }
            }
            foreach ($prj->expenses as $exp){
                $exps += $exp->amount;
            }
            $diff = $pays - $exps;
            $nbrGoodPrj += ($diff > 0) ? 1 : 0;
            $nbrFalePrj += ($diff < 0) ? 1 : 0;
            $nbrNullPrj += ($diff == 0) ? 1 : 0;
        }

        $allPayments = Payment::all();
        foreach ($allPayments as $pay){
            $totalPay += $pay->amount;
        }

        $totalRest = $costProj - $totalPay;
        $benefit = $totalPay - $expTotal;
        $nbrProj = count($allProjects);
        $nbrServ = count(Service::all());

        $allTranches = Tranche::all();
        foreach ($allTranches as $tr){
            $nbrTranches++;
            $nbrPaydTranches += $tr->payed ? 1 : 0;
            $nbrRestTranches += $tr->payed ? 0 : 1;
        }

        $allBancAcounts = BancAcount::all();
        foreach ($allBancAcounts as $bancAcount){
            $totalBancAcounts += $bancAcount->total_amount;
        }
        $nbrBancAcounts = count($allBancAcounts);

        $dashboard = [
            ["name" => "مصاريف الخدمات", "color" => "bg-blue-ebonyclay", "icone" => "icon-wallet", "unit" =>"ريال", "value" => $expServ],
            ["name" => "مصاريف المشاريع", "color" => "bg-purple-studio", "icone" => "icon-credit-card", "unit" =>"ريال", "value" => $expProj],
            ["name" => "إجمالى المبالغ", "color" => "bg-blue", "icone" => "icon-bulb", "unit" =>"ريال", "value" => $costProj],
            ["name" => "الإيرادات المستلمة", "color" => "bg-green", "icone" => "icon-present", "unit" =>"ريال", "value" => $totalPay],
            ["name" => "إجمالى المبالغ المتبقية", "color" => "bg-blue-dark", "icone" => "icon-notebook", "unit" =>"ريال", "value" => $totalRest],
            ["name" => "صافى الربح", "color" => "bg-green-seagreen", "icone" => "icon-calculator", "unit" =>"ريال", "value" => $benefit],
            ["name" => "عدد المشاريع", "color" => "bg-blue-madison", "icone" => "icon-layers", "unit" =>"مشاريع", "value" => $nbrProj],
            ["name" => "عدد الخدمات", "color" => "bg-yellow", "icone" => "icon-magic-wand", "unit" =>"خدمات", "value" => $nbrServ],
            ["name" => "إجمالى عدد الدفعات", "color" => "bg-green", "icone" => "icon-basket-loaded", "unit" =>"دفعات", "value" => $nbrTranches],
            ["name" => "إجمالى عدد الدفعات المستلمة", "color" => "bg-purple-plum", "icone" => "icon-briefcase", "unit" =>"دفعات", "value" => $nbrPaydTranches],
            ["name" => "إجمالى عدد الدفعات المتبقية", "color" => "bg-red-haze", "icone" => "icon-handbag", "unit" =>"دفعات", "value" => $nbrRestTranches],
            ["name" => "المشاريع الناجحة", "color" => "bg-green-meadow", "icone" => "icon-like", "unit" =>"مشاريع", "value" => $nbrGoodPrj],
            ["name" => "المشاريع الخاسرة", "color" => "bg-red", "icone" => "icon-dislike", "unit" =>"مشاريع", "value" => $nbrFalePrj],
            ["name" => "المشاريع المتعادلة", "color" => "bg-grey-mint", "icone" => "icon-anchor", "unit" =>"مشاريع", "value" => $nbrNullPrj],
            ["name" => "عدد حسابات المؤسسة", "color" => "bg-purple-medium", "icone" => "icon-credit-card", "unit" =>"حسابات", "value" => $nbrBancAcounts],
            ["name" => "إجمالى رصيد الحسابات", "color" => "bg-blue-steel", "icone" => "icon-calculator", "unit" =>"ريال", "value" => $totalBancAcounts]
        ];
        //dd($dashboard);
        return view('dashboard', ["dashboard" =>$dashboard]);
    }
}
