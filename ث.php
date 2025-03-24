<?php
/**
 * Author: Fahed
 * Skeleton Pattern Example in PHP
 *
 * هذا الكود يمثل الهيكل الأساسي (Skeleton) لإنشاء صفحات مختلفة بطريقة منظمة.
 */

// الهيكل الأساسي (Skeleton) للصفحات
abstract class PageSkeleton {
    // طريقة عامة لإنشاء الصفحة
    public function renderPage() {
        echo "<h1>" . $this->getTitle() . "</h1>";
        echo "<p>" . $this->getContent() . "</p>";
    }

    // يجب على الفئات الفرعية تنفيذ هذه الدوال
    abstract protected function getTitle();
    abstract protected function getContent();
}

// فئة تمثل الصفحة الرئيسية
class HomePage extends PageSkeleton {
    protected function getTitle() {
        return "Welcome to Home Page";
    }

    protected function getContent() {
        return "This is the content of the home page.";
    }
}

// فئة تمثل صفحة عنّا
class AboutPage extends PageSkeleton {
    protected function getTitle() {
        return "About Us";
    }

    protected function getContent() {
        return "We are a company dedicated to software development.";
    }
}

// استخدام الفئات
$home = new HomePage();
$home->renderPage();

$about = new AboutPage();
$about->renderPage();
?>
