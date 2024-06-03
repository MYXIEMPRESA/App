<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'username', 'contact_number', 'email_verified_at', 'address', 'user_type', 'player_id', 'last_notification_seen', 'status', 'uid', 'login_type', 'display_name', 'timezone', 'is_subscribe', 'view_limit_count' ,'add_limit_count', 'advertisement_limit', 'is_agent', 'is_builder'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_subscribe'  => 'integer',
        'is_agent'      => 'integer',
        'is_builder'    => 'integer',
        'add_limit_count'   => 'integer',
        'view_limit_count'  => 'integer',
        'advertisement_limit'   => 'integer',
    ];

    public function scopeAdmin($query) {
        return $query->where('user_type', 'admin')->first();
    }

    public function property() {
        return $this->hasMany(Property::class, 'added_by', 'id');
    }

    public function scopeGetUser($query, $user_type=null)
    {
        $auth_user = auth()->user();

        if( $auth_user->hasAnyRole(['admin']) ) {
            $query->where('user_type', $user_type)->where('status','active');
            return $query;
        }
    }

    public function routeNotificationForOneSignal()
    {
        return $this->player_id;
    }

    protected static function boot(){
        parent::boot();
        static::deleted(function ($row) {
            $row->property()->delete();  
        });
    }

    public function ScopeUserlist($query){
        $user = auth()->user();
        if(in_array($user->user_type, ['user','agent'])) {
            return $query;
        }
    }
    public function subscriptionPackage(){
        return $this->hasOne(Subscription::class, 'user_id','id')->where('status',config('constant.SUBSCRIPTION_STATUS.ACTIVE'));
    }

    public function userAdvertisementProperty() {
        return $this->property()->where('advertisement_property', 1);
    }

    public function extraPropertyLimitTransaction() {
        return $this->hasMany(ExtraPropertyLimitTransaction::class, 'user_id', 'id');
    }
    
    public function allSubscriptionPlan() {
        return $this->hasMany(Subscription::class, 'user_id', 'id');
    }

    public function propertyViewHistory() {
        return $this->hasMany(PropertyViewHistory::class, 'customer_id', 'id');
    }
    
}
