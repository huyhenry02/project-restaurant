<?php

namespace App\Http\Controllers\Message;

use App\Modules\Message\Message;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class MessageController extends BaseController
{
    public function show_list_message(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $message = Message::all();
        $messageCount = Message::count();
        return view('employee.page.message.list',['message'=>$message,'messageCount'=>$messageCount]);
    }

    public function create_message(Request $request)
    {
        try {
            DB::beginTransaction();
            $message = new Message();
            $message->name_customer = $request['name_customer'];
            $message->email = $request['email'];
            $message->subject = $request['subject'];
            $message->message = $request['message'];
            $message->save();
            DB::commit();
            return redirect()->back()->with('success','Cảm ơn đã phản hồi nhà hàng chúng tôi');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
