<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vortexa Sentinel | AI Security Analyst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <style>
        :root { --bg: #0d1117; --card: #161b22; --primary: #58a6ff; --success: #238636; }
        body { background-color: var(--bg); color: #c9d1d9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .hero-section { background: linear-gradient(180deg, #161b22 0%, #0d1117 100%); padding: 60px 0; border-bottom: 1px solid #30363d; }
        .upload-card { background: var(--card); border: 2px dashed #30363d; border-radius: 12px; padding: 40px; transition: 0.3s; cursor: pointer; }
        .upload-card:hover { border-color: var(--primary); background: #1c2128; }
        #reportOutput { background: #000; border-radius: 8px; padding: 25px; border-top: 4px solid var(--primary); margin-top: 30px; display: none; line-height: 1.8; }
        .loading-spinner { display: none; }
    </style>
</head>
<body>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-5 fw-bold text-white mb-3"><i class="fas fa-shield-halved text-primary"></i> Vortexa Sentinel</h1>
        <p class="lead text-muted">نظام تحليل السجلات المتقدم القائم على الذكاء الاصطناعي لاكتشاف التهديدات السيبرانية.</p>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="analyzeForm">
                <div class="upload-card text-center" onclick="document.getElementById('fileInput').click()">
                    <input type="file" id="fileInput" name="log_file" class="d-none" required>
                    <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-primary"></i>
                    <h4>ارفع ملف الـ Logs ( .log, .txt )</h4>
                    <p class="text-muted">سيقوم المحرك الأمني بفحص كل سطر وتحليل الأنماط المشبوهة</p>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4 fw-bold">تحليل الملف الآن</button>
            </form>

            <div class="loading-spinner text-center mt-5">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="mt-3">Vortexa Sentinel يقوم بفحص البيانات الآن...</p>
            </div>

            <div id="reportOutput"></div>
        </div>
    </div>
</div>

<script>
    document.getElementById('analyzeForm').onsubmit = async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const reportDiv = document.getElementById('reportOutput');
        const spinner = document.querySelector('.loading-spinner');

        reportDiv.style.display = 'none';
        spinner.style.display = 'block';

        try {
            const res = await fetch('analyzer.php', { method: 'POST', body: formData });
            const data = await res.json();
            
            spinner.style.display = 'none';
            reportDiv.style.display = 'block';
            // تحويل الـ Markdown لـ HTML ليظهر بشكل جميل
            reportDiv.innerHTML = marked.parse(data.report);
        } catch (error) {
            alert('حدث خطأ في الاتصال بالسيرفر.');
            spinner.style.display = 'none';
        }
    }
</script>
</body>
</html>
  
