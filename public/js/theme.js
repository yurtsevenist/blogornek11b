(function () {
    var storageKey = 'not-defteri-theme';
    var root = document.documentElement;
    var preferredTheme = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    var initialTheme = preferredTheme;

    try {
        var storedTheme = window.localStorage.getItem(storageKey);
        if (storedTheme === 'light' || storedTheme === 'dark') {
            initialTheme = storedTheme;
        }
    } catch (error) {
        // Theme switching still works for this visit when storage is unavailable.
    }

    root.setAttribute('data-theme', initialTheme);

    document.addEventListener('DOMContentLoaded', function () {
        var button = document.querySelector('.theme-toggle');
        if (!button) return;

        var icon = button.querySelector('.theme-toggle-icon');
        var text = button.querySelector('.theme-toggle-text');

        function updateButton(theme) {
            var nextTheme = theme === 'dark' ? 'light' : 'dark';
            var label = nextTheme === 'dark' ? 'Koyu temaya geç' : 'Açık temaya geç';
            button.setAttribute('aria-label', label);
            button.setAttribute('title', label);
            button.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
            if (icon) icon.textContent = theme === 'dark' ? '☀' : '☾';
            if (text) text.textContent = nextTheme === 'dark' ? 'Koyu tema' : 'Açık tema';
        }

        updateButton(root.getAttribute('data-theme'));
        button.addEventListener('click', function () {
            var nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            root.setAttribute('data-theme', nextTheme);
            updateButton(nextTheme);
            try {
                window.localStorage.setItem(storageKey, nextTheme);
            } catch (error) {
                // Keep the selected theme active until this page is closed.
            }
        });
    });
}());
