<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $users = $this->userService->searchAndPaginate('name', $request->get('search'));
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Pass CF
        if ($request->get(key: 'password') != $request->get(key: 'password_confirmation')) {
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $data = $request->all();

        $data['password'] = bcrypt($request->get(key: 'password'));
        $user = $this->userService->create($data);

        return redirect()->to('admin/user/' . $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // PassCF
        $data = $request->all();
        if ($request->get('password') != null) {

            if ($request->get(key: 'password') != $request->get(key: 'password_confirmation')) {
                return back()
                    ->with('notification', 'ERROR: Confirm password does not match');
            }


            $data['password'] = bcrypt($request->get(key: 'password'));
        }else{
            unset($data['password']);
        }

        //IMage


        //Update

        if (is_array($data)) {
            $this->userService->update($data, $user->id);
        } else {
            return back()->with('notification', 'ERROR: Invalid data format');
        }

        return redirect('admin/user/' . $user->id);
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $this->userService->delete($user->id);

        return redirect(('admin/user'));

        
    }
}
