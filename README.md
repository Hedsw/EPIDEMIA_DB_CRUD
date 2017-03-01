## EPIDEMIA_Project
==============
##This project is that collaborate with NASA, SDSU and Ethiopia Gov.
================
The goal of this project is to decrease rate of illness related in mosquito.
My Position is that develop Web App and struct Database as using RDBMS(MySQL)


# Feb 28 Updated
Putty 접속하는법
ssh leey@kabru.sdstate.edu

접속 비밀번호 yunhyeokLEE!

mysql -u epidemiaweb_test -p epidemia_test


Mysql password : eishoo6Pheis



// 추가 해야 할 것
// 1. Create Table하는거 해서 넣을 때 마다 테이블 만들어서 넣도록 해야함.
// 2. 디비에 받아 놓은거 다시 뿌리는 법


 CREATE TABLE IF NOT EXISTS `FilesEpi` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `file` VARCHAR(30) NOT NULL,
 `type` VARCHAR(10) NOT NULL,
 `size` INT NOT NULL,
 `path` VARCHAR(400) NOT NULL,
  PRIMARY KEY (`ID`) ) ;


CREATE TABLE IF NOT EXISTS `Data2` (
`ID2` int NOT NULL AUTO_INCREMENT,
`Zone` VARCHAR(30) NOT NULL,
`Woreda` VARCHAR(30) NOT NULL,
`col3` int(20),
`col4` int(20),
`col5` int(20),
`col6` FLOAT(20),
`col7` FLOAT(20),
`col8` FLOAT(20),
`col9` FLOAT(20),
`col10` FLOAT(20),
`col11` FLOAT(20),
`col12` FLOAT(20),
`col13` FLOAT(20),
`col14` FLOAT(20),
`col15` FLOAT(20),
`col16` FLOAT(20),
`col17` FLOAT(20),
`col18` FLOAT(20),
`col19` FLOAT(20),
`col20` FLOAT(20),
`col21` FLOAT(20),
`col22` FLOAT(20),
`col23` FLOAT(20),
`col24` FLOAT(20),
`col25` FLOAT(20),
`col26` FLOAT(20),
`col27` FLOAT(20),
`col28` FLOAT(20),
`col29` FLOAT(20),
`col30` FLOAT(20),
`col31` FLOAT(20),
`col32` FLOAT(20),
`col33` FLOAT(20),
`col34` FLOAT(20),
`col35` FLOAT(20),
`col36` FLOAT(20),
`col37` FLOAT(20),
`col38` FLOAT(20),
`col39` FLOAT(20),
`col40` FLOAT(20),
`col41` FLOAT(20),
`col42` FLOAT(20),
`col43` FLOAT(20),
`col44` FLOAT(20),
`col45` FLOAT(20),
`col46` FLOAT(20),
`col47` FLOAT(20),
`col48` FLOAT(20),
`col49` FLOAT(20),
`col50` FLOAT(20),
`col51` FLOAT(20),
`col52` FLOAT(20),
`col53` FLOAT(20),
`col54` FLOAT(20),
`col55` FLOAT(20),
`col56` FLOAT(20),
`col57` FLOAT(20),
`col58` FLOAT(20),
`col59` FLOAT(20),
`col60` FLOAT(20),
`col61` FLOAT(20),
`col62` FLOAT(20),
`col63` FLOAT(20),
`col64` FLOAT(20),
 PRIMARY KEY (`ID2`) );


참조 한 URL : http://stackoverflow.com/questions/19759200/how-to-save-multiple-files-in-a-chrome-app

bin  boot  data  db  dev  etc  home  kabru  lib  lib64  media  mnt  opt  proc  root  

로그 체크하기..
맨 아래로 내려가서 data/epidemia/test/web/logs 로 가서 vi errors.log 하면 나옴..



Feb 28
문제는 move_uploaded_file 이건데 지금 permission Error가 뜬다. 이때는 어떻게 해야 할지
고민 해보자

Column 1 - 64
1 - 2 are characters
3 - 64 are numbers
