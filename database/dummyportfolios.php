<?php

// Portfolio items, newest first. Key names match the planned database columns.
return [
    [
        'title' => 'Hydroponic Monitoring Simulator',
        'slug' => 'hydroponic-monitoring-simulator',
        'description' => 'A multi-zone hydroponic monitoring platform with simulated sensors, priority-based nutrient allocation, and a real-time dashboard.',
        'body' => <<<'TEXT'
            Simulated sensors publish readings over MQTT for several growing zones. A shared nutrient tank is allocated across zones using a priority score, and a dashboard shows the current state in real time over WebSocket.

            The platform runs as 22 services in Docker Compose. Each service has its own credentials, containers run as non-root users, and Traefik with Authelia is the only entry point. Prometheus and Grafana provide monitoring.
            TEXT,
        'technologies' => ['Docker', 'Python', 'Node.js', 'SvelteKit', 'MQTT', 'PostgreSQL', 'Redis', 'InfluxDB', 'Traefik', 'Authelia', 'Prometheus', 'Grafana'],
        'image' => 'images/portfolio/hydroponic-monitoring-simulator.svg',
        'context' => 'Course project',
        'repository_url' => 'https://github.com/srflmr/hydroponic-monitoring-simulator',
        'demo_url' => null,
        'published_at' => '2026-07-06',
    ],
    [
        'title' => 'Detection Engineering Dashboard',
        'slug' => 'detection-engineering-dashboard',
        'description' => 'A prototype dashboard for managing SIEM detection rules across customers and platforms.',
        'body' => <<<'TEXT'
            A web prototype for keeping track of SIEM detection rules when the same rules are deployed for several customers and on different platforms.

            Built with PHP and MySQL, with JavaScript and CSS for the interface.
            TEXT,
        'technologies' => ['PHP', 'MySQL', 'JavaScript', 'CSS'],
        'image' => 'images/portfolio/detection-engineering-dashboard.svg',
        'context' => 'Course project',
        'repository_url' => 'https://github.com/srflmr/de-dashboard',
        'demo_url' => null,
        'published_at' => '2026-04-22',
    ],
    [
        'title' => 'M365 IoC CSV Generator',
        'slug' => 'm365-ioc-csv-generator',
        'description' => 'A terminal app that turns indicators of compromise into Microsoft 365 Defender bulk-import CSV files.',
        'body' => <<<'TEXT'
            Built to speed up a repetitive part of my work: preparing indicators of compromise for bulk import into Microsoft 365 Defender.

            It detects MD5, SHA1, SHA256, IPv4, domain, and URL indicators automatically, and recovers obfuscated values (Base64, hex, URL-encoded, defanged, and reversed) before writing the CSV.
            TEXT,
        'technologies' => ['Python', 'Textual', 'openpyxl'],
        'image' => 'images/portfolio/m365-ioc-csv-generator.svg',
        'context' => 'Work tool',
        'repository_url' => 'https://github.com/srflmr/m365-ioc-csv-generator',
        'demo_url' => null,
        'published_at' => '2026-01-18',
    ],
    [
        'title' => 'Terraform IPv4 IoC Normalizer',
        'slug' => 'terraform-ipv4-ioc-normalizer',
        'description' => 'A terminal app that normalizes IPv4 indicators from CSV files into /32 CIDR blocks for Terraform.',
        'body' => <<<'TEXT'
            Built to prepare lists of malicious IPv4 addresses for infrastructure managed with Terraform.

            It reads indicators from CSV, converts each address to a /32 CIDR block, removes duplicates, and exports the result as JSON or TXT.
            TEXT,
        'technologies' => ['Python', 'Textual', 'Terraform'],
        'image' => 'images/portfolio/terraform-ipv4-ioc-normalizer.svg',
        'context' => 'Work tool',
        'repository_url' => 'https://github.com/srflmr/terraform-ipv4-ioc-normalizer',
        'demo_url' => null,
        'published_at' => '2026-01-12',
    ],
];
