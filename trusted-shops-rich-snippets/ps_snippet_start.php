<?
    /*
     * ts rich snippets
     * http://www.trustedshops.com/api/ratings/v1/documentation.html
     */    
    public function getRichSnippetTsVotes()
    {
        $oViewConf = oxNew( 'oxViewConfig' );
        if($sTsId = $oViewConf->getTsId())
        {
            $sCacheFile = $this->getConfig()->getConfigParam( 'sCompileDir' ).'tsShops_'.$sTsId.'.xml';
            if (file_exists($sCacheFile))
            {
                $sTimeNow = time();
                $sTimeFile = filemtime($sCacheFile);
                if ($sTimeNow - $sTimeFile > 60*60*24)
                {
                    unlink($sCacheFile);
                }
                else
                {
                    $oFeed = simplexml_load_string(file_get_contents($sCacheFile));
                }
            }

            if (!is_object($oFeed) && $oFeed = simplexml_load_file('http://www.trustedshops.com/api/ratings/v1/'.$sTsId.'.xml'))
            {
                file_put_contents($sCacheFile, $oFeed->asXML());
            }

            if(is_object($oFeed))
            {
                $fRating = number_format($oFeed->ratings->result[1], 2, ",", "");
                $iVotes = $oFeed->ratings->amount[0];
                $aData = array("rating" => $fRating, "maxrating" => "5,00", "votes" => $iVotes);
                return $aData;

            }
        }
        return false;
    }
