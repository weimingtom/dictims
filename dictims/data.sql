
CREATE TABLE `staff` (
  `id` bigint(20) NOT NULL auto_increment,
  `sid` varchar(255) COMMENT '职员编号',
  `pws` varchar(255) COMMENT '密码',
  `state` varchar(255) COMMENT '状态',
  `sname` varchar(255) COMMENT '职员姓名',
  `idcard` varchar(255) COMMENT '身份证',
  `sex` varchar(255) COMMENT '性别',
  `home` varchar(255) COMMENT '籍贯',
  `national` varchar(255) COMMENT '民族',
  `birth` varchar(255) COMMENT '出生年月',
  `marriage` varchar(255) COMMENT '婚姻状况',
  `political` varchar(255) COMMENT '政治面貌',
  `political_date` varchar(255) COMMENT '加入时间',
  `culture` varchar(255) COMMENT '文化程度',
  `school` varchar(255) COMMENT '毕业学校',
  `graduate` varchar(255) COMMENT '毕业时间',
  `address` varchar(255) COMMENT '住址',
  `phone` varchar(255) COMMENT '电话',
  `email` varchar(255) COMMENT 'Email',
  `im` varchar(255) COMMENT '聊天号',
  `department` varchar(255) COMMENT '部门',
  `jobs` varchar(255) COMMENT '职务',
  `duty` varchar(255) COMMENT '职称',
  `entrance` varchar(255) COMMENT '入职时间',
  `contract_term` varchar(255) COMMENT '合同期限',
  `comment` varchar(255) COMMENT '备注',
  `addtime` varchar(255),
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

INSERT INTO staff
(`sid`,`pws`,`state`,`sname`,`idcard`,`sex`,`home`,`national`,`birth`,`marriage`,`political`,`political_date`,`culture`,`school`,`graduate`,`address`,`phone`,`email`,`im`,`department`,`jobs`,`duty`,`entrance`,`contract_term`,`comment`,`addtime`)
VALUES
("YG001","123456","在职","王韦","34010219810401021X","男","皖合肥","汉","1981-4-1","已婚","无","","本科","合肥工业大学","2004-6","安徽","0564-87654321","kf@xiao5u.com","94009759","技术部","经理","高级","2005","","无","2011-4-14");


INSERT INTO staff
(`sid`,`pws`,`state`,`sname`,`idcard`,`sex`,`home`,`national`,`birth`,`marriage`,`political`,`political_date`,`culture`,`school`,`graduate`,`address`,`phone`,`email`,`im`,`department`,`jobs`,`duty`,`entrance`,`contract_term`,`comment`,`addtime`)
VALUES
("YG002","123456","在职","李儒宝","34012119880909021X","女","安徽","汉族","1988-9-9","已婚","党员","2008-11","本科","安徽大学","2010-6","安徽省六安市皋城东路","0564-87654321","kf@xiao5u.com","94009759","客服部","技术员","初级","2010-10","","","2011-4-17");

INSERT INTO staff
(`sid`,`pws`,`state`,`sname`,`idcard`,`sex`,`home`,`national`,`birth`,`marriage`,`political`,`political_date`,`culture`,`school`,`graduate`,`address`,`phone`,`email`,`im`,`department`,`jobs`,`duty`,`entrance`,`contract_term`,`comment`,`addtime`)
VALUES
("YG003","123456","在职","鲁旺展","342422222221","男","皖合肥","汉","1984-4-1","未婚","无","2003-11","本科","安徽大学","2006-6","安徽省六安市皋城东路7号","15212830890","fw@xiao5u.com","34615101","技术部","技术员","初级","2008-9","","校无忧科技—www.xiao5u.com","2011-4-17");




CREATE TABLE `admin` (   
  `id` bigint(20) NOT NULL auto_increment,
  `username` varchar(255),
  `password` varchar(255),
  `lastLoginIP` varchar(255),
  `lastLoginTime` datetime,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

INSERT INTO `admin`
(`username`,`password`,`lastLoginIP`,`lastLoginTime`)
VALUES
("admin","7a57a5a743894a0e","::1","2016-3-15 16:32:17");

CREATE TABLE `salary` (   
  `id` bigint(20) NOT NULL auto_increment,
  `syear` varchar(255),
  `smonth` varchar(255),
  `sid` varchar(255) COMMENT "工号",
  `sname` varchar(255) COMMENT "姓名",
  `basic` varchar(255) COMMENT "基本",
  `perform` varchar(255) COMMENT "绩效",
  `jt` varchar(255) COMMENT "津贴",
  `bt` varchar(255) COMMENT "补贴",
  `gjj` varchar(255) COMMENT "公积金",
  `lb` varchar(255) COMMENT "养老保险",
  `yb` varchar(255) COMMENT "医疗保险",
  `qt` varchar(255) COMMENT "其他",
  `stotal` varchar(255) COMMENT "合计",
  `addtime` varchar(255),
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

INSERT INTO `salary` 
(`syear`,`smonth`,`sid`,`sname`,`basic`,`perform`,`jt`,`bt`,`gjj`,`lb`,`yb`,`qt`,`stotal`,`addtime`)
VALUES
("2013","9","YG001","王韦","1500","800","200","200","300","100","50","100","2800","2013-09-18 10:35:23");

INSERT INTO `salary`
(`syear`,`smonth`,`sid`,`sname`,`basic`,`perform`,`jt`,`bt`,`gjj`,`lb`,`yb`,`qt`,`stotal`,`addtime`)
VALUES
("2013","10","YG002","李儒宝","1000","500","100","100","200","50","50","100","1800","2013-10-18 10:36:51");

INSERT INTO `salary`
(`syear`,`smonth`,`sid`,`sname`,`basic`,`perform`,`jt`,`bt`,`gjj`,`lb`,`yb`,`qt`,`stotal`,`addtime`)
VALUES
("2013","10","YG003","鲁旺展","1200","600","100","100","200","50","50","100","2100","2013-10-18 10:53:49");

INSERT INTO `salary`
(`syear`,`smonth`,`sid`,`sname`,`basic`,`perform`,`jt`,`bt`,`gjj`,`lb`,`yb`,`qt`,`stotal`,`addtime`)
VALUES
("2013","10","YG001","王韦","1500","800","200","200","300","100","50","100","2800","2013-10-18 10:35:23");

