# conf
intoworld callsytem for cdc.go.kr
[intoworld.md](https://github.com/onofflink/startup/intoworld.md)

## add this repo as a submodule to onofflink/startup callcenter/conf

## files creatred to update CDC.go.kr callcenter system
> [cdc home](www.cdc.go.kr)
> [update location]
---
- * 소스 업로드
1. 기존 소스 백업
- /var/www/html/conf/*
- /etc/asterisk/extensions_override_freepbx.conf

2. 파일 덮어쓰기
- /var/www/html/conf/*
- /etc/asterisk/extensions_override_freepbx.conf

3. 서비스 재실행
- # service asterisk restart


May 1 email

- [x] [email about VOC](attached/SimpleMail_Message_232.eml)

  

- [ ] contents [메세지 내용](#message1)


## testing server screen html list
[monitor 진행회의](../callsystem/monitor.html) &nbsp;&nbsp;|
[monitor unmusic](../callsystem/monitor_unmusic.html) | [monitor operator](../callsystem/monitor_operespond.html)<br>
[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;참석자배정](../callsystem/menu5.html)|<br>
[회의등록](../callsystem/account.html) &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| [사용자 등록](../callsystem/user.html) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| [시스템정보](../callsystem/system.html) <br>
[자료조회 회의](../callsystem/db_menu3.html) &nbsp;&nbsp;| [자료조회 사용자](../callsystem/db_menu4.html)&nbsp;&nbsp;| [자료조회 녹음파일](../callsystem/db_menu5.html) <br>
[report 회의번호](../callsystem/report.html) | [report 회의상세](../callsystem/report_menu5.html)



## message1

1.       회의 리스트에서 회의 종료 후 접속이 되지 않는 문제

    -> 수정함 : 진행회의에서 회의종료 버튼 클릭시에도 다시 접속 되게 처리함.

2.       회의 인원 설정 안됨

    -> 회의 인원 변경 가능하며,
    회의인원 초과시 '회의 인원이 초과하여 입장 하실 수 없습니다' 멘트 나오면서
    입장 안됩니다.
    자세한 설명 바랍니다.

3.       기능키 미동작
    -> 아래 내용에서 검정색은 작동되는 기능키 이며,
    빨간색은 교환원 기능이라서 2차버전에 적용 가능 합니다.

| 권한   | key   | 작동내용                                                      | 적용범위 |
| ------ | ----- | ------------------------------------------------------------- | -------- |
| 공통   | ★ + 0 | 회의방에서 교환원에게 문의                                     | 전체     |
| 공통   | ★ + 1 | 질문 요청                                                     | 참석자   |
| 공통   | ★ + 2 | 자신의 볼륨 UP (말하기/듣기)                                   | 전체     |
| 공통   | ★ + 3 | 자신의 MUTE                                                   | 전체     |
| 공통   | ★ + 4 | 질문 취소                                                     | 참석자   |
| 공통   | ★ + 5 | 자신의 볼륨 DOWN                                              | 전체     |
| 공통   | ★ + 6 | 자신의 MUTE 해제                                              | 전체     |
| 공통   | ★ + 7 | 참석자 수 확인                                                | 전체     |
| 공통   | ★ + 8 | 회의방안에서 교환원에게 문의                                   | 전체     |
| 공통   | ★ + 9 | 기능키 설명 듣기                                              | 전체     |
| 주최자 | 1 + 0 | 회의 종료                                                     | 주최자   |
| 주최자 | 1 + 1 | 현재 참석자 이름 듣기(롤콜)                                    | 주최자   |
| 주최자 | 1 + 2 | 회의방 전체 볼륨 UP                                           | 주최자   |
| 주최자 | 1 + 3 | 전체 MUTE                                                    | 주최자   |
| 주최자 | 1 + 4 | 퇴장한 참석자 이름 듣기 (롤콜)현재 참석자 이름 듣기(rollcall)    | 주최자   |
| 주최자 | 1 + 5 | 회의방 전체 볼륨 DOWN                                         | 주최자   |
| 주최자 | 1 + 6 | 전체 MUTE 해제( 음악 mode에서도 발언 모드로 변경 가능)          | 주최자   |
| 주최자 | 1 + 7 | 회의방 입장 잠금                                              | 주최자   |
| 주최자 | 1 + 8 | 회의방 입장 열기                                              | 주최자   |
| 주최자 | 1 + 9 | 음악 MODE                                                    | 주최자   |
| 참석자 | 0 + 1 | 참석자 전화 걸기                                              | 주최자   |
| 참석자 | 0 + 2 | 연결된 참석자 회의방 입장 (주최자 포함)                         | 주최자   |
| 참석자 | 0 + 4 | 전화 걸기 취소                                                | 주최자   |
| 참석자 | 0 + 0 | 전화 걸기 후 회의방 DTMF 사용 해제                             | 주최자   |
| 참석자 | 0 + 0 | (전화 건 상대방의 내선번호 입력 또는 은행 및 ARS 사용 위해)      | 주최자   |
|        |       |                                                               |          |
