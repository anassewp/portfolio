<?php
require_once __DIR__ . '/../Models/UserModel.php';
require_once __DIR__ . '/../Models/SkillModel.php';
require_once __DIR__ . '/../Models/ProjectModel.php';
require_once __DIR__ . '/../Models/CertificationModel.php';
require_once __DIR__ . '/../Models/LanguageModel.php';
require_once __DIR__ . '/../Models/BlogModel.php';
require_once __DIR__ . '/../Models/TestimonialModel.php';

$userModel = new UserModel();
$skillModel = new SkillModel();
$projectModel = new ProjectModel();
$certificationModel = new CertificationModel();
$languageModel = new LanguageModel();
$blogModel = new BlogModel();
$testimonialModel = new TestimonialModel();

$user = $userModel->getUser();
$technicalSkills = $skillModel->getSkillsByType('technical');
$softSkills = $skillModel->getSkillsByType('personal');
$projects = $projectModel->getAll();
$certifications = $certificationModel->getAll();
$translationsAr = $languageModel->getTranslations('ar');
$translationsEn = $languageModel->getTranslations('en');
$posts = $blogModel->getPublished();
$testimonials = $testimonialModel->getAll();
$tab = $_GET['tab'] ?? 'profile';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>لوحة التحكم</h2>
            <nav>
                <a href="?tab=profile" class="<?= $tab === 'profile' ? 'active' : '' ?>">الملف الشخصي</a>
                <a href="?tab=skills" class="<?= $tab === 'skills' ? 'active' : '' ?>">المهارات</a>
                <a href="?tab=projects" class="<?= $tab === 'projects' ? 'active' : '' ?>">المشاريع</a>
                <a href="?tab=certifications" class="<?= $tab === 'certifications' ? 'active' : '' ?>">الشهادات</a>
                <a href="?tab=translations" class="<?= $tab === 'translations' ? 'active' : '' ?>">الترجمة</a>
                <a href="?tab=blog" class="<?= $tab === 'blog' ? 'active' : '' ?>">المدونة</a>
                <a href="?tab=testimonials" class="<?= $tab === 'testimonials' ? 'active' : '' ?>">الآراء</a>
                <a href="/" class="exit">العودة للموقع</a>
            </nav>
        </aside>
        <main class="content">
            <?php if (isset($_GET['success'])): ?>
                <div class="alert success">تم حفظ البيانات بنجاح.</div>
            <?php endif; ?>

            <?php if ($tab === 'profile'): ?>
                <section>
                    <h2>تحديث البيانات الشخصية</h2>
                    <form action="/public/admin-handler.php" method="post">
                        <input type="hidden" name="action" value="updateUser">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'] ?? 1) ?>">
                        <label>الاسم الكامل
                            <input type="text" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
                        </label>
                        <label>المسمى الوظيفي
                            <input type="text" name="title" value="<?= htmlspecialchars($user['title'] ?? '') ?>" required>
                        </label>
                        <label>الملخص المهني
                            <textarea name="bio" rows="6" required><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                        </label>
                        <label>البريد الإلكتروني
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                        </label>
                        <label>رقم الهاتف
                            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" required>
                        </label>
                        <button type="submit">حفظ</button>
                    </form>
                </section>
            <?php elseif ($tab === 'skills'): ?>
                <section>
                    <h2>إدارة المهارات</h2>
                    <form action="/public/admin-handler.php" method="post" class="inline-form">
                        <input type="hidden" name="action" value="saveSkill">
                        <label>اسم المهارة
                            <input type="text" name="skill_name" required>
                        </label>
                        <label>النوع
                            <select name="skill_type">
                                <option value="technical">فنية</option>
                                <option value="personal">شخصية</option>
                            </select>
                        </label>
                        <label>النسبة المئوية
                            <input type="number" name="level" min="0" max="100" value="80">
                        </label>
                        <button type="submit">إضافة</button>
                    </form>

                    <div class="skills-list">
                        <h3>المهارات الحالية</h3>
                        <ul>
                            <?php foreach (array_merge($technicalSkills, $softSkills) as $skill): ?>
                                <li><?= htmlspecialchars($skill['skill_name']) ?> - <?= htmlspecialchars($skill['skill_type']) ?> (<?= (int)($skill['level'] ?? 0) ?>%)</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            <?php elseif ($tab === 'projects'): ?>
                <section>
                    <h2>إدارة المشاريع</h2>
                    <form action="/public/admin-handler.php" method="post">
                        <input type="hidden" name="action" value="saveProject">
                        <label>عنوان المشروع
                            <input type="text" name="title" required>
                        </label>
                        <label>وصف المشروع
                            <textarea name="description" rows="4" required></textarea>
                        </label>
                        <label>رابط المشروع
                            <input type="url" name="link">
                        </label>
                        <label>رابط الصورة (مؤقت)
                            <input type="url" name="image" placeholder="https://">
                        </label>
                        <button type="submit">حفظ المشروع</button>
                    </form>

                    <div class="items-list">
                        <?php foreach ($projects as $project): ?>
                            <article>
                                <h3><?= htmlspecialchars($project['title']) ?></h3>
                                <p><?= htmlspecialchars($project['description']) ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php elseif ($tab === 'certifications'): ?>
                <section>
                    <h2>إدارة الشهادات</h2>
                    <form action="/public/admin-handler.php" method="post">
                        <input type="hidden" name="action" value="saveCertification">
                        <label>اسم الشهادة
                            <input type="text" name="name" required>
                        </label>
                        <label>الجهة المانحة
                            <input type="text" name="provider">
                        </label>
                        <label>التقدير / الدرجة
                            <input type="text" name="score">
                        </label>
                        <label>تاريخ الحصول
                            <input type="date" name="obtained_at" required>
                        </label>
                        <button type="submit">إضافة شهادة</button>
                    </form>

                    <div class="items-list">
                        <?php foreach ($certifications as $cert): ?>
                            <article>
                                <h3><?= htmlspecialchars($cert['name']) ?></h3>
                                <p><?= htmlspecialchars($cert['provider']) ?> - <?= htmlspecialchars($cert['score']) ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php elseif ($tab === 'translations'): ?>
                <section>
                    <h2>إدارة الترجمات</h2>
                    <form action="/public/admin-handler.php" method="post" class="inline-form">
                        <input type="hidden" name="action" value="saveTranslation">
                        <label>المفتاح
                            <input type="text" name="translation_key" required>
                        </label>
                        <label>اللغة
                            <select name="language">
                                <option value="ar">العربية</option>
                                <option value="en">الإنجليزية</option>
                            </select>
                        </label>
                        <label>النص
                            <input type="text" name="translation_value" required>
                        </label>
                        <button type="submit">حفظ الترجمة</button>
                    </form>

                    <div class="translations-columns">
                        <div>
                            <h3>العربية</h3>
                            <ul>
                                <?php foreach ($translationsAr as $key => $value): ?>
                                    <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <h3>الإنجليزية</h3>
                            <ul>
                                <?php foreach ($translationsEn as $key => $value): ?>
                                    <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </section>
            <?php elseif ($tab === 'blog'): ?>
                <section>
                    <h2>إدارة المدونة</h2>
                    <form action="/public/admin-handler.php" method="post">
                        <input type="hidden" name="action" value="savePost">
                        <label>عنوان المقال
                            <input type="text" name="title" required>
                        </label>
                        <label>ملخص قصير
                            <textarea name="excerpt" rows="3" required></textarea>
                        </label>
                        <label>المحتوى
                            <textarea name="content" rows="6" required></textarea>
                        </label>
                        <label>نشر؟
                            <select name="published">
                                <option value="1">نعم</option>
                                <option value="0">لاحقاً</option>
                            </select>
                        </label>
                        <button type="submit">حفظ المقال</button>
                    </form>

                    <div class="items-list">
                        <?php foreach ($posts as $post): ?>
                            <article>
                                <h3><?= htmlspecialchars($post['title']) ?></h3>
                                <p><?= htmlspecialchars($post['excerpt']) ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php elseif ($tab === 'testimonials'): ?>
                <section>
                    <h2>إدارة الآراء</h2>
                    <form action="/public/admin-handler.php" method="post">
                        <input type="hidden" name="action" value="saveTestimonial">
                        <label>الاسم
                            <input type="text" name="author" required>
                        </label>
                        <label>الصفة / الوظيفة
                            <input type="text" name="role">
                        </label>
                        <label>النص
                            <textarea name="message" rows="3" required></textarea>
                        </label>
                        <button type="submit">إضافة</button>
                    </form>

                    <div class="items-list">
                        <?php foreach ($testimonials as $testimonial): ?>
                            <article>
                                <h3><?= htmlspecialchars($testimonial['author']) ?></h3>
                                <p><?= htmlspecialchars($testimonial['message']) ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
