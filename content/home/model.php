<?php
namespace content\home;
use \lib\utility;
use \lib\debug;

class model extends \mvc\model
{
	/**
	 * ShortURL: Bijective conversion between natural numbers (IDs) and short strings
	 *
	 * ShortURL::encode() takes an ID and turns it into a short string
	 * ShortURL::decode() takes a short string and turns it into an ID
	 *
	 * Features:
	 * + large alphabet (51 chars) and thus very short resulting strings
	 * + proof against offensive words (removed 'a', 'e', 'i', 'o' and 'u')
	 * + unambiguous (removed 'I', 'l', '1', 'O' and '0')
	 *
	 * Example output:
	 * 123456789 <=> pgK8p
	 *
	 * Source: https://github.com/delight-im/ShortURL (Apache License 2.0)
	 */
    const ALPHABET = '23456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ';
    const BASE     = "49"; // strlen(self::ALPHABET);
    public static function encode($num)
    {
        $str = '';
        while ($num > 0) {
            $str = substr(self::ALPHABET, ($num % self::BASE), 1) . $str;
            $num = floor($num / self::BASE);
        }
        return $str;
    }
    public static function decode($str)
    {
        $num = 0;
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $num = $num * self::BASE + strpos(self::ALPHABET, $str[$i]);
        }
        return $num;
    }

    public function post_url()
	{
		$url = utility::post('url');
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
			$qry = $this->sql()->tableUrls()->setUrl_long($url)->insert();
			$id  = $qry->LAST_INSERT_ID();
		}

		$short = $this->encode($id);
		$this->commit(function($_parm1 = null)
		{
			debug::true(T_("Your link is: ") . $this->url('raw') .'/'. $_parm1);
		}, $short);

		$this->rollback(function() { debug::warn(T_("Try again!"));});
	}


	function get_gourl()
	{
		$shortUrl = $this->url('path');
		// in root dont run this code, fix in controller soon
		if(!isset($shortUrl) || $shortUrl === 0)
			return;
		$id  = $this->decode($shortUrl);
		$qry = $this->sql()->tableUrls()->whereId($id)->select();

		if($qry->num() === 1)
		{
			//exist in table. get long url and clicks++
			$datarow = $qry->assoc();
			$url     = $datarow['url_long'];
			$qry = $this->sql()->tableUrls()->setUrl_clicks($datarow['url_clicks']+1)->whereID($id)->update();

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
			
		}
	}
}
?>