<?php

  Kirby::plugin('francois-gm/last-updated', [

    'hooks' => [
      'page.update:after' => function ( $newPage, $oldPage ) {

        // last updated
        $updatedDate = date( 'Y-m-d H:i' );
        // updated by
        $updatedUser = kirby()->user()->uuid();
        
        // push data

        if( $newPage->last_updated()->exists() && $newPage->updated_by()->exists()){
          $newPage->update([
            'last_updated' => $updatedDate,
            'updated_by' => $updatedUser,
          ]);
        };
        
      },
    ],
    'pageMethods' => [
      'isParentLastUpdated' => function () {

          $lastUpdatedPage = '';

          if($this->last_updated()):
            $lastUpdatedPage = $this->last_updated();
          endif;

          if($this->children()->listed() != ''):

            // get last updated of most recently updated children
            $mostRecentlyUpdatedElem = $this->children()->listed()->sortBy('last_updated', 'desc')->first();
            $lastUpdatedCollection = $mostRecentlyUpdatedElem->last_updated();
            // if value is higher than this page's last update, then children value is the value
            if( (strtotime($lastUpdatedCollection) > strtotime($lastUpdatedPage)) || ($lastUpdatedPage == '') ):
              $lastUpdated = $lastUpdatedCollection;
            else:
              $lastUpdated = $lastUpdatedPage;
            endif;

          else:

            $lastUpdated = $lastUpdatedPage;
            
          endif;

          return $lastUpdated;

      },
    ],
  ]);

?>
