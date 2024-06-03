<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class PropertyExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $property = Property::active()->get();

        return $property;
        
    }
    
    public function map($property): array
    {
        return [
            optional($property->category)->name,
            $property->name,
            $property->price,
            $property->furnished_type !== null ? ($property->furnished_type == 0 ? __('message.unfurnished') : ($property->furnished_type == 1 ? __('message.fully') : ($property->furnished_type == 2 ? __('message.semi') : null))) : null,
            $property->saller_type !== null ? ($property->saller_type == 0 ? __('message.owner') : ($property->saller_type == 1 ? __('message.broker') : ($property->saller_type == 2 ? __('message.builder') : null))) : null,
            $property->property_for !== null ? ($property->property_for == 0 ? __('message.rent') : ($property->property_for == 1 ? __('message.sell') : ($property->property_for == 2 ? __('message.pg_co_living') : null))) : null,
            $property->price_duration,
            $property->age_of_property,
            $property->maintenance,
            $property->security_deposit,
            $property->brokerage,
            $property->bhk,
            $property->sqft,
            $property->description,
            $property->country,
            $property->state,
            $property->city,
            $property->latitude,
            $property->longitude,
            $property->address,
            $property->video_url,
            $property->status!== null ? ($property->status == 0 ? __('message.inactive') : ($property->status == 1 ? __('message.active') : null)) : null

        ];
    }

    public function headings(): array
    {
        return [
            __('message.category'),
            __('message.name'),
            __('message.price'),
            __('message.furnished_type'),
            __('message.saller_type'),
            __('message.property_for'),
            __('message.price_duration'),
            __('message.age_of_property'),
            __('message.maintenance'),
            __('message.security_deposit'),
            __('message.brokerage'),
            __('message.bhk'),
            __('message.sqft'),
            __('message.description'),
            __('message.country'),
            __('message.state'),
            __('message.city'),
            __('message.latitude'),
            __('message.longitude'),
            __('message.address'),
            __('message.video_url'),
            __('message.status'),
        ];
    }
  
}