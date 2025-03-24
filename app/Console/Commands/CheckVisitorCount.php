<?php

namespace App\Console\Commands;

use App\Models\Visitor;
use Illuminate\Console\Command;
use App\Notifications\VisitorCountIncreased;
use Illuminate\Support\Facades\Notification;
use App\Models\User; // Assuming you have a User model for admins

class CheckVisitorCount extends Command
{
    protected $signature = 'visitors:check';

    protected $description = 'Check visitor count and send notification if increased';

    private $lastVisitorCount = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $visitorCount = Visitor::count();

        if ($visitorCount > $this->lastVisitorCount) {
            $admins = User::where('is_admin', true)->get(); // Adjust the query as needed

            Notification::send($admins, new VisitorCountIncreased($visitorCount));

            $this->lastVisitorCount = $visitorCount;
        }

        return Command::SUCCESS;
    }
}
