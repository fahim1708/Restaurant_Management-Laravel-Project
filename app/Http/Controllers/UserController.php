<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Check if the current user is admin.
     *
     * @return Boolean true/false
     */
    public function GetIsAdmin()
    {
        // Check if the user is logged in and their usertype is 'admin'
        return Auth::check() && Auth::user()->usertype === 'admin';
    }

    /**
     * Display a listing of the user entries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::check() ? Auth::user() : null; // Get the authenticated user or null
        $isAdmin = $this->GetIsAdmin();

        // Only allow admins to view the list of all users
        $data = $isAdmin ? User::all() : null;

        return view("admin.pages.user", compact("data", "isAdmin", "user"));
    }

    /**
     * Remove the specified user entry from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $isAdmin = $this->GetIsAdmin();

        if ($isAdmin) {
            if ($user->usertype === 'admin') {
                return redirect()
                    ->back()
                    ->with('msg', 'You cannot delete another admin.');
            }

            $user->delete(); // Delete the user

            return redirect()
                ->back()
                ->with('msg', 'User deleted successfully');
        }

        return redirect()
            ->route('user.index')
            ->with('msg', 'You are not authorized to delete users');
    }

    // ---------------------
    public function showProfile()
    {
        $user = auth()->user();
        $isAdmin = $user && $user->usertype === 'admin'; // Check if the user is an admin

        return view('profile.profile', [
            'user' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }


    // Update user profile (name and email)
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(), // Exclude current user's email from unique check
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    // Update user password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8', // Default password validation
        ]);

        $user = auth()->user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
