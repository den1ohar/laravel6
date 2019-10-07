<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Receipt;

class ReceiptController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        $url = Storage::url($receipt->path);

        return "<img src='$url'>";
    }
}
