<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessCardController extends Controller
{
    // Templates with dynamic gradients Why store templates in controller?” → Quick access for users without needing a database.
    public $templates = [
        1 => [
            'id' => 1,
            'class' => 't1',
            'name' => 'Michael Carter',
            'title' => 'Founder & CEO',
            'company' => 'TechNova',
            'email' => 'michael@technova.com',
            'phone' => '+123456789',
            'website' => 'technova.com',
            'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
            'qr' => 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=1',
            'gradient' => 'rgba(0,0,0,0.75)',
        ],
        2 => [
            'id' => 2,
            'class' => 't2',
            'name' => 'Sarah Williams',
            'title' => 'Marketing Manager',
            'company' => 'MediaWorks',
            'email' => 'sarah@mediaworks.com',
            'phone' => '+987654321',
            'website' => 'mediaworks.com',
            'image' => 'https://randomuser.me/api/portraits/women/45.jpg',
            'qr' => 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=2',
            'gradient' => 'linear-gradient(135deg,#667eea,#764ba2)',
        ],
        3 => [
            'id' => 3,
            'class' => 't3',
            'name' => 'David Thompson',
            'title' => 'Creative Director',
            'company' => 'DesignPro',
            'email' => 'david@designpro.com',
            'phone' => '+192837465',
            'website' => 'designpro.com',
            'image' => 'https://randomuser.me/api/portraits/men/76.jpg',
            'qr' => 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=3',
            'gradient' => 'linear-gradient(135deg,#11998e,#38ef7d)',
        ],
        4 => [
            'id' => 4,
            'class' => 't4',
            'name' => 'Emma Johnson',
            'title' => 'UX Designer',
            'company' => 'CreativeLabs',
            'email' => 'emma@creativelabs.com',
            'phone' => '+111222333',
            'website' => 'creativelabs.com',
            'image' => 'https://randomuser.me/api/portraits/women/12.jpg',
            'qr' => 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=4',
            'gradient' => 'linear-gradient(135deg,#f6d365,#fda085)',
        ],
        5 => [
            'id' => 5,
            'class' => 't5',
            'name' => 'James Smith',
            'title' => 'Product Manager',
            'company' => 'InnoTech',
            'email' => 'james@innotech.com',
            'phone' => '+444555666',
            'website' => 'innotech.com',
            'image' => 'https://randomuser.me/api/portraits/men/22.jpg',
            'qr' => 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=5',
            'gradient' => 'linear-gradient(135deg,#ff7e5f,#feb47b)',
        ],
        6 => [
            'id' => 6,
            'class' => 't6',
            'name' => 'Olivia Brown',
            'title' => 'Marketing Specialist',
            'company' => 'BrandWorks',
            'email' => 'olivia@brandworks.com',
            'phone' => '+777888999',
            'website' => 'brandworks.com',
            'image' => 'https://randomuser.me/api/portraits/women/30.jpg',
            'qr' => 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=6',
            'gradient' => 'linear-gradient(135deg,#43cea2,#185a9d)',
        ],
    ];

    public function index()
    {
        $user = Auth::user();
        $cards = $user->businessCards; 
        return view('cards.index', ['templates' => $this->templates, 'cards' => $cards]);
    }
//     public function index()
// {
//     $user = Auth::user();
//     $cards = $user->businessCards; 
//     return view('cards.index', ['cards' => $cards]);
// }


    public function templates()
    {
        return view('templates.index', ['templates' => $this->templates]);
    }

    public function createFromTemplate($templateId)
    {
        $template = $this->templates[$templateId] ?? null;
        if (!$template) abort(404, 'Template not found');

        return view('cards.edittemplatecard', compact('template'));
    }

    public function create(Request $request)
    {
        $template = $request->template; 
        return view('cards.create', compact('template'));
    }

 public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'profile_pic.max' => 'Profile picture cannot exceed 2MB!'
    ]);

    $card = new BusinessCard();
    $card->user_id = Auth::id();
    $card->name = $request->name;
    $card->title = $request->title;
    $card->company = $request->company;
    $card->email = $request->email;
    $card->phone = $request->phone;
    $card->website = $request->website;
    $card->social_links = json_encode($request->social_links);

    // Text styling
    $card->font_family = $request->font_family ?? 'Poppins';
    $card->text_align  = $request->text_align ?? 'center';
    $card->font_size   = $request->font_size ?? '16px';
    $card->is_bold     = $request->boolean('is_bold');
    $card->is_italic   = $request->boolean('is_italic');

    $card->theme = $request->theme ?? 't1';

    if ($request->hasFile('profile_pic')) {
        $path = $request->file('profile_pic')->store('profile_pics', 'public');
        $card->profile_pic = $path;
    }

    $card->save();

    return redirect()->route('cards.index')->with('success', 'Card created successfully!');
}


    public function edit(BusinessCard $card)
    {
        return view('cards.edit', compact('card'));
    }

 public function update(Request $request, BusinessCard $card)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $card->name        = $request->name;
    $card->title       = $request->title;
    $card->company     = $request->company;
    $card->email       = $request->email;
    $card->phone       = $request->phone;
    $card->website     = $request->website;
    $card->social_links = json_encode($request->social_links);

    $card->font_family = $request->font_family ?? 'Poppins';
    $card->text_align  = $request->text_align ?? 'center';
    $card->font_size   = $request->font_size ?? '16px';
    $card->is_bold     = $request->boolean('is_bold');
    $card->is_italic   = $request->boolean('is_italic');

    $card->theme       = $request->theme ?? 't1';

    if ($request->hasFile('profile_pic')) {
        $path = $request->file('profile_pic')->store('profile_pics', 'public');
        $card->profile_pic = $path;
    }

    $card->save();

    return redirect()->route('cards.index')->with('success', 'Card updated successfully!');
}

    public function destroy(BusinessCard $card)
    {
        $card->delete();
        return redirect()->route('cards.index')->with('success', 'Card deleted successfully!');
    }

    public function show()
    {
        $cards = auth()->user()->cards; 
        return view('cards.show', compact('cards'));
    }
}
