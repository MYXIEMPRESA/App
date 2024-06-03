<?php

namespace App\Imports;

use App\Models\PropertyRequest;
use App\Models\Property;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportProperty implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // \Log::info($row);    
        return new Property([
            'added_by' => auth()->id(),
            'total_view' => 0,
            'name' => $row['name'],
            'price' => $row['price'],
            'furnished_type' => $row['furnished_type'],
            'saller_type'  => $row['saller_type'],
            'property_for'  => $row['property_for'],
            'price_duration'  => in_array( $row['property_for'], [0,2] ) ? $row['price_duration'] : null,
            'age_of_property' => $row['age_of_property'],
            'maintenance' => $row['maintenance'],
            'security_deposit' => $row['security_deposit'],
            'brokerage'  => $row['brokerage'],
            'bhk'  => $row['bhk'],
            'sqft' => $row['sqft'],
            'description' => $row['description'],
            'country' => $row['country'],
            'state' => $row['state'],
            'city' => $row['city'],
            'latitude'  => $row['latitude'],
            'longitude' => $row['longitude'],
            'address' => $row['address'],
            'video_url' => $row['video_url'],
            'status' => $row['status'],

        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
