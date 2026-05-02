# Vortexa-Sentinel-AI
<div align="center">

<img src="https://img.icons8.com/fluency/96/shield-lock.png" alt="Vortexa Sentinel Logo" width="80" />

# 🛡️ Vortexa Sentinel | AI Security Analyst
**نظام ذكي لتحليل سجلات السيرفرات واكتشاف التهديدات السيبرانية باستخدام الذكاء الاصطناعي**

[![GitHub Release](https://img.shields.io/badge/Version-1.0.0-blue?style=for-the-badge&logo=github)](https://github.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)
[![Powered by Groq](https://img.shields.io/badge/AI-Groq%20Llama%203-orange?style=for-the-badge)](https://groq.com/)
[![PHP](https://img.shields.io/badge/Language-PHP%208.x-purple?style=for-the-badge&logo=php)](https://www.php.net/)

</div>

---

## 📖 نظرة عامة (Overview)
**Vortexa Sentinel** هو مشروع يدمج بين الأمن السيبراني والذكاء الاصطناعي. يقوم النظام بتحليل ملفات السجلات (Logs) الخاصة بالسيرفرات بشكل لحظي، حيث يعتمد على نماذج اللغة الكبيرة (LLMs) لتحديد الأنماط المشبوهة التي قد تغفل عنها الأنظمة التقليدية، مثل محاولات الاختراق المعقدة وثغرات الـ Zero-day.



---

## ✨ المميزات الرئيسية (Core Features)

| الميزة | الوصف |
| :--- | :--- |
| 🤖 **تحليل بالذكاء الاصطناعي** | استخدام موديل **Llama 3** لتحليل السلوك بدلاً من القواعد الثابتة. |
| 📊 **تصنيف التهديدات** | تحديد مستوى الخطورة (Critical, High, Medium, Low) لكل هجوم. |
| 💡 **توصيات أمنية** | تقديم حلول عملية (Mitigation) لإغلاق الثغرات المكتشفة. |
| 🎨 **واجهة عصرية** | واجهة مستخدم متجاوبة (Dark Mode) تعتمد على Bootstrap. |
| 🚀 **تقارير Markdown** | عرض النتائج بشكل منسق واحترافي يسهل قراءته. |

---

## 🛠️ كيف يعمل النظام؟ (How it Works)

1. **الرفع (Upload):** يتم رفع ملف الـ `.log` الخاص بالسيرفر.
2. **المعالجة (Process):** يقوم السكربت بتنقية البيانات وإرسالها لـ **Groq AI Engine**.
3. **التحليل (Analysis):** يعمل الـ AI كـ **SOC Analyst** محترف لفحص الأنماط.
4. **التقرير (Report):** يظهر تقرير مفصل يشمل نوع الهجوم، الدليل، وكيفية المعالجة.

---

## 🚀 طريقة التثبيت (Setup)

### المتطلبات الأساسية:
* PHP 7.4 أو أحدث.
* API Key من منصة [Groq Cloud](https://console.groq.com/).

### الخطوات:
1. قم بتحميل المشروع:
   ```bash
   git clone [https://github.com/your-username/Vortexa-Sentinel.git](https://github.com/your-username/Vortexa-Sentinel.git)
   
