<?php namespace App\Http\Controllers;

use App\models\DTRoles;
use Illuminate\Routing\Controller;

class DTRolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ingredients
	 *
	 * @return Response
	 */

    public function index()
    {

	}

	public function adminIndex()
	{
        $dataFromModel = new DTRoles();

	    $configuration['list'] = DTRoles::get()->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();

        if($configuration['list'] == [])
        {
            $configuration['error'] = ['message' => trans("Create some " . $configuration['tableName'] . ", then go to list")];
            return view('admin.list', $configuration);
        }

		return view('admin.list', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ingredients/create
	 *
	 * @return Response
	 */
	public function create()
	{

	}

    public function adminCreate()
    {

        $dataFromModel = new DTRoles();


        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['list'] = DTRoles::get()->toArray();

        return view('admin.createform', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ingredients
	 *
	 * @return Response
	 */
	public function store()
	{

	}

    public function adminStore()
    {
        $data = request()->all();
        $dataFromModel = new DTRoles();

        $configuration['fields'] = $dataFromModel->getFillable();
        $configuration['tableName'] = $dataFromModel->getTableName();

        foreach($configuration['fields'] as $key=> $value) {
            if (!isset($data[$value])) {
                $configuration['error'] = ['message' => trans('Please enter ' . $value)];
                return view('admin.createform', $configuration);
            }
        }

        DTRoles::create($data);
        $configuration['comment'] = ['message' => trans('Record added successfully')];
        return view('admin.createform',  $configuration);

	}

	/**
	 * Display the specified resource.
	 * GET /ingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

    public function adminShow($id)
    {
        $dataFromModel = new DTRoles();

        $configuration['record'] = DTRoles::find($id)->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();


        return view('admin.single', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ingredients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	public function adminEdit($id) 
	{

		return view('admin.editform');

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}

	public function adminUpdate($id) 
	{

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function adminDestroy($id)
    {

        if(DTRoles::destroy($id)) {
            return '{"success":true}';
        }


	}

}