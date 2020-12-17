<?php

namespace App\Console\Commands;
use App\Models\Refund;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class SendMoney extends Command
{
    protected $signature = 'send:money {limit}';

    protected $description = 'Send money user in bank';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $limit = $this->argument('limit');

        $refunds = Refund::where('status', 0)->limit($limit)->get();

        foreach ($refunds as $refund){
            //api bank


            $refund->status = 1;

            echo "Transfer " . $refund->card;
            $refund->save();
        }
    }
}