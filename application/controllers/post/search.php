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
* @copyright © 2010 Dobrosite ltd.
*/
if (!defined('PATH')){ exit; }



	$rules = Session::get("search_rules");
	$request->result('search_rules', $rules);

	require_once PATH_CORE.'classes/Sorting.php';
	$sorting = new Sorting($request->param('sort_field'), $request->param('sort_dir'));

	require_once PATH_CORE.'classes/Paging.php';
	$paging = new Paging($request->param('page'), CATALOG_PAGING_PER_PAGE);

	require_once PATH_MODEL.'finder/post.php';
	$pf = new PostFinder();
	$posts = $pf->search($rules, $sorting, $paging);

	$request->result('posts', $posts);
	$request->result("paging", $paging->fetch());
	$request->result('sorting', $sorting->fetch());
	$request->ok();