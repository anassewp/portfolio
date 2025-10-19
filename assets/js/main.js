/**
 * ملف جافاسكريبت الرئيسي للواجهة الأمامية
 * مسؤول عن تبديل الثيم، تفعيل التمرير السلس، وإضافة مؤثرات الحركة
 */
(function () {
    // اختيار العناصر الرئيسية التي سيتم التعامل معها
    const html = document.documentElement;
    const themeToggle = document.getElementById('themeToggle');
    const navLinks = document.querySelectorAll('.main-nav a');

    // استرجاع الثيم المحفوظ في التخزين المحلي إن وجد
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        html.setAttribute('data-theme', savedTheme);
    }

    // تبديل الثيم بين الفاتح والداكن وحفظ الاختيار
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const nextTheme = currentTheme === 'theme-dark' ? 'theme-light' : 'theme-dark';
            html.setAttribute('data-theme', nextTheme);
            localStorage.setItem('theme', nextTheme);
        });
    }

    // إضافة تمرير سلس مخصص مع إزاحة بسيطة للرأس المثبت
    navLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            if (link.hash) {
                event.preventDefault();
                const target = document.querySelector(link.hash);
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo({
                        top: elementPosition - headerOffset,
                        behavior: 'smooth',
                    });
                }
            }
        });
    });

    // تطبيق تأثير بسيط عند ظهور العناصر أثناء التمرير
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }
            });
        },
        { threshold: 0.2 }
    );

    document.querySelectorAll('.section').forEach((section) => observer.observe(section));
})();
