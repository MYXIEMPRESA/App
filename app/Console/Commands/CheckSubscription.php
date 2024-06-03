<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Subscription;

class CheckSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check subscription';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user_list = User::where('is_subscribe', 1)->with('subscriptionPackage')->get();
        foreach ($user_list as $key => $user) {
            $subscription = Subscription::where('user_id', $user->id)->where('status', config('constant.SUBSCRIPTION_STATUS.ACTIVE'))->first();
            $subscription_end_at = date('Y-m-d', strtotime(optional($user->subscriptionPackage)->subscription_end_date));
            $today_date = date('Y-m-d');
            if(strtotime($subscription_end_at) < strtotime($today_date)) {
                // info('subscription-expire:-'.$user->id);
                
                $user->update([
                    'view_limit_count'      => null,
                    'add_limit_count'       => null,
                    'advertisement_limit'   => null,
                    'is_subscribe'          => 0,
                ]);

                $subscription->status = config('constant.SUBSCRIPTION_STATUS.INACTIVE');
                $subscription->save();

                $user->extraPropertyLimitTransaction()->where('subscription_id', $subscription->id)->update([
                    'status' => 'inactive'
                ]);
                $user->userAdvertisementProperty()->update([
                    'advertisement_property'        => NULL,
                    'advertisement_property_date'   => NULL,
                ]);
            }
            // info('No subscriber');
        }
    }
}
