# Contributing

This document describes how the project is built, reviewed, and released. It applies to every change, whether written by hand or with a coding assistant.

## Stack

- PHP 8.3 or newer, Laravel 13, Blade
- Bootstrap 5.3.9 and Bootstrap Icons 1.13.2, loaded from jsDelivr with Subresource Integrity
- Plain CSS in `public/css` and plain JavaScript in `public/js` (no build step)
- Content in v1 comes from PHP arrays in `database/` and `config/site.php`

## Branches

| Branch | Purpose |
| --- | --- |
| `main` | Released versions only. Every release is tagged (`v1.0.0`, `v2.0.0`, ...). |
| `develop` | Integration branch. All feature work is merged here first. |
| `feat/*`, `fix/*`, `docs/*`, `chore/*`, `refactor/*` | Short-lived work branches, created from `develop`. |

- `main` and `develop` are protected: changes arrive only through pull requests, force pushes and deletion are blocked.
- Every pull request is merged with **Create a merge commit**. Squash and rebase merging are disabled so the history of each pull request stays visible.
- A release is a pull request from `develop` to `main`, followed by a GitHub Release that creates the tag. Versions follow [Semantic Versioning](https://semver.org/).

## Commits

Commit messages follow [Conventional Commits](https://www.conventionalcommits.org/):

```
<type>(<scope>): <summary in imperative mood>
```

- Types: `feat`, `fix`, `docs`, `style`, `refactor`, `test`, `chore`
- Scopes (optional): `home`, `about`, `portfolio`, `blog`, `contact`, `layout`, `ui`, `security`, `deps`, `release`
- Write in English, keep the summary under 72 characters, no trailing period, no emoji.
- One logical change per commit.
- No `Co-Authored-By` or other attribution trailers.

Examples: `feat(blog): add article detail page`, `fix(layout): keep navbar links visible on tablets`.

## Pull requests

- Target `develop` (except release pull requests, which target `main`).
- Use the pull request template and reference the issue with `Closes #<number>`. Because `main` is the default branch, GitHub only closes issues automatically when changes reach `main`; close the issue manually after merging into `develop`.
- Keep each pull request focused on one issue.
- The author reviews the diff and runs the site locally before merging.

## Code conventions

### Routes and controllers

- Every route has a name. Collections use `.index`, single items use `.show` (`blog.index`, `blog.show`).
- Route parameters for slugs are constrained: `->where('slug', '[a-z0-9-]+')`.
- Controllers live in `App\Http\Controllers`, are created with `php artisan make:controller`, and declare return types (`: View`).
- Controllers prepare data; views only display it. No business logic in Blade.
- Content files in `database/` return arrays and are loaded with `include base_path('database/<file>.php')`.
- A missing item returns 404: find it with a strict comparison, then `abort_if($item === null, 404)`.

### Blade

- Every page starts with `@extends('layout.default')` on the first line.
- Output uses `{{ }}`. The only `{!! !!}` in the project renders article HTML produced by `Str::markdown()` with `html_input => 'strip'` and `allow_unsafe_links => false`.
- No `@php` blocks, no inline `<script>` or `<style>`, and no `style="..."` attributes. The Content Security Policy blocks them.
- Components are anonymous components in `resources/views/components` and declare their data with `@props`.
- Internal links use `route()`. Files in `public/` use `asset()`.
- External links that open in a new tab use `target="_blank" rel="noopener noreferrer"`.
- Images have meaningful `alt` text, explicit `width` and `height`, and `loading="lazy"` when they are below the fold.

### CSS and JavaScript

- Styling uses Bootstrap utilities first, then `public/css/style.css`. Colors and fonts are set through Bootstrap CSS variables.
- Animations respect `prefers-reduced-motion`.
- JavaScript lives in `public/js` and is loaded with `<script src>`.

### Comments

- Written in English, short, and explain *why* rather than *what*.

## Verification

Run these before opening a pull request:

```bash
php artisan route:list --except-vendor   # routes and names are as expected
php artisan test                         # test suite passes
./vendor/bin/pint --test                 # code style is clean
composer audit                           # no known vulnerable dependencies
```

Then check the changed pages in a browser at 375 px, 768 px, and 1280 px wide, with the developer console open (no errors, no Content Security Policy violations).

## Security

- `.env` is never committed. `.env.example` contains no secrets.
- Third-party assets are pinned to exact versions and loaded with an `integrity` hash.
- Response security headers are set in `app/Http/Middleware/SecurityHeaders.php`, registered globally in `bootstrap/app.php`.
