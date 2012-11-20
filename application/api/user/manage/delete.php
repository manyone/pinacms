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



$request->filterParams("intval", "user_id");

validateNotEmpty($request, "user_id", lng('internal_error'));
validateUserOperationPermitted($request);

$request->trust();

require_once PATH_TABLES."user.php";
$user = new UserGateway();
$user->remove($request->param("user_id"));

require_once PATH_TABLES."address.php";
$address = new AddressGateway;
$address->removeBy("user_id", $request->param("user_id"));

require_once PATH_TABLES."user_config.php";
$userConfig = new UserConfigGateway;
$userConfig->removeBy("user_id", $request->param("user_id"));

$request->setRedirect(href(array("action" => "user.manage.home")));
$request->ok(lng("user_has_been_deleted"));