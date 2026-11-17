// Loaded in <head> without defer, so the theme is set before the first paint (no light flash in dark mode).
(function () {
    'use strict';

    const STORAGE_KEY = 'theme';
    const THEMES = {
        light: { label: 'Light', icon: 'bi-sun-fill' },
        dark: { label: 'Dark', icon: 'bi-moon-stars-fill' },
        auto: { label: 'Auto', icon: 'bi-circle-half' },
    };
    const media = window.matchMedia('(prefers-color-scheme: dark)');

    // Storage can throw (private windows, blocked site data); the theme then lasts for this page only.
    function readStored() {
        try {
            const value = localStorage.getItem(STORAGE_KEY);
            return value === 'light' || value === 'dark' ? value : 'auto';
        } catch (error) {
            return 'auto';
        }
    }

    function store(theme) {
        try {
            if (theme === 'auto') {
                localStorage.removeItem(STORAGE_KEY);
            } else {
                localStorage.setItem(STORAGE_KEY, theme);
            }
        } catch (error) {
            // Not persisted; the choice still applies to the current page.
        }
    }

    // Bootstrap only knows "light" and "dark", so "auto" is resolved here.
    function apply(theme) {
        const resolved = theme === 'auto' ? (media.matches ? 'dark' : 'light') : theme;
        document.documentElement.setAttribute('data-bs-theme', resolved);
    }

    function showSelected(theme) {
        document.querySelectorAll('[data-theme-value]').forEach(function (button) {
            const selected = button.getAttribute('data-theme-value') === theme;
            button.classList.toggle('active', selected);
            button.setAttribute('aria-pressed', String(selected));
        });

        const toggle = document.querySelector('[data-theme-toggle]');
        if (toggle) {
            toggle.setAttribute('aria-label', 'Theme: ' + THEMES[theme].label);
            const icon = toggle.querySelector('.bi');
            if (icon) {
                icon.className = 'bi ' + THEMES[theme].icon;
            }
        }
    }

    let current = readStored();
    apply(current);

    media.addEventListener('change', function () {
        if (current === 'auto') {
            apply('auto');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        showSelected(current);

        document.querySelectorAll('[data-theme-value]').forEach(function (button) {
            button.addEventListener('click', function () {
                const theme = button.getAttribute('data-theme-value');
                if (!Object.prototype.hasOwnProperty.call(THEMES, theme)) {
                    return;
                }
                current = theme;
                store(theme);
                apply(theme);
                showSelected(theme);
            });
        });
    });
})();
