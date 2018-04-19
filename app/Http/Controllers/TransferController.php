<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\BancAcount;

//use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return redirect()->route('settings'); }

    public function show($transferId) {
        $transfer = Transfer::findOrFail($pransferId);
        dd($pransfer);
    }

    public function create() {
        return redirect()->route('settings');
    }

    public function store(Request $request) {
        if($this->canDo("SetAt")){
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files/transfers', $name);

            $transfer = Transfer::create([
                'banc_acount_from_id' => $request->input('banc_acount_from_id'),
                'banc_acount_to_id' => $request->input('banc_acount_to_id'),
                'transfer_amount' => $request->input('transfer_amount'),
                'percent_id' => $request->input('percent_id'),
                'total_amount' => $request->input('total_amount'),
                'file' => $name
                ]);
                
            $transfer->AcountFrom->total_amount -= $transfer->total_amount;
            $transfer->AcountFrom->save();

            $transfer->AcountTo->total_amount += $transfer->total_amount;
            $transfer->AcountTo->save();
        }
        return redirect()->route('settings');
    }

    public function edit($transferId)
        { return redirect()->route('editTransfer', ["transferId" => $transferId]); }

    public function update($transferId, Request $request) {
        $transfer = Transfer::findOrFail($transferId);

        $name = "";
        if(!is_null($request->file('upload'))){
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files/transfers', $name);
        }

        return redirect()->route('settings');
    }

    public function destroy($transferId) {
        $transfer = Transfer::findOrFail($transferId);

        $transfer->AcountFrom->total_amount += $transfer->total_amount;
        $transfer->AcountFrom->save();

        $transfer->AcountTo->total_amount -= $transfer->total_amount;
        $transfer->AcountTo->save();

        $transfer->delete();
        return redirect()->route('settings');
    }

    private function canDo($section){
        $permissions = unserialize(Auth::user()->permissions)["SetPerms"];
        return $permissions["$section"];
    }
}
