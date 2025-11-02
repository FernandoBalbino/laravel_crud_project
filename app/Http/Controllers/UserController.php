<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserAccountResource;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    public function register(RegisterUserRequest $request){
        $form = $request->validated();
        $saved = $this->userRepository->create($form);

        if(!$saved){
           return redirect()->back()->withErrors(['Houve um erro ao registrar o usuário']);

        }

        return redirect()->back()->with('success', 'Usuário registrado com sucesso!');
    }

    public function index(){



        $userResource = new UserAccountResource(
            $this->userRepository->find(Auth::user()->id
        ));
       return view('user.account', ['user' => $userResource->toArray(request())]);
    }

    public function update(){
        $userID = Auth::user()->id;
    }

    public function updatePassword(): bool{
        return true;
    }

    public function updatePhoto(): bool{
        return true;
    }
}
