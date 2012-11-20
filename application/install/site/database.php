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
CREATE TABLE IF NOT EXISTS `cody_site` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL DEFAULT '0',
  `site_domain` varchar(64) NOT NULL DEFAULT '',
  `site_path` varchar(64) NOT NULL DEFAULT '',
  `site_template` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`site_id`),
  UNIQUE KEY `domain_path` (`site_domain`,`site_path`)
) ENGINE=".DB_DEFAULT_ENGINE." DEFAULT CHARSET=utf8;
");