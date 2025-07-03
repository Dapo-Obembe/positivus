// Light-Dark Mode Toggle
document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.querySelector('#theme-toggle');
    const themeDarkIcon = document.querySelector('.dark-icon');
    const themeLightIcon = document.querySelector('.light-icon');

    // Set initial theme based on saved preference or system
    const userPref = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (userPref === 'dark' || (!userPref && systemPrefersDark)) {
        document.documentElement.classList.add('dark');
        themeDarkIcon.classList.remove('hidden');
        themeLightIcon.classList.add('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        themeDarkIcon.classList.add('hidden');
        themeLightIcon.classList.remove('hidden');
    }

    themeToggle.addEventListener('click', () => {
        const isDark = document.documentElement.classList.toggle('dark');

        if (isDark) {
            themeLightIcon.classList.add('hidden');
            themeDarkIcon.classList.remove('hidden');
        } else {
            themeLightIcon.classList.remove('hidden');
            themeDarkIcon.classList.add('hidden');
        }

        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
});
