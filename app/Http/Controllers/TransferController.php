<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\BancAcount;

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return redirect()->route('settings');
    }

    public function show($transferId)
    {
        $transfer = Transfer::findOrFail($pransferId);
        dd($pransfer);
    }

    public function create()
    {
        return redirect()->route('settings');
    }

    public function store()
    {
        $transfer = Transfer::create([
            'banc_acount_from_id' => input::get('banc_acount_from_id'),
            'banc_acount_to_id' => input::get('banc_acount_to_id'),
            'transfer_amount' => input::get('transfer_amount'),
            'percent_id' => input::get('percent_id'),
            'total_amount' => input::get('total_amount'),
            'file' => input::get('___')
            ]);
            
        $transfer->AcountFrom->total_amount -= $transfer->total_amount;
        $transfer->AcountFrom->save();

        $transfer->AcountTo->total_amount += $transfer->total_amount;
        $transfer->AcountTo->save();

        return redirect()->route('settings');
    }

    public function edit($transferId)
    {
        return redirect()->route('editTransfer', ["transferId" => $transferId]);
    }

    public function update($transferId)
    {
        $transfer = Transfer::findOrFail($transferId);
        /*
        $file = input::get('___');
        $transfer->fill([
            'banc_acount_from_id' => input::get('banc_acount_from_id'),
            'banc_acount_to_id' => input::get('banc_acount_to_id'),
            'transfer_amount' => input::get('transfer_amount'),
            'percent_id' => input::get('percent_id'),
            'total_amount' => input::get('total_amount'),
            'file' => (is_null($file) || empty($file) || strlen($file)) ? $transfer->file : $file
            ]);
        $transfer->save();
        */
        return redirect()->route('settings');
    }

    public function destroy($transferId)
    {
        $transfer = Transfer::findOrFail($transferId);

        $transfer->AcountFrom->total_amount += $transfer->total_amount;
        $transfer->AcountFrom->save();

        $transfer->AcountTo->total_amount -= $transfer->total_amount;
        $transfer->AcountTo->save();

        $transfer->delete();
        return redirect()->route('settings');
    }
}
