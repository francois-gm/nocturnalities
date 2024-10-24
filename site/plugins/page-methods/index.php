<?php

	Kirby::plugin('francois-gm/page-methods', [
	    'pageMethods' => [
	        'pageDefaultDesc' => function () {

	        	$i1 = 1;

	        	if ( ($this->content_builder()->exists()) ):

					foreach($this->content_builder()->toBlocks() as $block):

					    if ( ($block->type() == 'text_block') && ($block->text_block_content()->isNotEmpty()) && ($i1 == 1) ):

		            		return Str::unhtml($block->text_block_content()->excerpt(300, true, '…'));

		            		$i1++;	

		            	endif;

	            	endforeach;

	            elseif ( ($this->excerpt_builder()->exists()) ):

					foreach($this->excerpt_builder()->toBlocks() as $block):

					    if ( ($block->type() == 'text_block') && ($block->text_block_content()->isNotEmpty()) && ($i1 == 1) ):

		            		return Str::unhtml($block->text_block_content()->excerpt(300, true, '…'));

		            		$i1++;	

		            	endif;

	            	endforeach;

	            elseif ( ($this->text_block_content()->exists()) ):

	        		return Str::unhtml($this->text_block_content()->excerpt(300, true, '…'));

	        	elseif ( ($this->text_content()->exists()) ):

	        		return Str::unhtml($this->text_content()->excerpt(300, true, '…'));

	        	endif;

	        },
	        'pageTitleSanitized' => function () {

	        	return Str::unhtml($this->title());

	        },
	        // date functions
	        'fullDate' => function () {
 
		    	if ( $this->date() != '' ):

			    	$startDate = $this->date()->toDate('dd.MM.yyyy');
			    	$startDateTrimmed = $this->date()->toDate('dd.MM');
					$endDate = $this->dateto()->toDate('dd.MM.yyyy');
					$startTime = $this->timefrom()->toDate('H:mm');
					$endTime = $this->timeto()->toDate('H:mm');

					if (($this->datetype() == 'multiple' && $this->dateto() != '') 
					||  ($this->datetype() == 'repeatday' && $this->dateto() != '')	){
						if( $this->date()->toDate('yyyy') == $this->dateto()->toDate('yyyy') ){
							if( $this->date()->toDate('MM') == $this->dateto()->toDate('MM') ){
								$dateString = $this->date()->toDate('dd').'&#8288;&ndash;&#8288;&#8203;'.$endDate;
							} else {
								$dateString = $startDateTrimmed.'&#8288;&ndash;&#8288;&#8203;'.$endDate;
							}
						} else{
							$dateString = $startDate.'&#8288;&ndash;&#8288;&#8203;'.$endDate;
						}
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != '' && $this->timeto() != ''){
						$dateString = $startDate.', '.$startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != ''){
						$dateString = $startDate.', '.$startTime;
					} elseif ($this->datetype() == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.'&#8288;&ndash;&#8288;&#8203;'.$ongoingString->string_ongoing();
					} else {	$dateString = $startDate;	}

			        return $dateString;

			    endif;

    		},
    		'fullDateWeekdayAsText' => function () {

    			if ( $this->date() != '' ):

			    	$startDate = $this->date()->toDate('dd.MM.yyyy');
			    	$startDateTrimmed = $this->date()->toDate('dd.MM');
			    	$startDateDayString = $this->date()->toDate('EEE dd.MM.yyyy');
					$endDate = $this->dateto()->toDate('dd.MM.yyyy');
					$startTime = $this->timefrom()->toDate('H:mm');
					$endTime = $this->timeto()->toDate('H:mm');

					if (($this->datetype() == 'multiple' && $this->dateto() != '') 
					||  ($this->datetype() == 'repeatday' && $this->dateto() != '')	){
						if( $this->date()->toDate('yyyy') == $this->dateto()->toDate('yyyy') ){
							$dateString = $startDateTrimmed.'&#8288;&ndash;&#8288;&#8203;'.$endDate;
						} else{
							$dateString = $startDate.'&#8288;&ndash;&#8288;&#8203;'.$endDate;
						}
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != '' && $this->timeto() != ''){
						$dateString = $startDateDayString.', '.$startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != ''){
						$dateString = $startDateDayString.', '.$startTime;
					} elseif ($this->datetype() == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.' &ndash; '.$ongoingString->string_ongoing();
					} else {	$dateString = $startDateDayString;	}

			        return $dateString;

			    endif;

    		},
    		'fullDateWeekdayAsTextNoYearNoHour' => function () {

    			if ( $this->date() != '' ):

			    	$startDate = $this->date()->toDate('dd.MM');
			    	$startDateTrimmed = $this->date()->toDate('dd.MM');
			    	$startDateDayString = $this->date()->toDate('EEE dd.MM');
			    	$endDate = $this->dateto()->toDate('dd.MM');

					if (($this->datetype() == 'multiple' && $this->dateto() != '') 
					||  ($this->datetype() == 'repeatday' && $this->dateto() != '')	){
						if( $this->date()->toDate('yyyy') == $this->dateto()->toDate('yyyy') ){
							if( $this->date()->toDate('MM') == $this->dateto()->toDate('MM') ){
								$dateString = $this->date()->toDate('dd').'&#8288;&ndash;&#8288;'.$endDate;
							} else {
								$dateString = $startDateTrimmed.'&#8288;&ndash;&#8288;'.$endDate;
							}
						} else{
							$dateString = $this->date()->toDate('dd.MM.yyyy').'&#8288;&ndash;&#8288;&#8203;'.$this->dateto()->toDate('dd.MM.yyyy');
						}
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != '' && $this->timeto() != ''){
						$dateString = $startDateDayString;
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != ''){
						$dateString = $startDateDayString;
					} elseif ($this->datetype() == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.' &ndash; '.$ongoingString->string_ongoing();
					} else {	$dateString = $startDateDayString;	}

			        return $dateString;

			    endif;

    		},
    		'fullDateWeekdayMonthAsText' => function () {

    			if ( $this->date() != '' ):

			    	$startDate = $this->date()->toDate(' d MMM yyyy');
			    	$startDateTrimmed = $this->date()->toDate(' d MMM');
			    	$startDateTrimmed = trim($startDateTrimmed); // erase trailing white space at beginning of  d
			    	$startDateDayString = $this->date()->toDate('EEE  d MMM yyyy');
					$endDate = $this->dateto()->toDate(' d&nbsp;MMM yyyy');
					$endDate = trim($endDate ?? ''); // erase trailing white space at beginning of  d
					$startTime = $this->timefrom()->toDate('H:mm');
					$endTime = $this->timeto()->toDate('H:mm');

					if (($this->datetype() == 'multiple' && $this->dateto() != '') 
					||  ($this->datetype() == 'repeatday' && $this->dateto() != '')	){
						if( $this->date()->toDate('yyyy') == $this->dateto()->toDate('yyyy') ){
							if( $this->date()->toDate('MM') == $this->dateto()->toDate('MM') ){ 
								$dateString = $this->date()->toDate(' d').'&#8288;&ndash;&#8288;&#8203;'.$endDate;
							} else {
								$dateString = $startDateTrimmed.'&#8288;&ndash;&#8288;&#8203;'.$endDate;
							}
						} else{
							$dateString = $startDate.'&#8288;&ndash;&#8288;&#8203;&#8203;'.$endDate;
						}
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != '' && $this->timeto() != ''){
						$dateString = $startDateDayString.', '.$startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != ''){
						$dateString = $startDateDayString.', '.$startTime;
					} elseif ($this->datetype() == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.' &ndash; '.$ongoingString->string_ongoing();
					} else {	$dateString = $startDateDayString;	}

			        return $dateString;

			    endif;

    		},
    		'fullDateWeekdayMonthAsTextNoYear' => function () {

    			if ( $this->date() != '' ):

			    	$startDate = $this->date()->toDate(' d MMM');
			    	$startDateTrimmed = $this->date()->toDate(' d MMM');
			    	$startDateDayString = $this->date()->toDate('EEE  d MMM');
					$endDate = $this->dateto()->toDate(' d&nbsp;MMM');
					$endDate = trim($endDate); // erase trailing white space at beginning of  d
					$startTime = $this->timefrom()->toDate('H:mm');
					$endTime = $this->timeto()->toDate('H:mm');

					if (($this->datetype() == 'multiple' && $this->dateto() != '') 
					||  ($this->datetype() == 'repeatday' && $this->dateto() != '')	){
						if( $this->date()->toDate('yyyy') == $this->dateto()->toDate('yyyy') ){
							if( $this->date()->toDate('MM') == $this->dateto()->toDate('MM') ){
								$dateString = $this->date()->toDate(' d').'&#8288;&ndash;&#8288;'.$endDate;
							} else {
								$dateString = $startDateTrimmed.'&#8288;&ndash;&#8288;&#8203;'.$endDate;
							}
						} else{
							$dateString = $this->date()->toDate(' d MMM yyyy').'&#8288;&ndash;&#8288;&#8203;'.trim($this->dateto()->toDate(' d&nbsp;MMM yyyy'));
						}
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != '' && $this->timeto() != ''){
						$dateString = $startDateDayString.', '.$startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != ''){
						$dateString = $startDateDayString.', '.$startTime;
					} elseif ($this->datetype() == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.' &ndash; '.$ongoingString->string_ongoing();
					} else {	$dateString = $startDateDayString;	}

			        return $dateString;

			    endif;

    		},
    		'yearDate' => function () {
 
		    	if ( $this->date() != '' ):

		    		$startDate 	= 	$this->date()->toDate('yyyy');
					$endDate 	= 	$this->dateto()->toDate('yyyy');
					$dateType 	= 	$this->datetype();

					if (($dateType == 'multiple' && $endDate != '') 
					||  ($dateType == 'repeatday' && $endDate != '')	){
						if( $startDate == $endDate ){
							$dateString = $startDate;
						} else{
							$dateString = $startDate.'&#8288;&ndash;&#8288;'.$endDate;
						}
					} elseif ($dateType == 'oneday'){
						$dateString = $startDate;
					} elseif ($dateType == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.'&#8288;&ndash;&#8288;'.$ongoingString->string_ongoing();
					} else {	$dateString = $startDate;	}

			        return $dateString;

			    endif;

    		},
    		'monthAsTextYearDate' => function () {
 
		    	if ( $this->date() != '' ):

		    		$startDate 	= 	$this->date()->toDate('MMM yyyy');
					$endDate 	= 	$this->dateto()->toDate('MMM yyyy');
					$dateType 	= 	$this->datetype();

					if (($dateType == 'multiple' && $endDate != '') 
					||  ($dateType == 'repeatday' && $endDate != '')	){
						if( $startDate == $endDate ){
							$dateString = $startDate;
						} else{
							$dateString = $startDate.'&#8288;&ndash;&#8288;'.$endDate;
						}
					} elseif ($dateType == 'oneday'){
						$dateString = $startDate;
					} elseif ($dateType == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.'&#8288;&ndash;&#8288;'.$ongoingString->string_ongoing();
					} else {	$dateString = $startDate;	}

			        return $dateString;

			    endif;

    		},
    		'onlyHour' => function () {

    			if ( $this->date() != '' ):

					$startTime = $this->timefrom()->toDate('H:mm');
					$endTime = $this->timeto()->toDate('H:mm');

					if ($this->datetype() == 'oneday' && $this->timefrom() != '' && $this->timeto() != ''){
						$dateString = $startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($this->datetype() == 'oneday' && $this->timefrom() != ''){
						$dateString = $startTime;
					} else {	$dateString = '';	}

			        return $dateString;

			    endif;

    		},
    		// date with two decimals for year, sort-friendly (Y-M-D) for back-end
    		'fullDateSortFriendlyTwoYearDecimals' => function () {

		    	if ( $this->date() != '' ):
		    		
					$startDate 	= 	$this->date()->toDate('yyyy.MM.dd');
					$endDate 	= 	$this->dateto()->toDate('yyyy.MM.dd');
					$startTime 	= 	$this->timefrom()->toDate('%H:mm');
					$endTime 	= 	$this->timeto()->toDate('%H:mm');
					$dateType 	= 	$this->datetype();
				
					if ( ($dateType == 'multiple' && $endDate != '') ){
						$dateString = $startDate.'  &ndash;  '.$endDate;
					} elseif ( ($dateType == 'repeatday' && $endDate != '') ){
						$dateString = $startDate.'  &ndash;  '.$endDate;
					} elseif ($dateType == 'oneday' && $startTime != '' && $endTime != ''){
						$dateString = $startDate.', '.$startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($dateType == 'oneday' && $startTime != ''){
						$dateString = $startDate.', '.$startTime;
					} elseif ($dateType == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.' &ndash; '.$ongoingString->string_ongoing();
					} else {	$dateString = $startDate;	}

			        return $dateString;

			    endif;

		    },
		    // date with full year, sort-friendly (Y-M) for back-end
    		'fullDateSortFriendlyYearMonth' => function () {

		    	if ( $this->date() != '' ):
		    		
					$startDate 	= 	$this->date()->toDate('yyyy.MM');
					$endDate 	= 	$this->dateto()->toDate('yyyy.MM');
					$startTime 	= 	$this->timefrom()->toDate('H:mm');
					$endTime 	= 	$this->timeto()->toDate('H:mm');
					$dateType 	= 	$this->datetype();
				
					if ( ($dateType == 'multiple' && $endDate != '') ){
						$dateString = $startDate.'  &ndash;  '.$endDate;
					} elseif ( ($dateType == 'repeatday' && $endDate != '') ){
						$dateString = $startDate.'  &ndash;  '.$endDate;
					} elseif ($dateType == 'oneday' && $startTime != '' && $endTime != ''){
						$dateString = $startDate.', '.$startTime.'&#8288;&ndash;&#8288;'.$endTime;
					} elseif ($dateType == 'oneday' && $startTime != ''){
						$dateString = $startDate.', '.$startTime;
					} elseif ($dateType == 'ongoing'){
						$ongoingString = $this->site()->pages()->find('strings');
						$dateString = $startDate.' &ndash; '.$ongoingString->string_ongoing();
					} else {	$dateString = $startDate;	}

			        return $dateString;

			    endif;

		    },
		    // related calendar items collection method (for fetching from ressource pages)
		    'relatedCalendarCollection' => function ($uuid) {

		    	$relatedParent = site()->pages()->findBy("intendedTemplate", "calendar-index");
  				$relatedCollection = $relatedParent->children()->filterBy('related', '*=', $uuid)->listed();
  				$relatedCollectionSorted = $relatedCollection->sortBy('date', 'desc', 'timefrom', 'desc');

  				return $relatedCollectionSorted;

		   	},
		   	'ressourceCategoryType' => function ($page) {

		    	$ressourceCategoryType = '';

				if($this->kirby()->collection('ressource/collections-before')->index()->find($page)):
				    $ressourceCategoryType = 'is-before';
				elseif($this->kirby()->collection('ressource/collections-before-during')->index()->find($page)):
				    $ressourceCategoryType = 'is-before-during';
				elseif($this->kirby()->collection('ressource/collections-during')->index()->find($page)):
				    $ressourceCategoryType = 'is-during';
				elseif($this->kirby()->collection('ressource/collections-during-after')->index()->find($page)):
				    $ressourceCategoryType = 'is-during-after';
				elseif($this->kirby()->collection('ressource/collections-after')->index()->find($page)):
				    $ressourceCategoryType = 'is-after';
				endif;

  				return $ressourceCategoryType;

		   	},
		   	// comment is vanished
		   	'isVanished' => function ($item) {

	        	$isVanished = false;

	        	if($item->intendedTemplate('ressource-post-comment')):

	        		if($item->comment_duration_type() == 'vanishing'):

	        			$publishedDate = $item->title()->toDate('yyyy-MM-dd');
 						$vanishingDate = strftime("yyyy-MM-dd", strtotime("$publishedDate +30 day"));

 						if(date('Y-m-d') > $vanishingDate){
 							$isVanished = true;
 						} else {
 							$isVanished = false;
 						}

	 				elseif($item->comment_duration_type() != 'vanishing'):

	 					$isVanished = false;

	 				endif;

 				endif;

	        	return $isVanished;

	        },
	        // back end use date function
	        'pageLastUpdatedtoDate' => function () {

	        	if($this->last_updated()->toDate('yyyy') > '2020'):
	        		$thisToDate = strtotime($this->last_updated());
	        		$newformat = date('Y.m.d – H:i',$thisToDate);
	        	else:
	        		$newformat = '–';
	        	endif;

	        	return $newformat;

	        },
	        'pageIsCollection' => function () {

	        	$isCollection = $this->template();
	        	if(str_contains($isCollection, 'collection')):
	        		$isCollection = 'Collection';
	        	else:
	        		$isCollection = 'Page';
	        	endif;

	        	return $isCollection;

	        },
	        'pageWordCount' => function () {

	        	$wordCountTxt = $this->text_block_content()->words();
	        	$wordCount = $wordCountTxt;

	        	return $wordCount;

	        },
	        // in page method instead of field method
	        'toLabelFullDateTwoYearDecimalsAsPageMethod' => function () {
	        	
				$value = $this->fullDateSortFriendlyTwoYearDecimals();

				return '<span class="date-label" data-date="'. $value .'">' . $value . '</span>';

		    },


	    ],
	]);

?>