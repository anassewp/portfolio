<?php
require_once __DIR__ . '/helpers.php';
$config = require __DIR__ . '/../../config/config.php';
$theme = $config['app']['themes']['light'];
$langAttr = $lang;

if (!function_exists('t')) {
    /**
     * دالة صغيرة لتبسيط استدعاء الترجمات داخل القالب
     */
    function t(array $translations, string $key, string $default): string
    {
        return __t($translations, $key, $default);
    }
}

// توفير بيانات احتياطية في حال كانت القاعدة فارغة أثناء التطوير
$user = $user ?? [
    'name' => 'Anas Abdul\'salam Ahmed',
    'title' => 'Remote IT & Flutter Developer | Data Entry | Digital Content Specialist',
    'bio' => "A results-driven IT graduate (Sep 2025) with a strong foundation in mobile development using Flutter, web integration, data handling, and digital operations. Well-versed in building user-centric applications, managing content strategies, and collaborating remotely. Seeking fully remote opportunities where I can contribute with adaptability, attention to detail, and technical fluency.\n\nخريج تكنولوجيا معلومات، طموح (سبتمبر ٢٠٢٥)، يتمتع بأساس متين في تطوير تطبيقات الجوال باستخدام فلاتر، وتكامل الويب، ومعالجة البيانات، والعمليات الرقمية. مُلِمٌّ ببناء تطبيقات تُركّز على المستخدم، وإدارة استراتيجيات المحتوى، والتعاون عن بُعد. أبحث عن فرص عمل عن بُعد بالكامل، حيث يُمكنني المساهمة بتكيف، ودقة في التفاصيل، وإتقان تقني.",
    'email' => 'placeholder@example.com',
    'phone' => '+967-000-000-000',
];
$technicalSkills = $technicalSkills ?? [
    ['skill_name' => 'Flutter', 'skill_type' => 'technical', 'level' => 90],
    ['skill_name' => 'PHP', 'skill_type' => 'technical', 'level' => 80],
    ['skill_name' => 'MySQL', 'skill_type' => 'technical', 'level' => 85],
];
$softSkills = $softSkills ?? [
    ['skill_name' => 'Effective communication & email etiquette', 'skill_type' => 'personal', 'level' => 90],
    ['skill_name' => 'Remote teamwork and coordination', 'skill_type' => 'personal', 'level' => 88],
    ['skill_name' => 'Time management & task prioritization', 'skill_type' => 'personal', 'level' => 92],
];
$projects = $projects ?? [
    [
        'title' => 'Graduation Flutter App',
        'description' => 'Cross-platform mobile solution that synchronizes with a PHP backend and MySQL database.',
        'link' => '#',
        'image' => 'https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?auto=format&fit=crop&w=800&q=80',
    ],
    [
        'title' => 'School Social Media Presence',
        'description' => 'Digital content management and analytics for Sanaa Al-Ghad Private School.',
        'link' => '#',
        'image' => 'https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?auto=format&fit=crop&w=800&q=80',
    ],
];
$certifications = $certifications ?? [
    ['name' => 'ICDL – International Computer Driving License', 'provider' => 'ICDL', 'score' => 'Excellent 91.57%', 'obtained_at' => '2023-05-01'],
    ['name' => 'Secretarial Diploma – Center for American Studies', 'provider' => 'Center for American Studies', 'score' => 'Excellent 92.29%', 'obtained_at' => '2022-08-01'],
    ['name' => 'Digital Marketing & eCommerce, Human Development & Productivity Certificate', 'provider' => 'Multiple Providers', 'score' => '', 'obtained_at' => '2021-11-01'],
];
$posts = $posts ?? [
    ['title' => 'Building Flutter Apps with Clean Architecture', 'excerpt' => 'Key practices that keep mobile projects scalable.', 'published_at' => '2024-02-01'],
];
$testimonials = $testimonials ?? [
    ['author' => 'Project Supervisor', 'role' => 'University Mentor', 'message' => 'Anas delivered the graduation project with exceptional quality and organization.'],
];
$technologies = [
    ['name' => 'Flutter', 'icon' => 'https://img.icons8.com/color/48/flutter.png'],
    ['name' => 'PHP', 'icon' => 'https://img.icons8.com/officel/48/php-logo.png'],
    ['name' => 'MySQL', 'icon' => 'https://img.icons8.com/fluency/48/mysql-logo.png'],
    ['name' => 'HTML5', 'icon' => 'https://img.icons8.com/color/48/html-5.png'],
    ['name' => 'CSS3', 'icon' => 'https://img.icons8.com/color/48/css3.png'],
];
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($langAttr) ?>" data-theme="<?= htmlspecialchars($theme) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($user['name']) ?> - <?= t($translations, 'meta_portfolio', 'Portfolio') ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body dir="<?= $lang === 'ar' ? 'rtl' : 'ltr' ?>">
    <header class="site-header">
        <div class="container header-content">
            <div class="branding">
                <h1><?= htmlspecialchars($user['name']) ?></h1>
                <p><?= htmlspecialchars($user['title']) ?></p>
            </div>
            <nav class="main-nav">
                <a href="#about"><?= t($translations, 'nav_about', 'About') ?></a>
                <a href="#resume"><?= t($translations, 'nav_resume', 'Resume') ?></a>
                <a href="#skills"><?= t($translations, 'nav_skills', 'Skills') ?></a>
                <a href="#projects"><?= t($translations, 'nav_projects', 'Projects') ?></a>
                <a href="#certifications"><?= t($translations, 'nav_certifications', 'Certifications') ?></a>
                <a href="#contact"><?= t($translations, 'nav_contact', 'Contact') ?></a>
            </nav>
            <div class="header-actions">
                <button id="themeToggle" aria-label="<?= t($translations, 'toggle_theme', 'Switch theme') ?>">🌓</button>
                <div class="language-switcher">
                    <a href="?lang=ar" class="<?= $lang === 'ar' ? 'active' : '' ?>">العربية</a>
                    <span>|</span>
                    <a href="?lang=en" class="<?= $lang === 'en' ? 'active' : '' ?>">English</a>
                </div>
                <a class="admin-link" href="/admin.php"><?= t($translations, 'nav_admin', 'Admin') ?></a>
            </div>
        </div>
    </header>

    <main>
        <section id="about" class="section hero-section">
            <div class="container hero-grid">
                <div class="hero-text">
                    <h2><?= htmlspecialchars($user['title']) ?></h2>
                    <p><?= nl2br(htmlspecialchars($user['bio'])) ?></p>
                    <div class="hero-cta">
                        <a href="#contact" class="btn primary"><?= t($translations, 'cta_hire', 'Hire Me') ?></a>
                        <a href="#projects" class="btn secondary"><?= t($translations, 'cta_projects', 'View Projects') ?></a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=800&q=80" alt="<?= t($translations, 'alt_workspace', 'Professional workspace placeholder') ?>">
                </div>
            </div>
        </section>

        <section id="resume" class="section resume-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_resume', 'Professional Resume') ?></h2>
                <div class="resume-grid">
                    <div class="resume-card">
                        <h3><?= t($translations, 'resume_experience', 'Professional Experience') ?></h3>
                        <ul>
                            <li>
                                <h4><?= t($translations, 'experience_social_media', 'Social Media Manager') ?></h4>
                                <p><?= t($translations, 'experience_school', 'Sanaa Al-Ghad Private School') ?></p>
                            </li>
                            <li>
                                <h4><?= t($translations, 'experience_flutter', 'Freelance Flutter Developer') ?></h4>
                                <p><?= t($translations, 'experience_graduation', 'Graduation Project') ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="resume-card">
                        <h3><?= t($translations, 'resume_contact_details', 'Contact Details') ?></h3>
                        <ul>
                            <li><?= t($translations, 'label_email', 'Email') ?>: <a href="mailto:<?= htmlspecialchars($user['email']) ?>"><?= htmlspecialchars($user['email']) ?></a></li>
                            <li><?= t($translations, 'label_phone', 'Phone / WhatsApp') ?>: <a href="tel:<?= htmlspecialchars($user['phone']) ?>"><?= htmlspecialchars($user['phone']) ?></a></li>
                            <li><?= t($translations, 'label_location', 'Location') ?>: <?= t($translations, 'value_remote', 'Remote') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills" class="section skills-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_skills', 'Skills Overview') ?></h2>
                <div class="skills-grid">
                    <div class="skills-column">
                        <h3><?= t($translations, 'skills_technical', 'Technical Skills') ?></h3>
                        <?php foreach ($technicalSkills as $skill): ?>
                            <div class="skill-item">
                                <span><?= htmlspecialchars($skill['skill_name']) ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: <?= (int)($skill['level'] ?? 80) ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="skills-column">
                        <h3><?= t($translations, 'skills_soft', 'Soft & Interpersonal Skills') ?></h3>
                        <?php foreach ($softSkills as $skill): ?>
                            <div class="skill-item">
                                <span><?= htmlspecialchars($skill['skill_name']) ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: <?= (int)($skill['level'] ?? 85) ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="technologies" class="section technologies-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_technologies', 'Technologies') ?></h2>
                <div class="technology-grid">
                    <?php foreach ($technologies as $tech): ?>
                        <div class="technology-card">
                            <img src="<?= htmlspecialchars($tech['icon']) ?>" alt="<?= htmlspecialchars($tech['name']) ?> icon">
                            <span><?= htmlspecialchars($tech['name']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="projects" class="section projects-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_projects', 'Projects') ?></h2>
                <div class="projects-grid">
                    <?php foreach ($projects as $project): ?>
                        <article class="project-card">
                            <img src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>">
                            <div class="project-body">
                                <h3><?= htmlspecialchars($project['title']) ?></h3>
                                <p><?= htmlspecialchars($project['description']) ?></p>
                                <a href="<?= htmlspecialchars($project['link']) ?>" class="project-link"><?= t($translations, 'link_view_project', 'View Project') ?></a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="certifications" class="section certifications-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_certifications', 'Certifications & Training') ?></h2>
                <div class="certifications-grid">
                    <?php foreach ($certifications as $cert): ?>
                        <div class="cert-card">
                            <h3><?= htmlspecialchars($cert['name']) ?></h3>
                            <p><?= htmlspecialchars($cert['provider']) ?></p>
                            <?php if (!empty($cert['score'])): ?>
                                <span class="cert-score"><?= htmlspecialchars($cert['score']) ?></span>
                            <?php endif; ?>
                            <time><?= date('F Y', strtotime($cert['obtained_at'])) ?></time>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="blog" class="section blog-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_blog', 'Latest Blog Posts') ?></h2>
                <div class="blog-grid">
                    <?php foreach ($posts as $post): ?>
                        <article class="blog-card">
                            <h3><?= htmlspecialchars($post['title']) ?></h3>
                            <p><?= htmlspecialchars($post['excerpt']) ?></p>
                            <time><?= htmlspecialchars($post['published_at']) ?></time>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="testimonials" class="section testimonials-section">
            <div class="container">
                <h2 class="section-title"><?= t($translations, 'section_testimonials', 'Testimonials') ?></h2>
                <div class="testimonials-slider">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <blockquote class="testimonial">
                            <p>“<?= htmlspecialchars($testimonial['message']) ?>”</p>
                            <footer><?= htmlspecialchars($testimonial['author']) ?> – <span><?= htmlspecialchars($testimonial['role']) ?></span></footer>
                        </blockquote>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="contact" class="section contact-section">
            <div class="container contact-grid">
                <div class="contact-info">
                    <h2 class="section-title"><?= t($translations, 'section_contact', 'Contact') ?></h2>
                    <p><?= t($translations, 'label_email', 'Email') ?>: <a href="mailto:<?= htmlspecialchars($user['email']) ?>"><?= htmlspecialchars($user['email']) ?></a></p>
                    <p><?= t($translations, 'label_phone', 'Phone / WhatsApp') ?>: <a href="tel:<?= htmlspecialchars($user['phone']) ?>"><?= htmlspecialchars($user['phone']) ?></a></p>
                    <div class="social-links">
                        <a href="https://www.linkedin.com" target="_blank" rel="noopener">LinkedIn</a>
                        <a href="https://github.com" target="_blank" rel="noopener">GitHub</a>
                    </div>
                </div>
                <form class="contact-form" action="mailto:<?= htmlspecialchars($user['email']) ?>" method="post">
                    <label>
                        <?= t($translations, 'form_name', 'Your Name') ?>
                        <input type="text" name="name" required>
                    </label>
                    <label>
                        <?= t($translations, 'form_email', 'Your Email') ?>
                        <input type="email" name="email" required>
                    </label>
                    <label>
                        <?= t($translations, 'form_message', 'Message') ?>
                        <textarea name="message" rows="5" required></textarea>
                    </label>
                    <button type="submit" class="btn primary"><?= t($translations, 'form_send', 'Send Message') ?></button>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($user['name']) ?>. <?= t($translations, 'footer_rights', 'All rights reserved.') ?></p>
        </div>
    </footer>

    <script src="/assets/js/main.js"></script>
</body>
</html>
