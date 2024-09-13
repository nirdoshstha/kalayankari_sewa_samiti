<?php

namespace Database\Seeders;

use App\Models\OurService;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurService::truncate();
        $parent_menu_list =[
            [ 
            'title' =>'About Us', 
            'slug' =>'about-us',
            'design' =>'default',
            'rank' =>'1', 
            'created_by'=> User::first()->id,
            ],
            [ 
            'title' =>'Message', 
            'slug' =>'message',
            'design' =>'default',
            'rank' =>'2', 
            'created_by'=> User::first()->id,
            ],
            [ 
            'title' =>'School Life', 
            'slug' =>'school-life',
            'design' =>'school-life',
            'rank' =>'3', 
            'created_by'=> User::first()->id,
            ],
        ];

            $about_child_list =[
                [ 
                'title' =>'Introduction', 
                'slug' =>'introduction',
                'design' =>'about',
                'rank' =>'1', 
                'created_by'=> User::first()->id,
                ],
                [ 
                'title' =>'Mission', 
                'slug' =>'mission',
                'design' =>'about',
                'rank' =>'2', 
                'created_by'=> User::first()->id,
                ],
            ];

            $message_child_list =[
                [ 
                'title' =>'Message From Chairman', 
                'slug' =>'message-from-chairman',
                'design' =>'message',
                'rank' =>'1', 
                'created_by'=> User::first()->id,
                ],
                [ 
                'title' =>'Message From Principal', 
                'slug' =>'message-from-principal',
                'design' =>'message',
                'rank' =>'2', 
                'created_by'=> User::first()->id,
                ],
            ];

        foreach($parent_menu_list as $menu_list){
            $parent = OurService::create($menu_list);

            if($parent->slug=='about-us'){
                foreach($about_child_list as $aboutchildlist ){
                   $child= OurService::create($aboutchildlist +[
                        'parent_id' =>$parent->id,
                    ]);
                }
            }

            if($parent->slug=='message'){
                foreach($message_child_list as $messagechildlist ){
                   $child= OurService::create($messagechildlist +[
                        'parent_id' =>$parent->id,
                    ]);
                }
            }
        }
        
    }
}
