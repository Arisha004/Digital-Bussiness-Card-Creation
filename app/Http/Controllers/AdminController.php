<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BusinessCard;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard overview
    // Dashboard overview
public function dashboard()
{
    // Exclude hardcoded admin from total users and top users
    $totalUsers = User::where('email', '!=', 'admin@gmail.com')->count();
    $totalCards = BusinessCard::count();

    $topUsers = User::withCount('cards')
                    ->where('email', '!=', 'admin@gmail.com') // exclude admin
                    ->orderBy('cards_count', 'desc')
                    ->take(3)
                    ->get();

    return view('Admin.dashboard', compact('totalUsers', 'totalCards', 'topUsers'));
}


    // Show all cards
    public function allCards()
    {
        $cards = BusinessCard::with('user')->latest()->get(); // latest cards first
        return view('Admin.allcards', compact('cards'));
    }

    // View a single card
 // AdminCardController.php

// AdminCardController.php
public function viewCard($id)
{
    // Fetch card with user info
    $card = BusinessCard::with('user')->findOrFail($id);
    return view('admin.viewcard', compact('card'));
}

// Show all cards for a single user
public function viewUserCards($userId)
{
    $user = User::with('cards')->findOrFail($userId); // fetch user with their cards
    $cards = $user->cards; // all cards of this user
    return view('admin.usercards', compact('user', 'cards'));
}


    // Delete a card
    public function deleteCard($id)
    {
        $card = BusinessCard::find($id);
        if ($card) {
            $card->delete();
            return redirect()->back()->with('success', 'Card deleted successfully');
        }
        return redirect()->back()->with('error', 'Card not found');
    }

    // View all users
    public function viewUsers()
    {
        // Include card count for each user
        $users = User::withCount('cards')->where('email', '!=', 'admin@gmail.com')->get();
        return view('Admin.users', compact('users'));
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user && $user->email !== 'admin@gmail.com') {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        }
        return redirect()->back()->with('error', 'Cannot delete admin');
    }
}
