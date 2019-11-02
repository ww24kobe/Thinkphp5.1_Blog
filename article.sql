/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : article

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-11-02 17:50:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `articleid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content` text COMMENT '文章内容',
  `cate_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '文章所属分类',
  `is_publish` tinyint(4) DEFAULT '0' COMMENT '是否发布，0-未发布， 1-已发布',
  `image` varchar(150) NOT NULL DEFAULT '' COMMENT '图片封面图',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES ('4', '篮球NBA', '111', '12', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('5', 'CBA姚明', '222', '12', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('6', '66', 'fsdffasdfs', '12', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('7', 'dfas', 'fasdf', '12', '0', '', '0', '0');
INSERT INTO `tp_article` VALUES ('10', '台球太子', '台球皇帝是亨得利', '12', '1', '', '1571976562', '1571976562');
INSERT INTO `tp_article` VALUES ('12', '2222', null, '12', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('31', '1111', '<p style=\"text-align: center;\">1234567o</p>', '12', '1', '20191102/9bae74d1d04329450c966e5a171a5704.png', '1572665489', '1572665489');
INSERT INTO `tp_article` VALUES ('32', '专家解读湖人：护筐能力强货真价实 首发表现惨', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">湖人开赛拿到3胜1负，他们的表现有亮点也有不足，数位美专家对湖人本赛季至今的一些现象进行了解读，夸赞湖人的护筐能力货真价实，但限制对手三分可能无法保持。专家还表示湖人首发表现惨淡，接下来肯定会有调整。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10642628963/1000\" class=\"content-picture\" style=\"margin: 0.6em auto; padding: 0px; border: 0px none; vertical-align: middle; max-width: 100%; display: block;\"/></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">现象1：湖人的盖帽率极高，两分球封盖率15.1%联盟最高</span></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><img src=\"https://inews.gtimg.com/newsapp_bt/0/10642612011/1000\" class=\"content-picture\" style=\"margin: 0.6em auto; padding: 0px; border: 0px none; vertical-align: middle; max-width: 100%; display: block;\"/></p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">戴夫-麦克门纳明：货真价实，最令人印象深刻的盖帽可能是勒布朗-詹姆斯追身封盖兰德里-沙梅特和所罗门-希尔那两个，但是湖人的防守体系不仅仅是依赖詹姆斯一个人。湖人拥有三个证明过自己的盖帽手，安东尼-戴维斯、贾维尔-麦基和德怀特-霍华德镇守中路，弗兰克-沃格尔不要求他们去换防，这使得他们的内线可以保护篮筐，后卫在外线施压。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; overflow-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">现象2：湖人首发阵容表现惨淡，百回合净负8.2分</span></p><p><br/></p>', '12', '1', '20191102/8273b6b322156ecab5a81089b3a0b57c.jpg', '1572665751', '1572669543');
INSERT INTO `tp_article` VALUES ('33', 'sdf111fdfsd', '<p>111111</p>', '12', '1', '', '1572676716', '1572676716');
INSERT INTO `tp_article` VALUES ('34', 'fds5351', null, '5', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('35', 'fsdfs2121', null, '5', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('36', 'gsdf3453453211', null, '5', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('37', 'fsdfsdf1434', null, '5', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('38', 'fsdfsdf1212', null, '5', '1', '', '0', '0');
INSERT INTO `tp_article` VALUES ('39', 'gdfgd', null, '5', '0', '', '0', '0');

-- ----------------------------
-- Table structure for tp_category
-- ----------------------------
DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '父分类的id',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `intro` text,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_category
-- ----------------------------
INSERT INTO `tp_category` VALUES ('1', '体育', '0', '0', '0', null);
INSERT INTO `tp_category` VALUES ('2', '电影', '0', '0', '0', null);
INSERT INTO `tp_category` VALUES ('5', 'NBA', '1', '0', '1572236605', '11111111111');
INSERT INTO `tp_category` VALUES ('12', 'CBA', '1', '0', '0', null);
INSERT INTO `tp_category` VALUES ('13', '羽毛球', '1', '1572165899', '1572233196', '羽毛球羽毛球羽毛球羽毛球羽毛球');

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'admin', 'e960f44c55c8449bec4b49a1782b4ecd', '0', '1572248872');
