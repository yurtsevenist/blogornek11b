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

document.addEventListener('DOMContentLoaded', function () {
    var loadMore = document.querySelector('[data-infinite-scroll]');
    var blogList = document.querySelector('.blog-list');
    if (!loadMore || !blogList) return;

    var link = loadMore.querySelector('a');
    var status = loadMore.querySelector('.blog-loading');
    var loading = false;

    function fetchNextPage() {
        if (loading || !loadMore.dataset.nextUrl) return;

        loading = true;
        loadMore.classList.remove('has-error');
        loadMore.classList.add('is-loading');
        loadMore.setAttribute('aria-busy', 'true');

        fetch(loadMore.dataset.nextUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
            .then(function (response) {
                if (!response.ok) throw new Error('Yazılar yüklenemedi.');
                return response.json();
            })
            .then(function (data) {
                blogList.insertAdjacentHTML('beforeend', data.html);
                loadMore.dataset.nextUrl = data.next_page_url || '';

                if (data.next_page_url) {
                    link.href = data.next_page_url;
                    status.textContent = 'Yazılar yükleniyor…';
                } else {
                    loadMore.remove();
                }
            })
            .catch(function () {
                status.textContent = 'Yükleme başarısız. Tekrar denemek için tıkla.';
                loadMore.classList.add('has-error');
            })
            .finally(function () {
                loading = false;
                if (document.body.contains(loadMore)) {
                    loadMore.classList.remove('is-loading');
                    loadMore.removeAttribute('aria-busy');
                }
            });
    }

    link.addEventListener('click', function (event) {
        event.preventDefault();
        fetchNextPage();
    });

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            if (entries[0].isIntersecting) fetchNextPage();
        }, { rootMargin: '400px 0px' });
        observer.observe(loadMore);
    }
});
