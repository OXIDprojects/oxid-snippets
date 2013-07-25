    /*
     * ts rich snippets
     * http://www.trustedshops.com/api/ratings/v1/documentation.html
     */    
    public function getRichSnippetTsVotes()
    {
        $oViewConf = oxNew( 'oxViewConfig' );
        if($sTsId = $oViewConf->getTsId())
        {
            $aFeed = @simplexml_load_file("http://www.trustedshops.com/api/ratings/v1/".$sTsId.".xml");
            $fRating = number_format($aFeed->ratings->result[1], 2, ",", "");
            $iVotes = $aFeed->ratings->amount[0];
            $aData = array("rating" => $fRating, "maxrating" => "5,00", "votes" => $iVotes);
            return $aData;
            
        }
        return false;
    }