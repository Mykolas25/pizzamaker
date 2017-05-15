<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\models\DTIngredients;

class DTIngredientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ingredients
	 *
	 * @return Response
	 */
    public function index()
    {
        if(isset($_GET['id']))
            $config['idForCreateMsg'] = $_GET['id'];
        $config['list'] = $this->apiIndex()->toArray();
        $config['routeId'] = 'app.ingredients.show';
        $config['edit'] = 'app.ingredients.edit';

        return view ('admin.list', $config);
    }

    public function indexAdmin()
    {
        $config = DTIngredients::get();

        return view ('adminShow', $config);
    }


    public function apiIndex()
    {
        return DTIngredients::get();
    }

    public function adminShow($id)
    {
        $record["single"] = DTIngredients::find($id)->toArray();
       return view("admin.single", $record);
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

	/**
	 * Store a newly created resource in storage.
	 * POST /ingredients
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        DTIngredients::create([
            'name' => $data['name'],
            'calories' => $data['calories']
        ]);
        
        return redirect()->action(
            'DTIngredientsController@index', ['id' => $data['name']]
        );
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

	/**
	 * Show the form for editing the specified resource.
	 * GET /ingredients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config['single'] = DTIngredients::find($id)->toArray();
        $config['edit'] = 'app.ingredients.edit';
        return view("admin.edit", $config);
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

        $data = request()->all();
//        dd($data);
        $record = DTIngredients::find($id);
        $record->update([
            'count' => $data['count'],
            'id' => $data['id'],
            'name' => $data['ingredient'],
            'calories' => $data['calories']
        ]);

        return redirect()->action(
            'DTIngredientsController@edit', ['id' => $record['id']]
        );
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
        $record["delete"] = DTIngredients::destroy($id);
        return json_decode(["success" => true, "id" => $id]);
	}

}