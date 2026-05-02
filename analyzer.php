<?php
/**
 * Vortexa Sentinel - AI Log Analyzer
 * Security Intelligence Engine
 */

header('Content-Type: application/json');

// استبدل المفتاح بمفتاحك الخاص من Groq
define('GROQ_API_KEY', 'YOUR_GROQ_API_KEY_HERE');

function analyzeServerLogs($logContent) {
    if (empty($logContent)) return "الملف فارغ أو غير صالح.";

    $url = "https://api.groq.com/openai/v1/chat/completions";
    
    // برومبت أمني مكثف
    $systemPrompt = "You are an Elite SOC Analyst. Your task is to analyze server logs and identify security threats. 
    For each threat found, provide: 
    1. Threat Type (e.g. SQLi, Brute Force).
    2. Severity (Low, Medium, High, Critical).
    3. Evidence (The specific log line).
    4. Mitigation (How to fix it).
    Output your report in a clean Arabic Markdown format.";

    $postData = [
        "model" => "llama3-70b-8192", // نستخدم الموديل الأكبر لتحليل أعمق
        "messages" => [
            ["role" => "system", "content" => $systemPrompt],
            ["role" => "user", "content" => "Analyze these logs: \n" . substr($logContent, 0, 4000)]
        ],
        "temperature" => 0.1 // درجة حرارة منخفضة لضمان دقة التحليل الأمني
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . GROQ_API_KEY,
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $data = json_decode($response, true);
    curl_close($ch);

    return $data['choices'][0]['message']['content'] ?? "فشل النظام في تحليل السجلات.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['log_file'])) {
    $content = file_get_contents($_FILES['log_file']['tmp_name']);
    $result = analyzeServerLogs($content);
    echo json_encode(["report" => $result]);
} else {
    echo json_encode(["error" => "Invalid Request"]);
}

