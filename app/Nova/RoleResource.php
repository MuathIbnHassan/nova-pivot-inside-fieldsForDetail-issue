<?php

namespace App\Nova;

use App\Models\Role;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class RoleResource extends Resource
{
    public static $model = Role::class;

    public static $title = 'name';

    public static $search = ['id'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required'),

//            either this commented or not, only fields added here will be rendered
//            BelongsToMany::make('users'),
        ];
    }

    public function fieldsForDetail()
    {
        return [
            BelongsToMany::make('users')
                ->fields(
                    fn() => [
                        Text::make('reason')
                    ]
                ),
        ];
    }
}
