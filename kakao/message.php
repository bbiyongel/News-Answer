<?php
    include './setting.php';
    $data = json_decode(file_get_contents('php://input'), true);
    $userkey = $data["user_key"];
    $content = $data["content"];

    switch($content)
    {
        case "정치":
            $sql = "insert into user (user_key, category) values ('$userkey', 1)";
            mysqli_query($con, $sql);
            echo <<<EOD
            {
                "message":
                {
                    "text": "뉴스요약"
                },
                "keyboard":
                {
                    "type": "buttons",
                    "buttons": ["카테고리 재선택", "다른 뉴스", "질문하기"]
                }
            }
EOD;
            
            break;
        case "카테고리 재선택":
            echo <<<EOD
            {
                "message":
                {
                    "text": "카테고리를 선택해주세요"
                },
                "keyboard":
                {
                    "type": "buttons",
                    "buttons": ["정치", "경제", "사회", "생활/문화", "세계","IT/과학"]
                }
            }
EOD;
            
            break;
    }

    
?>