<?php

session_start();

header("Content-Type: text/plain");

$message = strtolower(trim($_POST['message']));

if (!isset($_SESSION['last_topic'])) {
    $_SESSION['last_topic'] = "";
}

$lastTopic = $_SESSION['last_topic'];

$responses = [

    "leave" => [
        "Employees receive 12 casual leaves and 10 sick leaves annually.",
        "Our leave policy provides casual and sick leave benefits every year.",
        "You can apply for leave through the employee portal."
    ],

    "salary" => [
        "Salary is credited on the last working day of each month.",
        "Monthly salary payments are processed before month-end.",
        "Employees usually receive salary directly into their bank accounts."
    ],

    "work from home" => [
        "Employees can work remotely twice a week with approval.",
        "WFH is allowed depending on team and manager approval.",
        "Hybrid work options are available for eligible employees."
    ],

    "attendance" => [
        "Employees are expected to maintain regular attendance.",
        "Daily attendance is monitored through the HR portal.",
        "Late attendance may affect performance evaluation."
    ],

    "office timing" => [
        "Office hours are from 9 AM to 6 PM.",
        "Standard company timings are Monday to Friday, 9 to 6.",
        "Employees should report before 9 AM."
    ],

    "insurance" => [
        "Health insurance is available for all full-time employees.",
        "Employees are covered under company health insurance policies.",
        "Medical insurance benefits are included after onboarding."
    ]
];

$greetings = ["hi", "hello", "hey", "good morning", "good evening"];

$thanks = ["thank you", "thanks", "thx"];

$response = "";

/* Greeting Detection */

foreach ($greetings as $greet) {

    if (strpos($message, $greet) !== false) {

        $response = "Hello 👋 How can I assist you with HR policies today?";
        echo $response;
        exit;
    }
}

/* Thank You Detection */

foreach ($thanks as $word) {

    if (strpos($message, $word) !== false) {

        $response = "You're welcome 😊 Let me know if you need anything else.";
        echo $response;
        exit;
    }
}

/* Context Follow-up */

if (
    strpos($message, "more") !== false ||
    strpos($message, "details") !== false ||
    strpos($message, "explain") !== false
) {

    if ($lastTopic != "" && isset($responses[$lastTopic])) {

        $extraResponses = [
            "leave" => "Leaves can be applied through the HR management portal.",
            "salary" => "Salary slips are generated automatically every month.",
            "work from home" => "Managers may approve additional WFH in emergencies.",
            "attendance" => "Attendance records are updated daily.",
            "office timing" => "Flexible timing may be allowed for certain teams.",
            "insurance" => "Insurance claims can be submitted online."
        ];

        $response = $extraResponses[$lastTopic];

        echo $response;
        exit;
    }
}

/* Smart Topic Detection */

$bestMatch = "";
$highestScore = 0;

foreach ($responses as $topic => $replyList) {

    $words = explode(" ", $topic);

    $score = 0;

    foreach ($words as $word) {

        if (strpos($message, $word) !== false) {
            $score++;
        }
    }

    if ($score > $highestScore) {

        $highestScore = $score;
        $bestMatch = $topic;
    }
}

/* Generate Dynamic Reply */

if ($bestMatch != "") {

    $_SESSION['last_topic'] = $bestMatch;

    $replyOptions = $responses[$bestMatch];

    $response = $replyOptions[array_rand($replyOptions)];

} else {

    $fallbacks = [

        "I’m not fully sure about that HR policy yet.",
        "Could you ask that in a different way?",
        "I currently support HR-related topics like leave, salary, WFH, attendance and insurance.",
        "Sorry, I couldn’t find a matching HR policy."
    ];

    $response = $fallbacks[array_rand($fallbacks)];
}

echo $response;

?>