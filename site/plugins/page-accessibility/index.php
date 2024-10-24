<?php

  Kirby::plugin('francois-gm/accessibility', [

    'hooks' => [

      'kirbytext:after' => function ($text) {     

        if ( strlen( $text ) > 0 ) {
          // Get current page host
          // (the attributes will only be set for external links)
          $site_host = parse_url( site()->url() )['host'];

          // Convert $text to DOM tree
          $dom = new DomDocument();
          $dom->loadHTML( $text );

          // Loop over all anchor elements
          foreach ( $dom->getElementsByTagName( 'a' ) as $link_el ) {
            // Parse link address
            $link_href = $link_el->getAttribute( 'href' );
            $link_parts = parse_url( $link_href );

            if (
              $link_parts &&
              isset( $link_parts['host'] ) &&
              isset( $link_parts['scheme'] )
            ) {
              $link_host = $link_parts['host'];
              $link_scheme = $link_parts['scheme'];

              // Only continue if the link is external
              if (
                in_array( $link_scheme, [ 'http', 'https' ] ) &&
                $link_host !== $site_host
              ) {
                // Create string of old link (to find and replace it later)
                $link_str = $dom->saveHTML( $link_el );

                // Add link attributes
                $hasClass = $link_el->getAttribute('class');
                if(str_contains($hasClass, 'list-document-a styled-as-tag')):
                  $link_el->setAttribute( 'class', $hasClass);
                else:
                $link_el->setAttribute( 'class', $hasClass . ' is-external-link has-arrow-after' );
                endif;
                $link_el->setAttribute( 'rel', 'noopener noreferrer' );
                $link_el->setAttribute( 'target', '_blank' );

                // Create new link string
                $new_link_str = $dom->saveHTML( $link_el );

                // add accessibility string
                $strings = $this->site()->pages()->find('strings');
                $accessibilityString = '(' . Str::lower($strings->strings_aria_external_link()) . ')';
                
                if(str_contains($hasClass, 'list-document-a styled-as-tag')):
                  $new_link_str = str_replace('</a>', '&#8288;</span>&#8288;<span class="sr-only">' . $accessibilityString . '</span>&#8288;</a>&#8288;', $new_link_str);
                  $new_link_str = str_replace('target="_blank">', 'target="_blank"><span class="is-document-external-link has-arrow-before font-is-arrow is-external-link-before"></span>', $new_link_str);
                else:
                  $new_link_str = str_replace('</a>', '&#8288;</span>&#8288;<span class="sr-only">' . $accessibilityString . '</span>&#8288;</a>&#8288;', $new_link_str);
                  $new_link_str = str_replace('target="_blank">', 'target="_blank"><span class="is-link-string">', $new_link_str);
                endif;

                // replace old link with new link in $text
                $text = str_replace( $link_str, $new_link_str, $text );
              }
            }
          }
        }       
        
        return $text;
      }
      
    ],

  ]);

?>
