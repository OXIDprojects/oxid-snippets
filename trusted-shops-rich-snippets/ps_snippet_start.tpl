            [{ assign var="tsVotes" value=$oView->getRichSnippetTsVotes() }]
            [{ if $tsVotes }]
                <span xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
                    <span rel="v:rating">
                        <span property="v:value">[{ $tsVotes.rating }]</span>
                    </span> von 
                    <span property="v:best">[{ $tsVotes.maxrating }]</span> Punkten bei 
                    <span property="v:count">[{ $tsVotes.votes }]</span> Kundenbewertungen.
                </span>
            [{ /if }]