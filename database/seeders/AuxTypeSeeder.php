<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AuxType;

class AuxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intervals = [
            [    
                'aux_type' => 'Time In',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Time Out',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'First 15 Mins',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Second 15 Mins',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Meeting Time In',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Meeting Time Out',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Coaching',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'BIO Break',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Huddle',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Wellness',
                'created_by' => '1',
                'modified_by' => '1', 
            ], [    
                'aux_type' => 'Moderation',
                'created_by' => '1',
                'modified_by' => '1', 
            ]
        ];

        foreach ($intervals as $interval) {
            $exisAuxType = AuxType::where('aux_type',$interval['aux_type'])->first();

            if (! $exisAuxType) {
                AuxType::create($interval);
            }
        }
    }
}
