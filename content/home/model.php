<?php
namespace content\home;
use \lib\utility;
use \lib\utility\ShortURL;
use \lib\debug;

class model extends \mvc\model
{
    public function post_url()
	{
		$url = \lib\request::post('url');
		if (!$url)
		{
			debug::warn(T_("please enter the link!"));
			return;
		}

		// check for this address exist in db
		$duplicate = $this->sql()->tableUrls()->whereUrl_long($url)->select();
		if($duplicate->num() > 0)
		{
			// url exist and get the id of this url
			$id = $duplicate->assoc('id');
		}
		else
		{
			// add the url to database and get the last insert id
			$qry = $this->sql()->tableUrls()->setUrl_long($url)->setUrl_created(date('Y-m-d H:i:s'))->insert();
			$id  = $qry->LAST_INSERT_ID();
		}

		$short = shortURL::encode($id);
		$this->commit(function($_short)
		{
			$url = \dash\url::site().'/'. $_short;
			$this->redirector()->set_domain()->set_url($_short.'-');
			// debug::true(T_("Your link is: ") . $url);
		}, $short);

		$this->rollback(function() { debug::warn(T_("Try again!"));});
	}


	function get_go()
	{
		$shortUrl = \dash\url::path();

		$id  = shortURL::decode($shortUrl);
		$qry = $this->sql()->tableUrls()->whereId($id)->select();

		if($qry->num() === 1)
		{
			//exist in table. get long url and clicks++
			$datarow = $qry->assoc();
			$url     = $datarow['url_long'];
			$qry     = $this->sql()->tableUrls()->setUrl_clicks($datarow['url_clicks']+1)->whereID($id)->update();

			// check if url from valid source redirect to it
			if ($url != null)
			{
				$host = parse_url($url)['host'];
				$path = parse_url($url)['path'];

				$this->redirector()->set_domain($host)->set_url($path);
			}
		}
		else
		{
			// this url does not exist in table. show 404 error
			\lib\header::status(404, );
		}
	}

	function get_details()
	{
		$shortUrl = \dash\url::path();
		$shortUrl = substr($shortUrl, 0, -1);

		$id  = shortURL::decode($shortUrl);
		$qry = $this->sql()->tableUrls()->whereId($id)->select();

		if($qry->num() !== 1)
		{
			\lib\header::status(404, );
			return;
		}

		//exist in table. get long url and clicks++
		$datarow = $qry->assoc();
		$datarow['url_short'] = $shortUrl;
		return $datarow;
	}
}
?>