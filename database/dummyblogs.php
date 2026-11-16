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
            A detection rule looks small: a query, a threshold, a severity. But it decides what an analyst sees at three in the morning and what they never see at all. Something with that much influence deserves the same care as application code, and the simplest way to give it that care is to keep it in version control.

            ## What happens without it

            Palantir's incident response team described this problem when they published their Alerting and Detection Strategies (ADS) framework. Before the framework, their alerts were built without much rigor, and weak ones reached production with no documentation and no peer review. Some of those alerts became known as low quality, which led to fatigue, "alerting apathy", or additional engineering time and resources.

            That pattern is easy to recognize. A rule is edited directly in the SIEM, nobody records why, and six months later no one can say whether the exclusion in line four is a careful tuning decision or a quick fix that hides real activity. Once analysts stop trusting an alert, it no longer protects anything.

            ## Write the strategy down first

            The ADS framework answers this with a plain-language template that must be completed before an alert goes to production. It has nine sections: Goal, Categorization, Strategy Abstract, Technical Context, Blind Spots and Assumptions, False Positives, Validation, Priority, and Response.

            Two sections are easy to overlook. Blind Spots and Assumptions makes the author say where the alert will not fire, which is the part most rules leave out. Validation asks for the steps that produce a true positive, which the framework compares to a unit test. If you cannot make the alert fire on purpose, the framework's advice is to break it down, refactor it, or discard it.

            The framework also says where this work should live: every draft and production alert is kept in a durable, version-controlled, centralized location, and each new strategy is reviewed by a peer before it moves to production.

            ## What version control adds

            A Git repository gives a detection team three things that a SIEM console usually does not:

            - **Review.** A pull request shows exactly what changed in a rule, and a second person reads it before it can page anyone.
            - **History.** Every change carries an author, a date, and a message, so the reason for a threshold or an exclusion stays with the rule.
            - **Rollback.** When a change floods the queue, going back to the last good version is one revert, not an attempt to remember what the query used to be.

            The Sigma project shows the same idea working in public. Its main repository holds more than 3,000 detection rules, contributions arrive as pull requests, and the project describes the rules as peer reviewed by a community of detection engineers.

            ## Start small

            None of this needs a new platform. Put the rules you already have in a repository, write down the goal, blind spots, and validation steps for the ones that matter most, and ask a colleague to review the next change before it ships. The rules stay the same at first; what changes is that you can explain them, test them, and undo them.
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
            Most detection teams eventually produce an ATT&CK coverage map: the matrix with a cell colored in for every technique that has a rule. It looks good in a slide deck. It can also be badly wrong, because a colored cell says that a rule carries a tag, not that the technique will be caught.

            ## What ATT&CK is, and why teams map to it

            MITRE describes ATT&CK as "a globally-accessible knowledge base of adversary tactics and techniques based on real-world observations". Tactics are the adversary's goals, the reason for an action. Techniques are how a goal is achieved, and many techniques are split further into sub-techniques. The Enterprise matrix currently arranges them under 15 tactics, from Reconnaissance to Impact.

            Mapping detections to this structure gives a team a shared vocabulary. CISA, which uses ATT&CK as a lens for analyzing adversary behavior, lists the uses: identifying defensive gaps, assessing tool capabilities, organizing detections, hunting for threats, and validating mitigations. Open rule formats support this directly. CISA's mapping guide points out that Sigma rules carry their ATT&CK techniques and sub-techniques in a tags field.

            ## One tag is not coverage

            The trouble starts when the tag is read as a guarantee. A technique describes a behavior that can usually be carried out in more than one way, while a rule matches one specific pattern in one specific log source. A rule that catches a single well-known tool, with its default command line, has earned its tag. It has not covered every other way of performing the same technique, and the map cannot show the difference.

            Granularity matters too. The guide says to stop at the tactic level only when there is not enough detail to identify a technique or sub-technique, and notes that a tactic-level mapping alone is not actionable for detection.

            ## Map with evidence

            CISA's guide names three analytic errors, and each one applies to tagging a rule as much as to annotating a report:

            - **Leaping to conclusions.** Choosing a mapping before the evidence supports it. The guide's example is mapping malware that uses ports 80 and 443 to the web protocols sub-technique without confirming that it really speaks HTTP or HTTPS.
            - **Missed opportunities.** Overlooking other techniques that the same behavior implies.
            - **Miscategorization.** Picking the wrong one of two similar techniques because the difference between them was not understood.

            The remedies it gives are ordinary and effective: read the technique descriptions closely, list the candidates and discard the ones that do not match precisely, and have someone else review the result. According to the guide, the ATT&CK team itself puts new mapping content through at least two reviews before release.

            The guide also warns about bias in the reporting that mappings are built from. With novelty bias, for example, new and interesting techniques get reported first. A map built from what is widely reported will lean the same way.

            ## Keep the map honest

            A mapping is a claim, and claims can be tested. For each tagged rule, record what it was tested against and what it is known to miss, then trigger the behavior on purpose and confirm that the alert fires. If a cell on the map cannot be backed by a test, color it as a hypothesis, not as coverage. A smaller map that you can defend is more useful than a full one that nobody can.

            © 2026 The MITRE Corporation. This work is reproduced and distributed with the permission of The MITRE Corporation.
            MD,
        'image' => 'images/blog/detection-engineering.svg',
        'published_at' => '2026-11-12',
        'sources' => [
            ['title' => 'MITRE ATT&CK', 'url' => 'https://attack.mitre.org/'],
            ['title' => 'CISA, "Best Practices for MITRE ATT&CK Mapping"', 'url' => 'https://www.cisa.gov/news-events/news/best-practices-mitre-attckr-mapping'],
            ['title' => 'CISA, "Best Practices for MITRE ATT&CK Mapping" (guide, version 2.0, January 2023, PDF)', 'url' => 'https://www.cisa.gov/sites/default/files/2023-01/Best%20Practices%20for%20MITRE%20ATTCK%20Mapping.pdf'],
        ],
    ],
    [
        'title' => 'Least Privilege for Containerized Services',
        'slug' => 'least-privilege-for-containerized-services',
        'category' => 'Security Engineering',
        'excerpt' => 'Containers isolate processes, but only as much as their configuration allows. A few defaults make a large difference.',
        'content' => <<<'MD'
            A container feels like a sealed box, so it is tempting to treat whatever runs inside as contained. The OWASP Docker Security Cheat Sheet is more careful: Docker can improve security when it is used correctly, but misconfiguration can lower it or add new weaknesses. Containers also share the host's kernel, so the box is only as strong as the settings around it. Most of those settings come down to one idea: give each service only what it needs.

            ## Guard the Docker socket

            The Docker daemon socket is the entry point to the Docker API and is owned by root. The cheat sheet treats access to it as equal to unrestricted root access on the host, and that includes a container that has the socket mounted. Mounting the socket read-only does not make the Docker API read-only: any process that can connect to it can still ask the daemon to change containers or the host. Exposing the daemon over TCP without protection is worse, because anyone who can reach the port can control the daemon.

            ## Start from nothing, add what is needed

            Four settings do most of the work, and the cheat sheet has a rule for each:

            - **Run as an unprivileged user.** Set one in the image with `USER` or at start with `-u`. The cheat sheet calls this the best way to prevent privilege escalation attacks.
            - **Drop capabilities.** Docker already starts containers with a subset of Linux kernel capabilities. The most secure setup drops all of them and adds back only the ones the service requires. The `--privileged` flag does the opposite and grants every capability, so it should not be used.
            - **Block privilege escalation.** The `no-new-privileges` option stops a process from gaining privileges through setuid or setgid binaries.
            - **Make the filesystem read-only.** With `--read-only`, the container cannot modify its own filesystem. A `tmpfs` mount covers the few paths that need temporary writes.

            Put together, a hardened start command looks like this:

            ```bash
            docker run \
              --user 4000 \
              --cap-drop all \
              --security-opt=no-new-privileges \
              --read-only --tmpfs /tmp \
              --publish 127.0.0.1:8000:8000 \
              example/api:1.4.2
            ```

            ## Keep secrets out of the image

            Credentials passed to a build through `ARG` or `ENV` stay in the final image, and a file copied in one layer can still be recovered after a later layer deletes it. The cheat sheet recommends BuildKit secret mounts for builds and Docker Secrets at runtime. It adds a caveat for Docker Compose: file-backed secrets are bind mounts, and declaring one does not encrypt the file, so the source files on the host need appropriate access permissions and storage encryption.

            ## Expose as little as possible

            Publishing a port with `-p 8000:8000` opens it on every interface. The cheat sheet warns that Docker writes its own firewall rules, so a host firewall such as UFW may not block that port. Binding to `127.0.0.1`, as in the command above, keeps the service local. Custom Docker networks then decide which containers can reach each other.

            My own conclusion from these rules is to publish one gateway and nothing else. In my hydroponic monitoring project, 22 services run in Docker Compose as non-root users, and Traefik with Authelia is the only entry point. Every other service is reachable only through it. None of these settings is difficult. The work is in applying them to every service, not only to the ones that look important.
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
            A threat report is written for people. Its indicators of compromise (IoCs) are meant to be read, copied, and discussed, and they are deliberately made safe to handle. A security tool expects something else: one exact value per field, in a format it recognizes. Most of the work of importing indicators lies between those two forms.

            ## Why indicators arrive in disguise

            Authors defang network indicators so that nobody opens a malicious link by accident and so that mail filters do not block the report itself. A URL becomes `hxxps://files[.]example[.]com/update`, and an address becomes `203[.]0[.]113[.]7`. Other values arrive encoded because that is how they appeared in the evidence: Base64 inside a script, hex in a memory dump, percent-encoding in a web log, and sometimes a string that the malware stored in reverse. None of these match anything until they are restored.

            ## Five steps before import

            1. **Refang.** Undo the defanging: `hxxp` back to `http`, `[.]` back to a dot.
            2. **Decode.** Reverse Base64, hex, or URL encoding, and check that the result looks like an indicator and not like noise.
            3. **Classify.** Decide what each value is: a hash (and which kind, by its length), an IP address, a domain, or a URL.
            4. **Validate.** Reject values that cannot be right, such as an IP address with an octet above 255 or a hash with the wrong length.
            5. **Deduplicate.** The same indicator often appears several times in one report and again in the next.

            Refanging is the simplest step to automate:

            ```python
            import re


            def refang(value: str) -> str:
                """Turn a defanged indicator back into its real form."""
                value = value.strip()
                value = re.sub(r"^hxxp", "http", value, flags=re.IGNORECASE)
                return value.replace("[.]", ".").replace("(.)", ".").replace("[:]", ":")
            ```

            ## A concrete target: Microsoft Defender for Endpoint

            Normalization is easier with a target format in mind. Defender for Endpoint imports indicators from a CSV file with five required columns: `indicatorType`, `indicatorValue`, `action`, `title`, and `description`. The type must be one of `FileSha1`, `FileSha256`, `IpAddress`, `DomainName`, or `Url`.

            ```text
            indicatorType,indicatorValue,action,title,description
            DomainName,files.example.com,Block,Example phishing domain,From a vendor report
            IpAddress,203.0.113.7,Audit,Example suspicious address,From a vendor report
            ```

            Microsoft's documentation adds limits that a clean list still has to respect:

            - A batch holds at most 500 indicators, and a tenant at most 15,000.
            - IP addresses are entered one at a time. CIDR notation, wildcards, and ranges are not supported.
            - Network indicators do not support the `BlockAndRemediate` action, and an indicator set that way will not import.
            - The list of types has no MD5 value, so an MD5 hash from a report cannot go into this file as it is.

            Each of these is a reason to classify and validate before the upload, not after a failed one.

            ## Normalize once, reuse everywhere

            The same cleaned list can feed a SIEM watchlist, a firewall rule set, or an EDR import, each with its own output format. I built a small terminal tool for the Defender case because preparing these files by hand was a repetitive part of my work. Whatever the tool, the principle is the same: normalize first, then convert for each destination.
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
            Every SIEM has its own query language, so a detection written for one platform usually has to be rewritten for the next. Sigma removes that step. It is a generic, open format for describing log events in YAML, and the project sums up its place with a comparison: "Sigma is for log files what Snort is for network traffic and YARA is for files." You write the rule once and convert it into the query your platform needs.

            ## The parts of a rule

            According to the Sigma rules specification, only three parts of a rule are mandatory: `title`, `logsource`, and `detection` with its `condition`. The rest is optional, but most of it is worth filling in:

            - `id`: a globally unique identifier, a randomly generated version 4 UUID.
            - `status`: how mature the rule is, from `experimental` through `test` to `stable`.
            - `description`, `references`, `author`, `date`: what the rule detects, where the idea came from, who wrote it, and when (as `YYYY-MM-DD`).
            - `falsepositives`: known harmless causes of a match.
            - `level`: how critical a match is, one of `informational`, `low`, `medium`, `high`, or `critical`.
            - `tags`: namespaced labels such as `attack.t1059.001`, which links the rule to an ATT&CK technique.

            ## How logsource and detection work together

            `logsource` says which logs the rule applies to. It uses up to three attributes, `category`, `product`, and `service`, alone or in combination. The point is abstraction: `category: process_creation` with `product: windows` describes process start events without naming the tool that recorded them, and the converter's configuration decides which index or table that means in your environment.

            `detection` says what to look for in those logs. It holds one or more named searches, and the structure carries the logic. Values in a list are joined with OR. Fields in a map are joined with AND. Strings are matched case-insensitively, and a modifier added after a pipe character, such as `|endswith` or `|contains`, changes how a value is compared. The `condition` then combines the named searches with `and`, `or`, and `not`, or with patterns such as `all of selection_*`.

            ## A first rule

            This rule looks for PowerShell started by an Office application, which is unusual during normal document work:

            ```yaml
            title: PowerShell Started by an Office Application
            id: 895afad1-2742-419d-b4da-a7c337133461
            status: experimental
            description: Detects a PowerShell process whose parent process is Word, Excel, or PowerPoint.
            references:
                - https://attack.mitre.org/techniques/T1059/001/
            author: Isrofil Amar
            date: 2026-11-02
            logsource:
                category: process_creation
                product: windows
            detection:
                selection_parent:
                    ParentImage|endswith:
                        - '\winword.exe'
                        - '\excel.exe'
                        - '\powerpnt.exe'
                selection_child:
                    Image|endswith:
                        - '\powershell.exe'
                        - '\pwsh.exe'
                condition: all of selection_*
            falsepositives:
                - Office add-ins or macros that start PowerShell for legitimate automation
            level: medium
            tags:
                - attack.t1059.001
            ```

            Read it from the bottom of the `detection` block upwards. The condition requires both selections. Each selection is a map with one field, and each field has a list of values, so the parent must be one of three Office programs and the new process must be one of two PowerShell executables.

            ## From YAML to a query

            A Sigma rule does not run anywhere by itself. Conversion tooling turns it into a query for a specific platform: the SigmaHQ repository points to Sigma CLI as the official command-line converter and to pySigma for building conversion into your own tools. The same repository holds more than 3,000 rules. Reading a few of them next to the specification is a good way to learn, as long as the rule you ship is one you have tested against your own logs.
            MD,
        'image' => 'images/blog/tutorial.svg',
        'published_at' => '2026-11-02',
        'sources' => [
            ['title' => 'SigmaHQ, "Sigma Rules Specification" (public domain)', 'url' => 'https://github.com/SigmaHQ/sigma-specification/blob/main/specification/sigma-rules-specification.md'],
            ['title' => 'SigmaHQ, Sigma rule repository', 'url' => 'https://github.com/SigmaHQ/sigma'],
        ],
    ],
];
