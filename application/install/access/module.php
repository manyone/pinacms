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



require_once PATH_TABLES."module.php";

$moduleGateway = new ModuleGateway();
$moduleGateway->put(array(
	"module_key" => "access",
	"site_id" => Site::id(),
	"module_enabled" => "Y",
	"module_version" => "1.00",
	"module_config_action" => "",
	"module_title" => lng("accesses_management"),
	"module_description" => "",
));

require_once PATH_TABLES."access_group.php";
$accessGroupGateway = new AccessGroupGateway();
$accessGroupGateway->put(array(
	"access_group_id" => "1",
	"access_group" => "registered",
));
$accessGroupGateway->put(array(
	"access_group_id" => "2",
	"access_group" => "admin",
));
$accessGroupGateway->put(array(
	"access_group_id" => "3",
	"access_group" => "merchant",
));
$accessGroupGateway->put(array(
	"access_group_id" => "4",
	"access_group" => "writer",
));

require_once PATH_TABLES."access.php";
$accessGateway = new AccessGateway();
$accessGateway->put(array(
	"module_key" => "access.manage",
	"access_title" => lng("accesses_management"),
	"access_group_id" => 2,//admin
	"access_enabled" => "Y"
));