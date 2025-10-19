-- مخطط قاعدة البيانات لموقع السيرة الذاتية
CREATE DATABASE IF NOT EXISTS personal_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE personal_website;

CREATE TABLE IF NOT EXISTS user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    title VARCHAR(150) NOT NULL,
    bio TEXT,
    email VARCHAR(150),
    phone VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100) NOT NULL,
    skill_type ENUM('technical', 'personal') NOT NULL,
    level TINYINT DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    link VARCHAR(255),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS certifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    provider VARCHAR(150),
    score VARCHAR(100),
    obtained_at DATE
);

CREATE TABLE IF NOT EXISTS translations (
    translation_key VARCHAR(150) NOT NULL,
    language VARCHAR(5) NOT NULL,
    translation_value TEXT,
    PRIMARY KEY (translation_key, language)
);

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    excerpt TEXT,
    content LONGTEXT,
    published TINYINT(1) DEFAULT 0,
    published_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author VARCHAR(150) NOT NULL,
    role VARCHAR(150),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- إدراج بيانات افتراضية للمساعدة في بدء المشروع بسرعة
INSERT INTO user_data (name, title, bio, email, phone) VALUES
('Anas Abdul''salam Ahmed', 'Remote IT & Flutter Developer | Data Entry | Digital Content Specialist', 'A results-driven IT graduate (Sep 2025) with a strong foundation in mobile development using Flutter, web integration, data handling, and digital operations. Well-versed in building user-centric applications, managing content strategies, and collaborating remotely. Seeking fully remote opportunities where I can contribute with adaptability, attention to detail, and technical fluency.\n\nخريج تكنولوجيا معلومات، طموح (سبتمبر ٢٠٢٥)، يتمتع بأساس متين في تطوير تطبيقات الجوال باستخدام فلاتر، وتكامل الويب، ومعالجة البيانات، والعمليات الرقمية. مُلِمٌّ ببناء تطبيقات تُركّز على المستخدم، وإدارة استراتيجيات المحتوى، والتعاون عن بُعد. أبحث عن فرص عمل عن بُعد بالكامل، حيث يُمكنني المساهمة بتكيف، ودقة في التفاصيل، وإتقان تقني.', 'placeholder@example.com', '+967-000-000-000');

INSERT INTO skills (skill_name, skill_type, level) VALUES
('Flutter', 'technical', 90),
('PHP', 'technical', 85),
('MySQL', 'technical', 82),
('Effective communication & email etiquette', 'personal', 90),
('Remote teamwork and coordination', 'personal', 88),
('Time management & task prioritization', 'personal', 92);

INSERT INTO certifications (name, provider, score, obtained_at) VALUES
('ICDL – International Computer Driving License', 'ICDL', 'Excellent 91.57%', '2023-05-01'),
('Secretarial Diploma – Center for American Studies', 'Center for American Studies', 'Excellent 92.29%', '2022-08-01'),
('Digital Marketing & eCommerce, Human Development & Productivity Certificate', 'Multiple Providers', '', '2021-11-01');

INSERT INTO translations (translation_key, language, translation_value) VALUES
('meta_portfolio', 'ar', 'المعرض المهني'),
('meta_portfolio', 'en', 'Portfolio'),
('nav_about', 'ar', 'نبذة'),
('nav_about', 'en', 'About'),
('nav_resume', 'ar', 'السيرة الذاتية'),
('nav_resume', 'en', 'Resume'),
('nav_skills', 'ar', 'المهارات'),
('nav_skills', 'en', 'Skills'),
('nav_projects', 'ar', 'المشاريع'),
('nav_projects', 'en', 'Projects'),
('nav_certifications', 'ar', 'الشهادات'),
('nav_certifications', 'en', 'Certifications'),
('nav_contact', 'ar', 'تواصل'),
('nav_contact', 'en', 'Contact'),
('nav_admin', 'ar', 'لوحة التحكم'),
('nav_admin', 'en', 'Admin'),
('toggle_theme', 'ar', 'تغيير المظهر'),
('toggle_theme', 'en', 'Switch theme'),
('cta_hire', 'ar', 'تواصل معي'),
('cta_hire', 'en', 'Hire Me'),
('cta_projects', 'ar', 'عرض الأعمال'),
('cta_projects', 'en', 'View Projects'),
('alt_workspace', 'ar', 'صورة بيئة عمل احترافية'),
('alt_workspace', 'en', 'Professional workspace placeholder'),
('section_resume', 'ar', 'السيرة المهنية'),
('section_resume', 'en', 'Professional Resume'),
('resume_experience', 'ar', 'الخبرات العملية'),
('resume_experience', 'en', 'Professional Experience'),
('experience_social_media', 'ar', 'مدير وسائل التواصل الاجتماعي'),
('experience_social_media', 'en', 'Social Media Manager'),
('experience_school', 'ar', 'مدرسة صنعاء الغد الأهلية'),
('experience_school', 'en', 'Sanaa Al-Ghad Private School'),
('experience_flutter', 'ar', 'مطور فلاتر حر'),
('experience_flutter', 'en', 'Freelance Flutter Developer'),
('experience_graduation', 'ar', 'مشروع التخرج'),
('experience_graduation', 'en', 'Graduation Project'),
('resume_contact_details', 'ar', 'بيانات التواصل'),
('resume_contact_details', 'en', 'Contact Details'),
('label_email', 'ar', 'البريد الإلكتروني'),
('label_email', 'en', 'Email'),
('label_phone', 'ar', 'الهاتف / واتساب'),
('label_phone', 'en', 'Phone / WhatsApp'),
('label_location', 'ar', 'الموقع'),
('label_location', 'en', 'Location'),
('value_remote', 'ar', 'عن بُعد'),
('value_remote', 'en', 'Remote'),
('section_skills', 'ar', 'نظرة على المهارات'),
('section_skills', 'en', 'Skills Overview'),
('skills_technical', 'ar', 'المهارات التقنية'),
('skills_technical', 'en', 'Technical Skills'),
('skills_soft', 'ar', 'المهارات الشخصية والتواصلية'),
('skills_soft', 'en', 'Soft & Interpersonal Skills'),
('section_technologies', 'ar', 'التقنيات المستخدمة'),
('section_technologies', 'en', 'Technologies'),
('section_projects', 'ar', 'الأعمال والمشاريع'),
('section_projects', 'en', 'Projects'),
('link_view_project', 'ar', 'عرض المشروع'),
('link_view_project', 'en', 'View Project'),
('section_certifications', 'ar', 'الشهادات والدورات'),
('section_certifications', 'en', 'Certifications & Training'),
('section_blog', 'ar', 'أحدث مقالات المدونة'),
('section_blog', 'en', 'Latest Blog Posts'),
('section_testimonials', 'ar', 'آراء العملاء'),
('section_testimonials', 'en', 'Testimonials'),
('section_contact', 'ar', 'بيانات التواصل'),
('section_contact', 'en', 'Contact'),
('form_name', 'ar', 'الاسم'),
('form_name', 'en', 'Your Name'),
('form_email', 'ar', 'البريد الإلكتروني'),
('form_email', 'en', 'Your Email'),
('form_message', 'ar', 'الرسالة'),
('form_message', 'en', 'Message'),
('form_send', 'ar', 'إرسال الرسالة'),
('form_send', 'en', 'Send Message'),
('footer_rights', 'ar', 'جميع الحقوق محفوظة.'),
('footer_rights', 'en', 'All rights reserved.');
