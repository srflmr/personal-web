<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $projects = include base_path('database/dummyportfolios.php');
        $blogs = include base_path('database/dummyblogs.php');

        $focusAreas = [
            [
                'title' => 'Security',
                'text' => 'Specialized in threat detection, SIEM operations, and security monitoring.',
            ],
            [
                'title' => 'Development',
                'text' => 'Building tools and automation scripts for security operations.',
            ],
            [
                'title' => 'Learning',
                'text' => 'Continuously expanding knowledge through certifications and hands-on experience.',
            ],
        ];

        // Both files are ordered newest first, so the first three are the latest.
        return view('home', [
            'profile' => $this->profile(),
            'focusAreas' => $focusAreas,
            'featuredProjects' => array_slice($projects, 0, 3),
            'latestBlogs' => array_slice($blogs, 0, 3),
        ]);
    }

    public function about(): View
    {
        $narrative = [
            'headline' => 'Every adversary leaves a shadow.',
            'intro' => 'My journey, from watching those shadows to holding the light that makes the unseen visible.',
            'heading' => 'From shadows to clarity',
            'paragraphs' => [
                'I started as an Associate Security Analyst, drawn to the quiet work of making sense of noise. Day by day, I learned how adversaries leave shadows: fragments in alerts and logs that only become meaningful when you connect them with context and evidence. That experience shaped how I think: patient, curious, and grounded in what the data can prove.',
                'Today, I work as a Cyber Threat Detection Engineer. I build and maintain SIEM detections that bring hidden behavior into the light, then keep them healthy over time: tuning thresholds, refining logic, and automating what should be repeatable. I care about detections that are not only clever, but reliable: the kind you can trust when it matters.',
            ],
        ];

        $skills = [
            ['category' => 'Detection & Response', 'items' => ['Threat Detection', 'Threat Hunting', 'SOC Operations', 'Incident Response', 'SIEM Engineering']],
            ['category' => 'Security Operations', 'items' => ['SIEM', 'Log Analysis', 'Security Monitoring', 'SOC Assessment']],
            ['category' => 'Threat Intelligence', 'items' => ['MITRE ATT&CK', 'TTP Mapping', 'IOC Analysis', 'Cyber Threat Intelligence']],
            ['category' => 'Technical Tools', 'items' => ['Python', 'Linux', 'Bash', 'Git']],
            ['category' => 'Cloud Security', 'items' => ['Google Cloud (ACE)', 'Cloud Architecture', 'IAM', 'Cloud Monitoring']],
            ['category' => 'DevOps & Infrastructure', 'items' => ['DevOps Fundamentals', 'Shell Scripting', 'CI/CD', 'Docker']],
        ];

        $skillCount = array_sum(array_map('count', array_column($skills, 'items')));

        // Newest first.
        $experience = [
            ['role' => 'Cyber Threat Detection Engineer', 'organization' => 'PT Korelasi Persada Indonesia', 'period' => 'July 2026 - Present'],
            ['role' => 'Associate Cyber Threat Detection Engineer', 'organization' => 'PT Korelasi Persada Indonesia', 'period' => 'October 2024 - July 2026'],
            ['role' => 'Associate Security Analyst', 'organization' => 'PT Korelasi Persada Indonesia', 'period' => 'April 2022 - October 2024'],
        ];

        $education = [
            ['institution' => 'Universitas Ciputra', 'program' => 'Informatics', 'level' => 'Undergraduate program', 'period' => '2025 to present'],
        ];

        $certifications = [
            ['name' => 'CertiProf Lifelong Learning', 'image' => 'images/badges/badge-1.png'],
            ['name' => 'CertiProf Cybersecurity Awareness Professional Certification (CAPC)', 'image' => 'images/badges/badge-2.png'],
            ['name' => 'Google Cloud Certified Associate Cloud Engineer', 'image' => 'images/badges/badge-3.png'],
            ['name' => 'Google IT Support Professional Certificate', 'image' => 'images/badges/badge-4.png'],
            ['name' => 'CompTIA Security+', 'image' => 'images/badges/badge-5.png'],
            ['name' => 'MAD20 ATT&CK Fundamentals', 'image' => 'images/badges/badge-6.png'],
            ['name' => 'MAD20 ATT&CK Cyber Threat Intelligence Certification', 'image' => 'images/badges/badge-7.png'],
            ['name' => 'MAD20 ATT&CK Threat Hunting Detection Engineering Certification', 'image' => 'images/badges/badge-8.png'],
            ['name' => 'MAD20 ATT&CK Security Operations Center Assessment Certification', 'image' => 'images/badges/badge-9.png'],
            ['name' => 'MAD20 ATT&CK Purple Teaming Methodology Certification', 'image' => 'images/badges/badge-10.png'],
        ];

        // The profiles that list every certification.
        $certificationLinks = array_values(array_filter(
            config('site.social'),
            fn ($link) => in_array($link['label'], ['LinkedIn', 'Credly'], true)
        ));

        return view('about', [
            'profile' => $this->profile(),
            'narrative' => $narrative,
            'skills' => $skills,
            'skillCount' => $skillCount,
            'experience' => $experience,
            'education' => $education,
            'certifications' => $certifications,
            'certificationLinks' => $certificationLinks,
        ]);
    }

    public function contact(): View
    {
        return view('contact');
    }

    /**
     * @return array{name: string, role: string, company: string, tagline: string}
     */
    private function profile(): array
    {
        return Arr::only(config('site'), ['name', 'role', 'company', 'tagline']);
    }
}
