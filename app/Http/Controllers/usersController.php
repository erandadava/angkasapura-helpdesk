<?php

namespace App\Http\Controllers;

use App\DataTables\usersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Repositories\usersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
use Response;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class usersController extends AppBaseController
{
    /** @var  usersRepository */
    private $usersRepository;

    public function __construct(usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->data['role'] = \App\Models\roles::pluck('name','id')->all();
    }

    /**
     * Display a listing of the users.
     *
     * @param usersDataTable $usersDataTable
     * @return Response
     */
    public function index(usersDataTable $usersDataTable, Request $request)
    {
        if($request->np){
            return $usersDataTable->with('np', $request->np??null)->render('users.index_penilaian');
        }
        return $usersDataTable->with('np', $request->np??null)->render('users.index');
    }

    /**
     * Show the form for creating a new users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create')->with($this->data);
    }

    /**
     * Store a newly created users in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();
        $input['verified'] = 1;
        $input['password'] = bcrypt($input['password']);
        $input['username'] = substr($input['email'], 0, strpos($input['email'], '@'));
        $users = $this->usersRepository->create($input);

        $akun = \App\User::find($users->id);

        $akun->assignRole($input['roles']);

        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->data['users'] = $this->usersRepository->findWithoutFail($id);
        $user = \App\User::where('id',$id)->with('roles')->first();
        if (empty($this->data['users'])) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        $this->data['role_id'] = $user['roles'][0]['id'];
        return view('users.edit')->with($this->data);
    }

    /**
     * Update the specified users in storage.
     *
     * @param  int              $id
     * @param UpdateusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusersRequest $request)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        
        $input = $request->all();
        if($request->ubah_password){
            $input['password'] = bcrypt($input['password']);
        }
        $input['username'] = substr($input['email'], 0, strpos($input['email'], '@'));
        // $input['password'] = bcrypt($input['password']);
        $users = $this->usersRepository->update($input, $id);
        
        if(isset($input['roles'])){
            $akun = \App\User::find($users->id);
            $akun->removeRole($akun->roles->first());
            $akun->assignRole($input['roles']);
        }
        

        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }
}
