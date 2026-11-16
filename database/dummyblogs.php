<?php

// Blog articles, newest first. Key names match the planned database columns.
// 'content' is Markdown; slugs are fixed and not derived from the title.
return [
    [
        'title' => 'Why Detection Rules Belong in Version Control',
        'slug' => 'why-detection-rules-belong-in-version-control',
        'category' => 'Detection Engineering',
        'excerpt' => 'Detection rules are code that decides what your team sees. Treating them like code, with review, history, and rollback, makes them more reliable.',
        'content' => <<<'MD'
            Placeholder: this article has not been written yet.
            MD,
        'image' => 'images/blog/detection-engineering.svg',
        'published_at' => '2026-11-16',
        'sources' => [
            ['title' => 'Palantir, "Alerting and Detection Strategies Framework" (MIT License)', 'url' => 'https://github.com/palantir/alerting-detection-strategy-framework'],
            ['title' => 'SigmaHQ, Sigma rule repository', 'url' => 'https://github.com/SigmaHQ/sigma'],
        ],
    ],
    [
        'title' => 'Mapping Detections to MITRE ATT&CK Without Fooling Yourself',
        'slug' => 'mapping-detections-to-mitre-attack-without-fooling-yourself',
        'category' => 'Detection Engineering',
        'excerpt' => 'A colorful ATT&CK coverage map is easy to produce and easy to misread. Mapping is useful only when it reflects what your detections can really catch.',
        'content' => <<<'MD'
            Placeholder: this article has not been written yet.
            MD,
        'image' => 'images/blog/detection-engineering.svg',
        'published_at' => '2026-11-12',
        'sources' => [
            ['title' => 'MITRE ATT&CK', 'url' => 'https://attack.mitre.org/'],
            ['title' => 'CISA, "Best Practices for MITRE ATT&CK Mapping"', 'url' => 'https://www.cisa.gov/uscert/best-practices-mitre-attckr-mapping'],
        ],
    ],
    [
        'title' => 'Least Privilege for Containerized Services',
        'slug' => 'least-privilege-for-containerized-services',
        'category' => 'Security Engineering',
        'excerpt' => 'Containers isolate processes, but only as much as their configuration allows. A few defaults make a large difference.',
        'content' => <<<'MD'
            Placeholder: this article has not been written yet.
            MD,
        'image' => 'images/blog/security-engineering.svg',
        'published_at' => '2026-11-09',
        'sources' => [
            ['title' => 'OWASP Cheat Sheet Series, "Docker Security Cheat Sheet"', 'url' => 'https://cheatsheetseries.owasp.org/cheatsheets/Docker_Security_Cheat_Sheet.html'],
        ],
    ],
    [
        'title' => 'Defanged, Encoded, Reversed: Normalizing IoCs Before You Import Them',
        'slug' => 'normalizing-iocs-before-you-import-them',
        'category' => 'Detection Engineering',
        'excerpt' => 'Indicators from threat reports are written for humans, not for security tools. Normalizing them first avoids failed imports and missed matches.',
        'content' => <<<'MD'
            Placeholder: this article has not been written yet.
            MD,
        'image' => 'images/blog/detection-engineering.svg',
        'published_at' => '2026-11-05',
        'sources' => [
            ['title' => 'Microsoft Learn, "Manage indicators" (Defender for Endpoint)', 'url' => 'https://learn.microsoft.com/defender-endpoint/indicator-manage'],
            ['title' => 'Microsoft Learn, "Indicators overview"', 'url' => 'https://learn.microsoft.com/en-us/defender-endpoint/indicators-overview'],
        ],
    ],
    [
        'title' => 'Sigma 101: Writing Your First Portable Detection Rule',
        'slug' => 'sigma-101-writing-your-first-portable-detection-rule',
        'category' => 'Tutorial',
        'excerpt' => 'Sigma lets you write a detection once in YAML and convert it for different SIEMs. Here is how a rule is put together.',
        'content' => <<<'MD'
            Placeholder: this article has not been written yet.
            MD,
        'image' => 'images/blog/tutorial.svg',
        'published_at' => '2026-11-02',
        'sources' => [
            ['title' => 'SigmaHQ, "Sigma Rules Specification" (public domain)', 'url' => 'https://github.com/SigmaHQ/sigma-specification/blob/main/specification/sigma-rules-specification.md'],
            ['title' => 'SigmaHQ, Sigma rule repository', 'url' => 'https://github.com/SigmaHQ/sigma'],
        ],
    ],
];
