<?php
require_once __DIR__ . '/../Models/UserModel.php';
require_once __DIR__ . '/../Models/SkillModel.php';
require_once __DIR__ . '/../Models/ProjectModel.php';
require_once __DIR__ . '/../Models/CertificationModel.php';
require_once __DIR__ . '/../Models/LanguageModel.php';
require_once __DIR__ . '/../Models/BlogModel.php';
require_once __DIR__ . '/../Models/TestimonialModel.php';

/**
 * متحكم لوحة الإدارة لمعالجة الطلبات القادمة من النماذج المختلفة
 */
class AdminController
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
        $this->userModel = new UserModel();
        $this->skillModel = new SkillModel();
        $this->projectModel = new ProjectModel();
        $this->certificationModel = new CertificationModel();
        $this->languageModel = new LanguageModel();
        $this->blogModel = new BlogModel();
        $this->testimonialModel = new TestimonialModel();
    }

    /**
     * معالجة تحديث بيانات المستخدم
     */
    public function updateUser(array $data)
    {
        $this->userModel->updateUser($data);
        header('Location: /admin.php?success=1');
    }

    /**
     * إضافة أو تحديث مهارة
     */
    public function saveSkill(array $data)
    {
        if (!empty($data['id'])) {
            $this->skillModel->updateSkill($data);
        } else {
            $this->skillModel->createSkill($data);
        }
        header('Location: /admin.php?tab=skills&success=1');
    }

    public function saveProject(array $data)
    {
        $this->projectModel->save($data);
        header('Location: /admin.php?tab=projects&success=1');
    }

    public function saveCertification(array $data)
    {
        $this->certificationModel->save($data);
        header('Location: /admin.php?tab=certifications&success=1');
    }

    public function saveTranslation(array $data)
    {
        $this->languageModel->saveTranslation($data);
        header('Location: /admin.php?tab=translations&success=1');
    }

    public function savePost(array $data)
    {
        $this->blogModel->save($data);
        header('Location: /admin.php?tab=blog&success=1');
    }

    public function saveTestimonial(array $data)
    {
        $this->testimonialModel->save($data);
        header('Location: /admin.php?tab=testimonials&success=1');
    }
}
