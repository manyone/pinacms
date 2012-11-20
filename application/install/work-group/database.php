<?php
/*
* PinaCMS
* 
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
* "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
* LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
* A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
* OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
* SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
* LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
* DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
* THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
* OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
* @copyright � 2010 Dobrosite ltd.
*/

if (!defined('PATH')){ exit; }



$db = getDB();
$db->query("
CREATE TABLE IF NOT EXISTS `cody_work_group` (
	`work_group_id`	INT(11) NOT NULL AUTO_INCREMENT,
	`work_group_order` INT(11) NOT NULL DEFAULT '0',
	`site_id`	INT(11) NOT NULL DEFAULT '0',
        `work_group_title` varchar(256) NOT NULL DEFAULT '',
        `work_group_enabled` VARCHAR(1) NOT NULL DEFAULT 'Y',
	PRIMARY KEY (`work_group_id`),
	KEY(site_id)
) ENGINE=".DB_DEFAULT_ENGINE." DEFAULT CHARSET=utf8;
");
	
$db->query("
CREATE TABLE IF NOT EXISTS cody_work_group_image (
	work_group_id INT(10) NOT NULL default '0',
	site_id INT(10) NOT NULL default '0',
	work_group_image_filename VARCHAR(255) NOT NULL default '0',
	work_group_image_width INT(1) NOT NULL default '0',
	work_group_image_height INT(1) NOT NULL default '0',
	work_group_image_type VARCHAR(20) NOT NULL default '',
	work_group_image_size INT(10) NOT NULL default '0',
	PRIMARY KEY(work_group_id),
	KEY(site_id)
) ENGINE=".DB_DEFAULT_ENGINE." DEFAULT CHARSET=utf8;
");