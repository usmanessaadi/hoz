<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Color',10)->create();

        factory('App\Door',5)->create()->each(function($door){

            $product_detail = factory('App\Product_Detail',3)->create()->each(function($product_detail){

                $images = factory('App\Image',3)->make();
                $product_detail->images()->saveMany($images);
            });

            $door->product_details()->saveMany($product_detail);
        });

        factory('App\Gate',5)->create()->each(function($gate){

            $product_detail = factory('App\Product_Detail',3)->create()->each(function($product_detail){

                $images = factory('App\Image',3)->make();
                $product_detail->images()->saveMany($images);
            });

            $gate->product_details()->saveMany($product_detail);
        });

        factory('App\Accessory',5)->create()->each(function($accessory){

            $product_detail = factory('App\Product_Detail',3)->create()->each(function($product_detail){

                $images = factory('App\Image',3)->make();
                $product_detail->images()->saveMany($images);
            });

            $accessory->product_details()->saveMany($product_detail);
        });
        //create digital lock with their types
        factory('App\Digital_Door_Type',3)->create()->each(function ($digital_door_type){


               $digital_lock =  factory('App\Digital_Lock',3)->create()->each(function($digital_lock){

                   $product_detail = factory('App\Product_Detail',3)->create()->each(function($product_detail){

                       $images = factory('App\Image',3)->make();
                       $product_detail->images()->saveMany($images);
                   });

                   $digital_lock->product_details()->saveMany($product_detail);
               });

               $digital_door_type->digital_lock()->saveMany($digital_lock);


        });
        factory('App\Digital_Handle_Type',3)->create()->each(function ($digital_handle_type){


            $digital_lock =  factory('App\Digital_Lock',5)->create()->each(function($digital_lock){

                $product_detail = factory('App\Product_Detail',3)->create()->each(function($product_detail){

                    $images = factory('App\Image',3)->make();
                    $product_detail->images()->saveMany($images);
                });

                $digital_lock->product_details()->saveMany($product_detail);
            });

            $digital_handle_type->digital_lock()->saveMany($digital_lock);


        });
        factory('App\Digital_Lock_Type',3)->create()->each(function ($digital_lock_type){


            $digital_lock =  factory('App\Digital_Lock',5)->create()->each(function($digital_lock){

                $product_detail = factory('App\Product_Detail',3)->create()->each(function($product_detail){

                    $images = factory('App\Image',3)->make();
                    $product_detail->images()->saveMany($images);
                });

                $digital_lock->product_details()->saveMany($product_detail);

            });

            $digital_lock_type->digital_lock()->saveMany($digital_lock);


        });

        factory('App\User',5)->create()->each(function ($user){

            // Seed the relation with 5 addresses
            $addresses =  factory('App\User_Address',5)->make();
            $user->user_addresses()->saveMany($addresses);


        });

//        factory('App\Product_detail')->create()->each(function($product_detail){
//
//            $images = factory('App\Image',3)->make();
//            $product_detail->images()->saveMany($images);
//        });

        //fill saved product
        $products = App\Product_Detail::all();

                 // Populate the pivot table
            App\User::all()->each(function ($user) use ($products) {
                $user->user_saved_products()->attach(
                    $products->random(rand(1, 3))->pluck('id')->toArray()
                );
            });



    }
}
