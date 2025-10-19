<?php
require_once __DIR__ . '/../Models/UserModel.php';
require_once __DIR__ . '/../Models/SkillModel.php';
require_once __DIR__ . '/../Models/ProjectModel.php';
require_once __DIR__ . '/../Models/CertificationModel.php';
require_once __DIR__ . '/../Models/LanguageModel.php';
require_once __DIR__ . '/../Models/BlogModel.php';
require_once __DIR__ . '/../Models/TestimonialModel.php';

/**
 * المتحكم الرئيسي للواجهة الأمامية للموقع
 */
class HomeController
{
    protected $userModel;
    protected $skillModel;
    protected $projectModel;
    protected $certificationModel;
    protected $languageModel;
    protected $blogModel;
    protected $testimonialModel;

    public function __construct()
    {
        // إنشاء مثيلات النماذج المختلفة
        $this->userModel = new UserModel();
        $this->skillModel = new SkillModel();
        $this->projectModel = new ProjectModel();
        $this->certificationModel = new CertificationModel();
        $this->languageModel = new LanguageModel();
        $this->blogModel = new BlogModel();
        $this->testimonialModel = new TestimonialModel();
    }

    /**
     * عرض الصفحة الرئيسية مع تمرير البيانات اللازمة للقالب
     */
    public function index(string $lang)
    {
        $translations = $this->languageModel->getTranslations($lang);
        $user = $this->userModel->getUser();
        $technicalSkills = $this->skillModel->getSkillsByType('technical');
        $softSkills = $this->skillModel->getSkillsByType('personal');
        $projects = $this->projectModel->getAll();
        $certifications = $this->certificationModel->getAll();
        $posts = $this->blogModel->getPublished();
        $testimonials = $this->testimonialModel->getAll();

        require __DIR__ . '/../Views/home.php';
    }
}
