<?php

namespace App\Jobs;

use App\Mail\SendPesananBaru;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobPesananBaru implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $detail;
    protected $to;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($detail, $to)
    {
        $this->detail = $detail;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pesanan_baru = new SendPesananBaru($this->detail);
        Mail::to($this->to)->send($pesanan_baru);
    }
}
