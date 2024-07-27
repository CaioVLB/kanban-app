<?php

namespace App\Modules\Profile\Controllers;

use App\Modules\Profile\Requests\ProfileUpdateRequest;
use App\Modules\_MainController\MainController;
use App\Modules\Profile\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends MainController
{
    public function __construct(
        protected ProfileService $service
    ){}

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->user()->fill($request->validated());
        $user = $this->service->update($data->toArray());
        if(!$user) {
            return redirect()->back()->with('status', 'Falha na atualização do perfil.');
        }
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $success = $this->service->delete($request->user()->id);
        if(!$success) {
            return redirect()->back()->with('userDeletion', 'Falha interna durante execução.');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
}