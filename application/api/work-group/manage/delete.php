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



$request->filterParams("intval", "work_group_id");

validateNotEmpty($request, "work_group_id", lng('internal_error'));

$request->trust();

require_once PATH_TABLES.'work_group.php';
$workGroupGateway = new WorkGroupGateway();
$workGroupGateway->remove($request->param("work_group_id"));

require_once PATH_TABLES.'work_group_image.php';
$workGroupImageGateway = new WorkGroupImageGateway();
$workGroupImageGateway->remove($request->param("work_group_id"));

$request->set('url_action', 'work-group.view');
$request->set('url_params', 'work_group_id='.$request->param("work_group_id"));

$request->run("meta.manage.delete");
$request->run("config.manage.url-delete");
$request->run("menu.manage.delete");

$request->ok();


