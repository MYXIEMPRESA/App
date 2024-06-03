<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [ 'name', 'category_id', 'price', 'furnished_type', 'saller_type', 'property_for', 'price_duration', 'age_of_property', 'maintenance', 'security_deposit', 'brokerage', 'bhk', 'sqft', 'description', 'country', 'state', 'city', 'latitude', 'longitude', 'address', 'video_url', 'status', 'premium_property', 'added_by', 'total_view', 'advertisement_property', 'advertisement_property_date'];
    
    protected $casts = [
        'category_id'      => 'integer',
        'furnished_type'   => 'integer',
        'saller_type'      => 'integer',
        'property_for'     => 'integer',
        'bhk'              => 'integer',
        'added_by'         => 'integer',
        'total_view'       => 'integer',
        'premium_property' => 'integer',
        'advertisement_property' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }

    public function userFavouriteProperty()
    {
        return $this->hasMany(UserFavouriteProperty::class, 'property_id', 'id');
    }

    public function userInquiredProperty()
    {
        return $this->hasMany(PropertyViewHistory::class, 'property_id', 'id');
    }

    public function scopeFavouiteProperty($query)
    {
        $user = auth()->user();

        if($user){
            $query = $query->whereHas('userFavouriteProperty', function ($q) use($user) {
                $q->where('user_id', $user->id);
            });
        }

        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOtherProperty($query, $status = 1)
    {
        return $query->where('added_by','!=' , auth()->id())->where('status', $status);
    }

    public function scopeMyProperty($query)
    {
        $user = auth()->user();

        if($user->hasRole('admin') || $user->hasRole('demo_admin')) {
            return $query;
        }

        if( $user->hasRole('user') ) {
            return $query->where('added_by', $user->id);
        }

        return $query;
    }

    public function scopeOtherAdvertiseProperty($query)
    {
        return $query->where('added_by','!=' , auth()->id())->where('advertisement_property', 1);
    }

    public function propertyAmenity()
    {
        return $this->hasMany(PropertyAmenity::class, 'property_id', 'id');
    }

    public function scopeNearByProperty($query, $latitude, $longitude)
    {
        $radius = SettingData('DISTANCE', 'DISTANCE_RADIUS') ?? 3;
        $distance_unit_value = SettingData('DISTANCE', 'DISTANCE_UNIT') ?? 'km';
        $unit_value = convertUnitvalue($distance_unit_value);

        $haversine = "( $unit_value * ACOS(COS(RADIANS($latitude)) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS($longitude)) + SIN(RADIANS($latitude)) * SIN(RADIANS(latitude))))";

        $query = $query
            ->selectRaw("*, $haversine AS distance")
            ->whereRaw("$haversine < $radius")
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->where('status', 1)
            ->orderBy('distance', 'asc');
            
        $query->when(request('city'), function ($q) {
            return $q->where('city',request('city'));
        });

        return $query;
    }

    public function slider()
    {
        return $this->hasMany(Slider::class, 'property_id', 'id');
    }

    protected static function boot(){
        parent::boot();
        static::deleted(function ($row) {
            $row->propertyAmenity()->delete();
            $row->userFavouriteProperty()->delete();
            $row->userInquiredProperty()->delete();
            $row->slider()->delete();
        });
    }
}