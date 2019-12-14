<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * The Statuses table is used to make editable options on Task records compatible with Eloquent.
     * Good coding practice is to always use IDs and foreign keys for "category-style" column values
     * (rather than, in this case, adding a 'status' column to the tasks table with a string data type)
     *
     * The table records for this type of table are required for the app, so we seed them here.
     *
     * @return void
     */
    public function run()
    {
        //get all statuses by name
        $all_status_titles = Status::all(['name']);

        //create the 'current' status if it doesn't exist
        if (!$all_status_titles->contains('name','current')) {
            $status_current = new Status([
                'name' => 'current',
                'description' => 'active tasks to be displayed by default'
            ]);

            $status_current->save();
        }

        //create the 'archived' status if it doesn't exist
        if (!$all_status_titles->contains('name','archived')) {
            $status_archived = new Status([
                'name' => 'archived',
                'description' => 'archived tasks to be hidden from the default view'
            ]);

            $status_archived->save();
        }
    }
}
