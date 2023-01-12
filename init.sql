
CREATE DATABASE IF NOT EXISTS `prueba_tecnica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `prueba_tecnica`;

CREATE TABLE IF NOT EXISTS data_bienes (
   id            INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,direccion     VARCHAR(35) NOT NULL
  ,ciudad        VARCHAR(11) NOT NULL
  ,telefono      VARCHAR(12) NOT NULL
  ,codigo_postal VARCHAR(9) NOT NULL
  ,tipo          VARCHAR(13) NOT NULL
  ,precio        VARCHAR(7) NOT NULL
);

INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (1,'ap #549-7395 ut rd.','new york','334-052-0954','85328','casa','$30,746');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (2,'p.o. box 657, 9831 cursus st.','orlando','488-441-5521','04436','casa de campo','$71,045');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (3,'ap #325-2507 quisque av.','los angeles','623-807-2869','89804','casa de campo','$36,087');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (4,'347-866 laoreet road','los angeles','997-640-8188','94526-134','casa de campo','$16,048');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (5,'4732 ipsum. rd.','houston','802-414-8872','162925','casa','$45,912');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (6,'672-9576 consectetuer road','orlando','355-601-5749','210020','casa de campo','$64,370');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (7,'549-5766 sodales st.','orlando','557-228-6918','16794','casa','$2,846');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (8,'p.o. box 847, 2589 in av.','washington','390-713-8687','70689','apartamento','$60,951');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (9,'175-4344 nec, ave','orlando','578-170-6179','p0c 0g3','casa de campo','$58,902');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (10,'p.o. box 497, 8679 turpis. st.','new york','870-559-3430','7029','casa','$17,759');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (11,'844-8312 molestie road','miami','147-920-5435','5237jg','casa','$91,067');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (12,'p.o. box 494, 674 amet, street','new york','056-617-2556','684445','casa','$36,155');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (13,'p.o. box 466, 2795 velit. avenue','new york','252-330-0116','5422','apartamento','$78,947');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (14,'p.o. box 523, 2126 aliquet rd.','orlando','986-825-6899','37045','casa de campo','$51,817');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (15,'ap #669-7718 cras st.','new york','200-935-8531','ri9 6rt','casa','$39,561');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (16,'2211 malesuada rd.','los angeles','436-742-7954','31519','apartamento','$52,433');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (17,'p.o. box 181, 7858 nisi. st.','houston','383-252-8216','83594','apartamento','$85,641');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (18,'741-2614 accumsan rd.','miami','487-609-0106','753543','casa de campo','$78,854');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (19,'829-3250 in rd.','new york','788-832-7076','783917','casa de campo','$64,471');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (20,'ap #393-3363 fringilla road','orlando','335-278-9678','8635','apartamento','$47,420');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (21,'ap #247-8024 curabitur st.','miami','167-013-1429','15971','casa de campo','$28,795');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (22,'995-1099 id, road','washington','491-394-8799','37-346','apartamento','$69,505');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (23,'ap #176-8333 gravida st.','miami','339-324-8859','0318yb','casa de campo','$73,231');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (24,'340-985 lobortis. avenue','washington','049-063-4896','5411','casa de campo','$83,847');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (25,'992-7214 pharetra rd.','miami','257-364-7011','1045so','casa','$93,907');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (26,'7705 fusce st.','washington','363-540-9113','9802','casa de campo','$21,796');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (27,'723-5458 neque. ave','new york','512-886-8792','1038','casa','$97,134');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (28,'ap #246-9877 ultricies rd.','washington','423-014-6013','61483','casa','$32,659');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (29,'ap #712-3234 nunc road','miami','334-030-0048','9738','apartamento','$14,560');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (30,'4406 justo avenue','houston','242-441-7733','38707','casa de campo','$69,433');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (31,'ap #172-6600 vivamus st.','new york','710-649-0830','57503','casa de campo','$1,986');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (32,'ap #728-4099 et, ave','houston','535-501-0707','0242an','casa','$73,668');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (33,'4648 sem rd.','washington','956-749-3273','94323','apartamento','$85,996');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (34,'ap #539-4295 volutpat avenue','miami','904-312-9292','894922','casa','$38,835');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (35,'500-6214 tempus, street','miami','168-671-0953','5574','casa de campo','$62,069');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (36,'233-9001 cum rd.','new york','670-701-8060','20705','casa de campo','$32,174');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (37,'4084 sit st.','orlando','326-023-8622','02187','apartamento','$23,492');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (38,'p.o. box 825, 9762 etiam street','miami','343-695-3228','56309','casa de campo','$42,579');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (39,'5889 luctus. ave','new york','259-039-5762','6038','apartamento','$41,843');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (40,'ap #834-3873 nullam st.','houston','809-587-9484','69526','casa de campo','$94,728');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (41,'p.o. box 711, 706 dis rd.','washington','354-038-8533','65211','casa de campo','$90,451');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (42,'p.o. box 315, 6041 duis avenue','orlando','186-671-4205','893592','casa de campo','$2,261');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (43,'5640 dapibus st.','washington','906-342-4567','4263','casa de campo','$76,404');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (44,'5260 sed rd.','new york','336-903-7567','92501','casa','$2,055');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (45,'ap #864-1235 mi rd.','orlando','723-547-1102','g9t 9p2','casa de campo','$99,508');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (46,'8151 rutrum rd.','miami','594-072-4670','58567','casa','$7,952');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (47,'p.o. box 926, 1798 pellentesque st.','new york','328-063-3034','0547id','casa','$48,882');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (48,'p.o. box 264, 6488 euismod avenue','los angeles','210-220-4305','j6h 9s9','apartamento','$33,141');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (49,'ap #694-1472 orci ave','new york','362-652-3567','63897','apartamento','$88,980');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (50,'p.o. box 354, 6477 eget st.','los angeles','593-092-8585','90970-060','casa','$35,831');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (51,'128-8013 imperdiet avenue','new york','611-764-9648','727883','casa de campo','$99,230');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (52,'ap #394-8201 pede. st.','new york','057-000-7888','6390','apartamento','$82,679');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (53,'ap #210-1906 mauris st.','new york','742-185-0661','4116','casa','$96,998');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (54,'228-2036 tincidunt road','orlando','565-750-7079','7217','casa','$54,710');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (55,'681-117 facilisis street','washington','695-936-1302','83809','casa','$96,281');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (56,'p.o. box 665, 3825 nec st.','houston','859-638-8140','843642','casa','$3,829');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (57,'ap #800-4147 in street','los angeles','324-489-2139','66013','casa de campo','$70,069');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (58,'297-8960 libero. rd.','los angeles','626-297-1082','9133','casa de campo','$26,514');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (59,'5605 nisi ave','orlando','842-236-6720','188876','casa','$68,927');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (60,'p.o. box 870, 9855 tristique avenue','miami','114-453-9481','64899','casa','$67,772');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (61,'ap #214-5963 metus road','houston','337-930-6310','5290ka','casa','$71,048');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (62,'869 tempus st.','new york','235-726-7602','y4v 5a1','casa de campo','$90,138');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (63,'p.o. box 916, 4350 in avenue','new york','292-391-9640','26271','casa de campo','$70,212');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (64,'ap #768-2635 eget, avenue','miami','909-006-0105','93246','casa','$74,320');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (65,'ap #581-5945 ullamcorper road','orlando','820-970-3451','35826','apartamento','$15,782');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (66,'ap #298-502 dolor. ave','orlando','339-015-5616','8625gm','casa de campo','$27,530');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (67,'569-3972 malesuada street','miami','712-181-4815','857132','casa de campo','$56,359');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (68,'ap #378-8818 molestie ave','los angeles','286-311-5133','39945','casa de campo','$29,789');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (69,'766 consequat, st.','los angeles','790-137-7352','71804','casa','$57,408');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (70,'729-3081 cubilia rd.','washington','888-946-8086','f7 0yf','casa','$87,871');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (71,'457-7987 curae; rd.','washington','760-938-1297','19418','casa','$43,727');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (72,'6158 tempor rd.','houston','690-850-4520','l18 9sc','casa de campo','$30,425');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (73,'ap #693-2983 class st.','new york','213-536-0655','21712','casa','$23,311');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (74,'841 scelerisque rd.','houston','367-551-7660','yy0a 3td','casa de campo','$72,611');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (75,'792-7569 dolor rd.','new york','261-470-7647','14844','casa','$98,815');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (76,'444-5718 ut rd.','washington','041-009-6788','8230','casa','$50,861');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (77,'ap #377-8404 ipsum street','new york','534-916-5827','37234','casa de campo','$87,808');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (78,'2425 rutrum street','los angeles','494-431-4661','ic54 7ik','casa','$93,263');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (79,'344-8412 nisl. st.','houston','050-082-4431','99-113','apartamento','$99,947');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (80,'9399 sem ave','houston','909-320-3004','03082','casa','$69,922');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (81,'p.o. box 284, 8629 egestas. st.','orlando','196-562-2718','a8z 9n1','casa','$25,541');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (82,'283-2290 aliquam street','new york','272-977-8230','g1c 0l5','apartamento','$97,152');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (83,'p.o. box 787, 1352 mollis rd.','new york','580-328-0397','63477','casa','$70,429');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (84,'571-3448 ipsum. st.','new york','451-067-8082','1688','casa de campo','$9,426');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (85,'626-4183 eros. road','new york','818-932-2502','3977','apartamento','$82,655');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (86,'ap #500-446 accumsan ave','los angeles','453-561-4737','3773','casa de campo','$29,354');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (87,'3703 quisque rd.','orlando','020-821-1050','54983','apartamento','$96,267');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (88,'5946 consectetuer st.','new york','773-538-6408','q28 3po','casa','$61,691');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (89,'p.o. box 556, 1951 vulputate av.','houston','670-572-1780','4484kp','casa','$95,859');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (90,'727-198 a road','houston','821-444-9824','5962','apartamento','$82,504');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (91,'ap #271-6835 tempus st.','washington','601-485-1049','703157','casa','$80,965');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (92,'p.o. box 519, 981 nostra, avenue','miami','440-469-6769','61790-368','casa de campo','$49,957');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (93,'2759 faucibus st.','washington','510-056-8508','612383','casa','$23,498');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (94,'5720 urna, street','miami','581-094-0717','x45 0fa','casa de campo','$8,187');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (95,'283-1453 amet, avenue','los angeles','751-107-3929','r1b 4y7','apartamento','$32,660');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (96,'p.o. box 169, 7235 quisque road','los angeles','782-078-8565','86541','casa','$39,721');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (97,'6840 rhoncus. ave','miami','845-500-3131','7112','casa de campo','$97,135');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (98,'967-7675 a, rd.','los angeles','751-125-7876','34981','apartamento','$6,672');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (99,'227-6771 ut street','houston','262-186-7762','7131','casa de campo','$17,160');
INSERT INTO data_bienes(id,direccion,ciudad,telefono,codigo_postal,tipo,precio) VALUES (100,'p.o. box 432, 4652 proin ave','washington','113-637-2816','598072','casa','$42,804');