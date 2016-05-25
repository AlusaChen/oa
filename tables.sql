--
-- 表的结构 `admin_log`
--

CREATE TABLE IF NOT EXISTS `admin_log` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` INT(11) UNSIGNED NOT NULL,
  `type` VARCHAR(20) NOT NULL,
  `ip` VARCHAR(100) NOT NULL,
  `referer` VARCHAR(1000) NOT NULL,
  `uri` VARCHAR(1000) NOT NULL DEFAULT '',
  `post` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `adminid_updated` (`admin_id`,`updated`),
  KEY `admin_id_type` (`admin_id`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `admin_login_error_log`
-- 管理员登录错误信息日志
--

CREATE TABLE IF NOT EXISTS `admin_login_error_log` (
  `ip` VARCHAR(100) NOT NULL COMMENT 'IP',
  `timeline` INT(10) NOT NULL COMMENT '时间',
  `error_num` MEDIUMINT(6) NOT NULL COMMENT '错误数',
  `last_error_msg` VARCHAR(255) NOT NULL COMMENT '最后错误信息',
  `last_post_username` VARCHAR(255) NOT NULL COMMENT '最后提交的用户名',
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- 表的结构 `departments`
-- 部门
--
CREATE TABLE IF NOT EXISTS `departments` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL DEFAULT '',
  `company` VARCHAR(255) NOT NULL DEFAULT '',
  `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, -- 0=正常 9=删除
  `setting` TEXT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`, `company`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- 表的结构 `admin_member`
--

CREATE TABLE IF NOT EXISTS `admin_member` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_super` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, -- 是否超管 0=否,1=是
  `did` INT(11) UNSIGNED NOT NULL DEFAULT 0, -- 部门ID
  `username` VARCHAR(100) NOT NULL DEFAULT '', -- 账号
  `nickname` VARCHAR(100) NOT NULL DEFAULT '', -- 昵称
  `phone` VARCHAR(100) NOT NULL DEFAULT '', -- 手机
  `email` VARCHAR(100) NOT NULL DEFAULT '', -- 邮箱
  `password` VARCHAR(32) NOT NULL DEFAULT '', -- 登录密码
  `rand_code` VARCHAR(16) NOT NULL DEFAULT '', -- 密码随机码
  `last_login_time` INT(10) UNSIGNED NOT NULL DEFAULT 0, -- 最后登录时间
  `last_login_ip` VARCHAR(100) NOT NULL, -- 最后登录IP
  `last_login_session_id` VARCHAR(64) NOT NULL DEFAULT '', -- 最后登录SESSION_ID
  `login_num` INT(6) UNSIGNED NOT NULL DEFAULT 0, -- 登录次数
  `create_time` INT(10) UNSIGNED NOT NULL DEFAULT 0, -- 创建时间
  `status` TINYINT(1) NOT NULL DEFAULT 0, -- 状态
  `setting` TEXT NOT NULL ,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `admin_member_group`
-- 权限组
--
CREATE TABLE IF NOT EXISTS `admin_member_group` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, -- 组ID
  `group_name` VARCHAR(100) NOT NULL DEFAULT '', -- 组名
  `sort` SMALLINT(4) UNSIGNED NOT NULL DEFAULT 0, -- 排序
  `create_time` INT(10) UNSIGNED NOT NULL DEFAULT 0, -- 创建时间
  `group_desc` TEXT NOT NULL, -- 说明
  `perm_setting` TEXT NOT NULL, -- 权限设置
  `setting` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `admin_member_group_ids`
-- 管理员所在组
--

CREATE TABLE IF NOT EXISTS `admin_member_group_ids` (
  `admin_id` INT(10) UNSIGNED NOT NULL COMMENT '管理员ID',
  `group_id` mediumINT(8) UNSIGNED NOT NULL DEFAULT 0, --  '管理组'
  `view_users` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, -- '查看用户'
  `edit_users` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '修改用户',
  `edit_users_password` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '修改用户密码',
  `add_user` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '添加用户',
  `del_user` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '删除用户',
  `remove_user` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '移除用户',
  `shield_user` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '屏蔽用户',
  `liftshield_user` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '解除屏蔽用户',
  `edit_group` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,  -- '修改组设置',
  `edit_group_perm` TINYINT(1) NOT NULL DEFAULT 0,  -- '修改当前组权限',
  PRIMARY KEY (`admin_id`,`group_id`),
  KEY `group_id` (`group_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
