<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Contact;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        HeroSection::create([
            'available' => true,
            'badge_text' => 'Available for freelance',
            'headline' => "Hi, I'm",
            'highlighted_name' => 'Rohit Sawant',
            'typed_texts' => ['Creative Web Developer', 'UI/UX Designer', 'Full Stack Engineer'],
            'primary_button_text' => 'View My Work',
            'primary_button_link' => '#skills',
            'primary_button_icon' => 'fas fa-arrow-right',
            'secondary_button_text' => 'Get In Touch',
            'secondary_button_link' => '#contact',
            'secondary_button_icon' => 'fas fa-envelope',
            'scroll_text' => 'Scroll to explore',
        ]);

        AboutSection::create([
            'title' => 'About Me',
            'lead_text' => 'I love building beautiful, efficient digital experiences.',
            'description' => 'With expertise in Laravel, Vue, and TailwindCSS, I bring ideas to life.',
            'image' => 'assets/profile.png',
            'highlights' => ['Clean & Efficient Code', 'Modern Technologies', 'User-Centered Design', 'Responsive Development'],
        ]);

        $skills = [
            [
                'title' => 'Frontend Development',
                'icon' => 'fas fa-code',
                'description' => 'Creating beautiful, responsive user interfaces with modern web technologies.',
                'category' => 'Web Development',
                'items' => [
                    ['name' => 'HTML', 'icon' => 'fab fa-html5'],
                    ['name' => 'CSS', 'icon' => 'fab fa-css3-alt'],
                    ['name' => 'JavaScript', 'icon' => 'fab fa-js-square'],
                    ['name' => 'React', 'icon' => 'fab fa-react'],
                    ['name' => 'Angular', 'icon' => 'fab fa-angular'],
                ],
                'proficiency' => 90
            ],
            [
                'title' => 'Backend Development',
                'icon' => 'fas fa-server',
                'description' => 'Building scalable server-side applications and APIs.',
                'category' => 'Programming Languages',
                'items' => [
                    ['name' => 'Java', 'icon' => 'fab fa-java'],
                    ['name' => 'Python', 'icon' => 'fab fa-python'],
                    ['name' => 'Node.js', 'icon' => 'fab fa-node-js'],
                    ['name' => 'SQL', 'icon' => 'fas fa-database'],
                    ['name' => 'Docker', 'icon' => 'fab fa-docker'],
                ],
                'proficiency' => 85
            ],
            [
                'title' => 'UI/UX Design',
                'icon' => 'fas fa-palette',
                'description' => 'Designing intuitive user experiences and visual designs.',
                'category' => 'Design Tools',
                'items' => [
                    ['name' => 'Figma', 'icon' => 'fab fa-figma'],
                    ['name' => 'Adobe XD', 'icon' => 'fas fa-paint-brush'],
                    ['name' => 'Sketch', 'icon' => 'fas fa-pencil-ruler'],
                    ['name' => 'Photoshop', 'icon' => 'fas fa-image'],
                ],
                'proficiency' => 80
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        $experiences = [
            [
                'years' => 'Feb 2024 - Present',
                'role' => 'Software Engineer',
                'company' => 'Coditron Technologies',
                'description' => 'Leading development of enterprise web applications using Magento, Knockout.js, and cloud technologies.',
                'tags' => ['Magento', 'Knockout.js', 'JavaScript', 'jQuery', 'XML', 'MySQL'],
            ],
            [
                'years' => 'Oct 2023 - Dec 2023',
                'role' => 'Software Engineer',
                'company' => 'Euspace Technologies',
                'description' => 'Developed responsive web applications and implemented modern UI/UX designs.',
                'tags' => ['JavaScript', 'Angular.js', 'CodeIgniter', 'MySQL'],
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }

        Contact::create([
            'lead' => "I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.",
            'methods' => [
                [
                    'icon' => 'fas fa-envelope',
                    'type' => 'Email',
                    'value' => 'sawantsrohit@gmail.com',
                    'link' => 'mailto:sawantsrohit@gmail.com',
                ],
                [
                    'icon' => 'fas fa-phone',
                    'type' => 'Phone',
                    'value' => '+91 75072 11594',
                    'link' => 'tel:+917507211594',
                ],
                [
                    'icon' => 'fas fa-map-marker-alt',
                    'type' => 'Location',
                    'value' => 'Pune, Maharashtra, India',
                    'link' => null,
                ],
            ],
        ]);
    }
}


