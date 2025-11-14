<?php 
namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio', [
            'hero' => HeroSection::first(),
            'about' => AboutSection::first(),
            'skills' => Skill::all(),
            'experience' => Experience::all(),
            'contact' => Contact::first(),
        ]);
    }
}
