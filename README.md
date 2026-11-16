# Laravel 12 Complete Masterclass & RESTful API Journey 🚀
### رحلة الاحتراف الشاملة في لارافيل 12 وبناء واجهات برمجة التطبيقات

A comprehensive repository documenting my complete backend development journey in **Laravel 12**, starting from the core fundamentals (MVC, Routing, Database Migrations, Eloquent ORM) all the way to building production-ready, secure **RESTful APIs** protected with **Laravel Sanctum**.  
هذا المستودع يوثق رحلتي الكاملة في تطوير الـ Backend باستخدام **Laravel 12**، بدءاً من الأساسيات البرمجية (MVC، المسارات، الميجريشن، وقواعد البيانات) وصولاً إلى بناء واجهات برمجة تطبيقات احترافية وآمنة باستخدام **Laravel Sanctum**.

---

## 🛠️ Tech Stack & Tools | التقنيات والأدوات المستخدمة
* **Framework / الإطار:** Laravel 12 (PHP)
* **Authentication / المصادقة:** Laravel Sanctum (Token-based API Authentication)
* **API Testing / الاختبار:** Postman (with Environment Variables & Standardized Headers)
* **Database & ORM / قواعد البيانات:** MySQL / Eloquent ORM & Migrations
* **Environment / البيئة:** XAMPP, Composer, Visual Studio Code
* **Version Control / إدارة الإصدارات:** Git & GitHub

---

## 📚 Course Curriculum & Progress Milestones | محطات وإنجازات الكورس

### Part 1: Core Fundamentals, MVC & Routing (Videos 1–18)
### القسم الأول: الأساسيات، معمارية MVC، والمسارات
* Setting up development environment (XAMPP, Composer, VS Code, Laravel 12 installation).  
  *(إعداد بيئة العمل وتثبيت لارافيل).*
* Understanding the **MVC Architecture** (Model-View-Controller) and Request Lifecycle.  
  *(فهم معمارية MVC ودورة حياة الطلب).*
* Mastering **Routing**: parameters, regular expression constraints, prefixes, and fallback routes.  
  *(احتراف المسارات والقيود والبارامترات).*
* Working with Controllers, Blade Templating Engine, and reusable layouts.  
  *(التعامل مع المتحكمات ومحرك قوالب Blade).*

### Part 2: Database, Migrations & Eloquent ORM (Videos 29–50)
### القسم الثاني: قواعد البيانات، الميجريشن، والـ ORM
* Managing database schema using **Migrations** (creating, adding, updating, and dropping columns/rollbacks).  
  *(إدارة الجداول عبر الميجريشن).*
* Working with **Eloquent Models**, Factories, Seeding, and CRUD operations.  
  *(التعامل مع النماذج، البيانات الوهمية، وعمليات الـ CRUD).*
* Advanced queries: Pagination, Where clauses, Query Builder, Soft Deletes, and Query Scopes.  
  *(الاستعلامات المتقدمة، التصفح، والحذف الجزئي).*
* Database Relationships: One-to-One, One-to-Many, and Many-to-Many.  
  *(علاقات قاعدة البيانات).*

### Part 3: Advanced Features, Services & Architecture (Videos 51–136)
### القسم الثالث: الميزات المتقدمة وهندسة التطبيق
* Real-world Mini-project: Course Booking System implementation.  
  *(مشروع نظام حجز الكورسات العملي).*
* Advanced Laravel features: AJAX Search, Middlewares, Localization (multi-language), Custom Helpers, and Traits.  
  *(البحث بالأجاكس، الوسطاء، الترجمة، والـ Traits).*
* Service Container, Service Providers, Facades, Rate Limiting, and Request lifecycle deep-dive.  
  *(حاوية الخدمات، مزودو الخدمات، والواجهات الساكنة).*
* Managing Sessions, Caching, Task Scheduling, Events & Listeners, and Queue Workers.  
  *(الجلسات، الكاش، جدولة المهام، والأحداث).*
* Artisan Console, Custom Commands, Sending Emails via SMTP with attachments, and Blade Components.  
  *(أوامر أرتيسان المخصصة، إرسال الإيميلات، ومكونات بليد).*

### Part 4: RESTful APIs, Postman & Sanctum Authentication (Videos 137–155)
### القسم الرابع: واجهات الـ API، بوستمان، وحماية Sanctum
* Introduction to APIs, configuring `routes/api.php`, and testing via **Postman** using `Accept: application/json`.  
  *(مقدمة الـ API واختبارها عبر بوستمان).*
* Transitioning manual CRUD to standardized **RESTful Resource APIs** using `apiResource`.  
  *(تحويل الـ CRUD إلى RESTful Resource API).*
* Implementing **API Versioning** (`v1`), API Resources & Collections, HTTP Status Codes, and Standardized Response Schemas.  
  *(إدارة النسخ، تنسيق المخرجات، وتوحيد شكل الاستجابات).*
* Configuring **Postman Environment Variables** for dynamic workflow management.  
  *(إدارة متغيرات بيئة بوستمان).*
* Advanced API Security via **Laravel Sanctum**: User Registration, Token Generation, Login, Logout, and Middleware Route Protection.  
  *(الحماية المتقدمة عبر Sanctum وتسجيل الدخول والخروج وحماية المسارات).*

---

## 📬 Postman Testing Best Practices | أفضل ممارسات اختبار بوستمان
When testing API endpoints, always include the following standard headers to guarantee JSON responses:  
عند اختبار الـ Endpoints، احرص دائماً على تضمين الهيدرات التالية لضمان استجابات JSON صحيحة:
* **`Accept`**: `application/json`
* **`X-Requested-With`**: `XMLHttpRequest`

---

## 👨‍💻 Author | المطور
* **Zaid Al-Shathly** (زيد الشاذلي)
* Information Technology Student | Full-Stack Developer (Flutter & Laravel)  
  *(طالب تقنية معلومات | مطور فُل ستاك)*