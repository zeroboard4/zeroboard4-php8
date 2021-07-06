# zeroboard4-php8
제로보드4 pl9 UTF-8(zb4pl9.utf8.zip) 버전에 PHP8 호환 작업과 여러가지 유용한 패치를 하였습니다.

## 주요 패치내용
- [x] PHP8 환경에서의 정상 작동 보장
- [x] 기초적인 보안 취약점 패치
- [x] [CloudFlare CDN 관련 문제점 패치](https://gist.github.com/kijin/25be59ac4b0d7c5ef722)
- [x] 관리자 페이지의 "DB 상태 보기"메뉴 클릭 시 비밀번호 해시 길이를 41자까지 사용 할 수 있도록 자동 패치
- [x] PHP8 이상에서 나타나는 정의되지 않은 변수 관련 Warning 약 80% 제거
- [x] 원본보다 최소 2.5배 이상 빠른 속도
- [x] 이외에 브라우저 환경에 따라 작동하지 않는 기능 몇가지 패치

## 원본과 변경된 기능
* mysql_query() 함수 대신 zb_query() 함수를 사용 (SQL injection 공격에 대응하기 위함)
* 게시판 스킨의 memo_on.swf와 외부로그인 스킨의 i_memo.swf 외에 memo_on.mp3와 i_memo.mp3도 사용 할 수 있도록 변경
* 회원가입 폼에서 우편번호 검색 시 카카오 우편번호 api를 사용하도록 변경
* setup.php에서 memo_limit_time을 0으로 설정할 시 쪽지를 자동으로 삭제하지 않도록 함

## 테스트 환경
* Apache 2.4.48
* nginx 1.20.1
* PHP 8.0.7
* MariaDB 10.4.19

## 유의사항
본 프로젝트를 이용해서 일어나는 일에 대한 책임은 전적으로 이용자 본인에게 있습니다.  
스킨은 직접 패치하셔야 합니다.
