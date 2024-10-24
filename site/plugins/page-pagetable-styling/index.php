<?php

	Kirby::plugin('francois-gm/pagetable-styling', [
		'fieldMethods' => [
			'toLabelTitle' => function($field) {
				$value = Str::unhtml($field->value());
				return '<div class="gradient-left"></div><span class="title-label" data-title="'. $value .'">' . $value . '</span>';
			},
			'toLabelTitleIndicator' => function($field) {
				$value = Str::unhtml($field->value());
				$parent = $field->parent();
				$archivedString = $field->parent()->site()->pages()->find('strings')->string_archived();
		          // if collection
				if(str_contains( $parent->intendedTemplate(), 'collection') && (!str_contains( $parent->intendedTemplate(), 'post'))):
					$collectionIndicator = '<span class="is-collection-label--span">Collection</span>';
				else:
					$collectionIndicator = '';
				endif;
			          // if archived
				if($parent->archived_toggle() == 'true'):
					$archivedIndicator = '<span class="is-archived-label--span">' . $archivedString . '</span>';
				else:
					$archivedIndicator = '';
				endif;
				return '<p class="k-url-field-preview"><a href="'.$field->parent()->panel()->url().'" class="k-link is-indicator-label--a">' . $collectionIndicator . $archivedIndicator . '<span class="title-label" data-title="'. $value .'">' . $value . '</span></a></p>';
			},
			'toLabelRelated' => function($field) {
				$valueids = $field->toPages();
				if($valueids == ''):
					$valueids = $field->toPagesBoosted();	
				endif;
				if ($valueids != ''):
					$countMore = $valueids->count() - 1;
					foreach ($valueids as $valueid):
						$value = $valueid->title();
						if ($value != '' && $valueids->indexOf($valueid) == 0):
							$valueToPrint = '<span class="related-label" data-related="'. $value .'" title="' . $value . '">' . $value . '</span>';
						endif;
						if ($value != '' && $valueids->indexOf($valueid) == 1):
							$valueToPrint = $valueToPrint . '<span class="related-label-more" data-related="more">+' . $countMore . '</span>';
						endif;
					endforeach;
					return $valueToPrint;
				endif;
			},
			'toLabelCategory' => function($field) {
				$category = $field->parent()->category();
				$valueToPrint = '';
				foreach ($category->split() as $valueid):
					if (boost($valueid) != ''):
						$valuepage = boost($valueid);
						$value = $valuepage->title();
						$valueToPrint = $valueToPrint . '<span class="category-label" data-category="'. $value .'">' . $value . '</span>';
					endif;
				endforeach;
				return $valueToPrint;
			},
			'toLabelDate' => function($field) {
				$value = $field->value();
				return '<span class="date-label" data-date="'. $value .'">' . $value . '</span>';
			},
			'toLabelYearDate' => function($field) {
				$value = $field->parent()->yearDate();
				return '<span class="date-label" data-date="'. $value .'">' . $value . '</span>';
			},
			'toLabelFullDate' => function($field) {
				$value = $field->parent()->fullDate();
				return '<span class="date-label" data-date="'. $value .'">' . $value . '</span>';
			},
			'toLabelFullDateTwoYearDecimals' => function($field) {
				$value = $field->parent()->fullDateSortFriendlyTwoYearDecimals();
				if( (($field->parent()->datetype()) == 'repeatday') && ($value != '') ):
			        // ↻
					$ifRepeatDay = '<span class="date-is-repeatday">+</span>';
				else:
					$ifRepeatDay = '';
				endif;
				return '<span class="date-label" data-date="'. $value .'">' . $value . '</span>' . $ifRepeatDay;
			},
			'toLabelUpdatedUser' => function($field) {
				if($field->toUser() != ''):
					$value = $field->toUser()->name();
				else:
					$value = 'info@kirby.com';
				endif;
				return $value;
			},
			'toLabelUpdatedDate' => function($field) {
				$value = $field->parent()->pageLastUpdatedtoDate();
				return '<span class="page-table-updated" data-value="'. $value .'">'. $value .'</span>';
			},
		]
	]);

?>