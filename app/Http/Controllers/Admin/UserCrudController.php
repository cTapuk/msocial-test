<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\User');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('лользователя', 'пользователи');
        $this->crud->denyAccess(['show', 'update', 'create']);
        
        $this->crud->addField([ // image
            'label' => "Аватар",
            'name' => "avatar",
            'type' => 'image',
            'readonly' => true,
            'crop' => false,
            'aspect_ratio' => 0,
            'prefix' => 'storage/'
        ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
        $this->crud->addColumn('avatar')->makeFirstColumn();
        $this->crud->setColumnDetails('name', ['label' => 'Имя']);
        $this->crud->setColumnDetails('sname', ['label' => 'Фамилия']);
        $this->crud->setColumnDetails('avatar', ['name' => 'avatar',
        'label' => "Аватар",
        'type' => 'image',
        'prefix' => 'storage/',
        'orderable' => false,
         // optional width/height if 25px is not ok with you
        'height' => '40px',
        'width' => '40px',
         ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(UserRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
